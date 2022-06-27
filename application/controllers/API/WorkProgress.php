<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkProgress extends CI_Controller {

	public function add_item()
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
			'subjob_id' => $_POST['subjob_id'],
			'item_description' => $_POST['item_description'], 
			'no' => $_POST['no'],
			'length' => $_POST['length'],
			'width' => $_POST['width'],
			'meter_sqr' => $_POST['meter_sqr'],
			'created_date' => date('Y-m-d H:i:s')
		);



		$this->load->model('API/WorkProgress_model','API_WORK_PROGRESS_MODEL');

		$add_item = $this->API_WORK_PROGRESS_MODEL->addItem($post_data);

		if($add_item === true){
			$response = array();
			$response['result'] = 'item_added_successfully';
			$response['status'] = 'success';
		}else{
			$response = array();
			$response['result'] = 'failed_to_add_the_item';
			$response['status'] = 'failed';
		}
		echo json_encode($response);
		die();
	}

	public function list_all_item(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$page_count = $_POST['page_count'];
		$page_offset = $_POST['page_offset'];
		$job_id = $_POST['job_id'];
		$subjob_id = $_POST['subjob_id'];

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

	 	$this->load->model('API/WorkProgress_model','API_WORK_PROGRESS_MODEL'); 
        $item_list = $this->API_WORK_PROGRESS_MODEL->getItemDetails($user_id, $page_count, $page_offset, $job_id, $subjob_id);
        if(is_array($item_list)){
        	$response = array();
			$response['result'] = $item_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}
	
} 
