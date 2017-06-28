<?php

	class Login_model extends CI_Model{
		public function login($username,$password){
			$this->db->select('username,password');
			$this->db->from('users');
			$this->db->where('username',$username);
			$this->db->where('password',$password);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return true;
			}
		}
	}

?>