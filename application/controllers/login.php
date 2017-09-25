<?php
	class Login extends MY_Controller {
		public function index(){
			if($this->session->userdata("user_id")){
				return redirect("admin/dashboard");
			}
			$this->load->view('public/admin_login');
		}
		public function admin_login() {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("username","Username","required|alpha|trim");
			$this->form_validation->set_rules("password","Password","required");
			if($this->form_validation->run()) {
				$user = $this->input->post("username");
				$pwd = $this->input->post("password");
				$this->load->model("loginmodel");
				$login_id = $this->loginmodel->loginValid($user,$pwd);
				if($login_id) {
					$this->session->set_userdata("user_id",$login_id);
					return redirect("admin/dashboard");
				}
				else {
					$this->session->set_flashdata("login_failed","Invalid Username/Password");
					return redirect("login");
				}
			}
			else {
				$this->load->view('public/admin_login');
			}
		}
		public function logout() {
			$this->session->unset_userdata("user_id");
			return redirect("login");
		}
	}
?>