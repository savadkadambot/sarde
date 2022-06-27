<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	public function add_tools()
	{

		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];

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
		$post_data = array(
			'user_id' => $user_id,
			'job_id' => $_POST['job_id'],
			'item' => $_POST['item'],
			'quantity' => $_POST['quantity'],
			'condition' => $_POST['condition']
		);
		$this->load->model('API/Tools_model','API_TOOLS_MODEL');
		$add_tools = $this->API_TOOLS_MODEL->addTools($post_data);

		if($add_tools === true){
			$response = array();
			$response['result'] = 'tools_added_successfully';
			$response['status'] = 'success';
		}else{
			$response = array();
			$response['result'] = 'failed_to_add_the_tools';
			$response['status'] = 'failed';
		}
		echo json_encode($response);
		die();
	}

	public function list_all_tools(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$page_count = $_POST['page_count'];
		$page_offset = $_POST['page_offset'];
		$job_id = $_POST['job_id'];

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

	 	$this->load->model('API/Tools_model','API_TOOLS_MODEL'); 
        $tools_list = $this->API_TOOLS_MODEL->getToolsDetails($user_id, $page_count, $page_offset, $job_id);
        if(is_array($tools_list)){
        	$response = array();
			$response['result'] = $tools_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	
}
