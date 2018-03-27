<?php 

	class Loginmodel extends CI_Model {

		public function login_valid($username, $password) {

			$q= $this->db->where(['uname'=>$username, 'pword'=>$password])
						->get('users');
			If($q->num_rows() > 0) {
				return $q->row()->id;
				// return TRUE;	
			}
			else {
				return FALSE;
			}
		}
	}
