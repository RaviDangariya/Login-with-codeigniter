<?php

	class Verify extends CI_Controller{
		function __construct(){
			parent:: __construct();

			$this->load->model('login_model');
		}
		public function index(){

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('login_view');
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$result = $this->login_model->login($username,$password);

				if($result == true){
					$this->load->view('home');
				}else{
						
						$data['error'] = "Invalid username and password";
						$this->load->view('login_view',$data);
						return false;
				     
				    
				}
			}

		}
	}

?>