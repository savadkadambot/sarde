<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QualityCheck extends CI_Controller {

	public function add_quality_check(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		// $job_id = $_POST['job_id'];
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
		if ($_FILES['userfile']['error'] != 4) {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = microtime(true) . $_FILES['userfile']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name = $data['upload_data']['file_name'];
            }
        }   

        $job_id = $_POST['job_id'];
        $subjob_id = $_POST['subjob_id'];
        $location = $_POST['location'];
        $thickness = $_POST['thickness'];
        $edge_alignment = $_POST['edge_alignment'];
        $comment = $_POST['comment'];



        $this->load->model('API/QualityCheck_model','QUALITY_CHECK_MODEL');

        $add_quality_check = $this->QUALITY_CHECK_MODEL->addQualityCheck($user_id, $file_name, $job_id, $subjob_id, $location, $thickness, $edge_alignment, $comment);
        if($add_quality_check){
        	$response = array();
			$response['result'] = 'quality_check_added_successfully';
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}


	public function list_quality_check(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$job_id = $_POST['job_id'];
		$subjob_id = $_POST['subjob_id'];
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

		$this->load->model('API/QualityCheck_model','QUALITY_CHECK_MODEL');
        $list_quality_check = $this->QUALITY_CHECK_MODEL->listQualityCheck($user_id, $job_id, $subjob_id);
        
        if($list_quality_check){
        	$response = array();
			$response['result'] = $list_quality_check;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}


}
