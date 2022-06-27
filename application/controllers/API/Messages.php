<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {


	public function get_messages(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		// $page_count = $_POST['page_count'];
		// $page_offset = $_POST['page_offset'];

		$this->load->model('API/Login_model','API_LOGIN_MODEL');
		$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
		if(!is_array($validate_access_token)){
			$response = array();
			$response['result'] = 'invalid_access_token';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}

		$user_id = $validate_access_token['user_id'];

	 	$this->load->model('API/Messages_model','API_MESSAGES_MODEL'); 
        $messages = $this->API_MESSAGES_MODEL->getMessages($user_id);


        if(is_array($messages)){
        	$response = array();
			$response['messages'] = $messages;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	

	
}
