<?php include('admin_header.php'); ?>

<div class="container">	
	<a href="<?php echo base_url('admin/add_article'); ?>" class="btn btn-lg btn-primary pull-offset">Add Article</a>
		<?php if( $feedback = $this->session->flashdata('feedback') ): ?>
	    <div class="col-lg-6">
	    <div class="alert alert-dismissible alert-success">
	    <?php echo $feedback ?>
	    </div>
	    </div>
	    <?php endif; ?>
		<table class="table">
		<thead>
			<th>Sr. No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles) ): 
			 $count = $this->uri->segment(3, 0);
			 foreach($articles as $article): ?>
				<tr>
					<td><?php echo ++$count; ?></td>
					<td><?php echo $article->title; ?></td>
					<td>
						<div class="row">
							<div class="col-lg-2">						
								<a href="<?php echo base_url("admin/edit_article/{$article->id}"); ?>" class="btn btn-primary">Edit</a>
							</div>
							<div class="col-lg-2">
								<?php echo form_open('admin/delete_article'), 
								  	  form_hidden('article_id', $article->id),
								  	  form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger']),
								  	  form_close(); ?>
								<!-- <a href="" class="btn btn-danger">Delete</a>  -->
							</div>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			<?php else: ?>	
				<tr>
					<td colspan="3">
						No Records Found.
					</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links() ?>
</div> 
<?php include('admin_footer.php'); ?>
