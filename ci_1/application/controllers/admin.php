<?php 
	
	class Admin extends MY_Controller {

		public function __construct() {

			parent::__construct();
			if (! $this->session->userdata('user_id'))
				redirect('login');
		}

		public function dashboard() {

			$this->load->library('pagination');
			$this->load->model('articlesmodel', 'articles');

			$config = [
				'base_url' => base_url('admin/dashboard'),
				'per_page' => 5,
				'total_rows' => $this->articles->num_rows1(),
				'full_tag_open' => "<ul class='pagination'>",
				'full_tag_close' => "</ul>",
				'first_tag_open' => "<li>",
				'first_tag_close' => "</li>",
				'last_tag_open' => "<li>",
				'last_tag_close' => "</li>",
				'next_tag_open' => "<li>",
				'next_tag_close' => "</li>",
				'prev_tag_open' => "<li>",
				'prev_tag_close' => "</li>",
				'num_tag_open' => "<li>",
				'num_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active'><a>",
				'cur_tag_close' => "</a></li>",
			];

			$this->pagination->initialize($config);
			$this->load->helper('form');
			
			$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );
			$this->load->view('admin/dashboard', ['articles'=>$articles]);
		}

		public function add_article() {

			$this->load->helper('form');
			$this->load->view('admin/add_article');
		}
		public function store_article() {

			$config = [
				'upload_path' => './uploads',
				'allowed_types' => 'jpg|jpeg|gif|png',
			];
			$this->load->library('upload', $config);
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if($this->form_validation->run('add_article_rules') && $this->upload->do_upload() ) {
				$post = $this->input->post();

				unset($post['submit']);
				$data = $this->upload->data();
				//echo '<pre>';
				// print_r($data); die;
				$image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext'] );
				// echo $image_path; die;
				$post['image_path'] = $image_path;
				$this->load->model('articlesmodel', 'articles');
				if ($this->articles->add_article($post) ) {
					$this->session->set_flashdata('feedback', 'Article added successfully');
					// insert successful
				} else {
					$this->session->set_flashdata('feedback', 'Article cannot be added successfully');
					// insert failed
				}
				redirect('admin/dashboard');
			} else {
				$upload_error = $this->upload->display_errors();
				$this->load->view('admin/add_article', compact('upload_error'));
			}

		}

		public function edit_article($article_id) {

			$this->load->helper('form');
			$this->load->model('articlesmodel', 'articles');
			$article = $this->articles->find_article($article_id);
			$this->load->view('admin/edit_article', ['article'=>$article]);
		}

		public function update_article($article_id) {
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if($this->form_validation->run('add_article_rules') ) {
				$post = $this->input->post();

				unset($post['submit']);
				$this->load->model('articlesmodel', 'articles');
				if ($this->articles->update_article($article_id, $post) ) {
					$this->session->set_flashdata('feedback', 'Article updated successfully');
					// insert successful
				} else {
					$this->session->set_flashdata('feedback', 'Article failed to update');
					// insert failed
				}
				redirect('admin/dashboard');
			} else {
				$this->load->view('admin/edit_article');
			}	
		}

		public function delete_article() {

			$article_id = $this->input->post('article_id');
			$this->load->model('articlesmodel', 'articles');
			if ($this->articles->delete_article($article_id) ) {
					$this->session->set_flashdata('feedback', 'Article deleted successfully');
					// insert successful
				} else {
					$this->session->set_flashdata('feedback', 'Article failed to delete');
					// insert failed
				}
				redirect('admin/dashboard');

		}
	}