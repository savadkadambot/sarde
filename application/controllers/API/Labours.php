<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labours extends CI_Controller {

	public function add_labours_work()
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
			'name' => $_POST['name'],
			'trade' => $_POST['trade'],
			'type' => $_POST['type'],
			'hours' => $_POST['hours'],
			//'own' => $_POST['own']
		);

		$this->load->model('API/Labours_model','API_LABOURS_MODEL');


		$add_labours = $this->API_LABOURS_MODEL->addLabours($post_data);

		if($add_labours === true){
			$response = array();
			$response['result'] = 'labours_added_successfully';
			$response['status'] = 'success';
		}else{
			$response = array();
			$response['result'] = 'failed_to_add_the_labours';
			$response['status'] = 'failed';
		}
		echo json_encode($response);
		die();
	}


	public function labours_list(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$job_id = $_POST['job_id'];
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

	 	$this->load->model('API/Labours_model','API_LABOURS_MODEL'); 
        $labours_list = $this->API_LABOURS_MODEL->getLaboursDetails($user_id,$job_id);
        if(is_array($labours_list)){
        	$response = array();
			$response['result'] = $labours_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}


	public function admin_assigned_labours(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$job_id = $_POST['job_id'];
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

	 	$this->load->model('API/Labours_model','API_LABOURS_MODEL'); 
        $labours_list = $this->API_LABOURS_MODEL->getAdminAssignedLabours($user_id,$job_id);
        if(is_array($labours_list)){
        	$response = array();
			$response['result'] = $labours_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	

	
}
