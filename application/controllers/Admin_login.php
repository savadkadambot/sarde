<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function index(){
	
	// public function super_admin_login(){

		error_reporting(0); 

		if($this->session->userdata('super_admin_logged_data')){
			//Replace the below withour redirect url
			$redirect_url = base_url().'index.php/Admin_home';
			redirect($redirect_url, 'refresh');
		}
		$data = array();
		$data['error_message'] = '';
		if($_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$this->load->model('Admin_login_model');
			$login = $this->Admin_login_model->validateLogin($username, $password);
			if($login){
				$this->session->set_userdata($login);
				$_SESSION['super_admin_logged_data'] = $login;
				// Redirect to Home URL
				$redirect_url = base_url().'index.php/Admin_home';
				redirect($redirect_url, 'refresh');
			}else{
				$data['error_message'] = 'Login Failed';
			}
		}
		$this->load->view('admin_login/sarde_login',$data);
	}

	public function logout(){
		$this->session->unset_userdata('super_admin_logged_data');
		//unset($_SESSION['super_admin_logged_data']);
		//Replace the below withour redirect url
		$redirect_url = base_url();
		redirect($redirect_url, 'refresh');
	}

}
