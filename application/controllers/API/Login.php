<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function check_login()
	{

		header('Content-type: application/json');
		$this->load->helper('string');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$this->load->model('API/Login_model','API_LOGIN_MODEL');
		$validate_login = $this->API_LOGIN_MODEL->validateLogin($email, $password);

		// print_r($validate_login);
		// die();

		if(is_array($validate_login)){
			$access_token = random_string('alnum', 32);
			$user_id = $validate_login['id'];

			$add_to_logged_details = $this->API_LOGIN_MODEL->addToLoggedDetails($access_token, $user_id);
			//echo random_string('alnum', 64);
			$data = array(
				"access_token"=>$access_token, 
				"logged_user_details"=>$validate_login
			);

			$response = array();
			$response['result'] = $data;
			$response['status'] = 'success';
			echo json_encode($response);
		}else{
			$data = array(
				"result"=>"login_failed", 
				"status"=>'failed'
			);
			echo json_encode($data);
		}
	}

	public function logout(){
		header('Content-type: application/json');
		$access_token = $_POST['access_token'];

		$this->load->model('API/Login_model','API_LOGIN_MODEL');
		$check_access_token_valid = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);

		if(is_array($check_access_token_valid)){
			$logout = $this->API_LOGIN_MODEL->expireAccessToken($access_token);

			if($logout === true){
				$response = array();
				$response['result'] = 'logout_action_completed_successfully';
				$response['status'] = 'success';
				echo json_encode($response);
			}
		}else{
			$response = array();
			$response['result'] = 'invalid_access_token';
			$response['status'] = 'failed';
				echo json_encode($response);
		}		
	}

}
