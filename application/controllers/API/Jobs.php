<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function index()
	{ 
		// if(!isset($_SESSION['super_admin_logged_data'])){
		// 	$redirect_url = base_url();
		// 	redirect($redirect_url, 'refresh');
		// }

		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);

		$this->load->model('API/Jobs_model'); 

         $data['get_jobs_details']=$this->Jobs_model->getJobsDetails();
        
			// $this->load->view('jobs/jobs_list',$data);
         			$this->load->view('jobs/jobs_list',$data);


	}

	// public function view_job(){

	// 	$this->load->view('jobs/jobs_view');

	// }

	public function list_jobs(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$page_count = $_POST['page_count'];
		$page_offset = $_POST['page_offset'];

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

	 	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
        $expense_list = $this->JOBS_MODEL->listJobs($user_id, $page_count, $page_offset);
        if(is_array($expense_list)){
        	$response = array();
			$response['result'] = $expense_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	public function getJobDetailsFromJobId(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		//$page_count = $_POST['page_count'];
		//$page_offset = $_POST['page_offset'];

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
		$job_id = $_POST['job_id'];

	 	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
        $job_details = $this->JOBS_MODEL->getJobDetailsFromId($user_id, $job_id);
        if(is_array($job_details)){
        	$response = array();
			$response['result'] = $job_details;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	public function start_a_job(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$response = array();

		$this->load->model('API/Login_model','API_LOGIN_MODEL');
		$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
		if(!is_array($validate_access_token)){
			$response['result'] = 'invalid_access_token';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}

		$user_id = $validate_access_token['user_id'];
		$job_id = $_POST['job_id'];

		$this->load->model('API/Jobs_model','JOBS_MODEL');
		$check_assigned_to_job = $this->JOBS_MODEL->checkUserAssignedToJob($user_id, $job_id);
		if(!$check_assigned_to_job){
			$response['result'] = 'supervisor_not_assigned_to_job';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}

		$start_a_job = $this->JOBS_MODEL->startAJob($user_id, $job_id);
		if(is_array($start_a_job)){
			$response['result'] = $start_a_job['message'];
			$response['status'] = $start_a_job['status'];
			echo json_encode($response);
			die();
		}else{
			$response['result'] = 'failed';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}
	}

	public function finish_a_job(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$response = array();

		$this->load->model('API/Login_model','API_LOGIN_MODEL');
		$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
		if(!is_array($validate_access_token)){
			$response['result'] = 'invalid_access_token';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}

		$user_id = $validate_access_token['user_id'];
		$job_id = $_POST['job_id'];

		$this->load->model('API/Jobs_model','JOBS_MODEL');
		$check_assigned_to_job = $this->JOBS_MODEL->checkUserAssignedToJob($user_id, $job_id);
		if(!$check_assigned_to_job){
			$response['result'] = 'supervisor_not_assigned_to_job';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}

		$start_a_job = $this->JOBS_MODEL->endAJob($user_id, $job_id);
		if(is_array($start_a_job)){
			$response['result'] = $start_a_job['message'];
			$response['status'] = $start_a_job['status'];
			echo json_encode($response);
			die();
		}else{
			$response['result'] = 'failed';
			$response['status'] = 'failed';
			echo json_encode($response);
			die();
		}
	}

	// public function update_road_making_sqm(){
	// 	header('Content-type: application/json');
	// 	$this->load->helper('string');

	// 	$access_token = $_POST['access_token'];
	// 	$response = array();

	// 	$this->load->model('API/Login_model','API_LOGIN_MODEL');
	// 	$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
	// 	if(!is_array($validate_access_token)){
	// 		$response['result'] = 'invalid_access_token';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$user_id = $validate_access_token['user_id'];
	// 	$job_id = $_POST['job_id'];
	// 	$road_marking_sqm = $_POST['road_marking_sqm'];

	// 	$this->load->model('API/Jobs_model','JOBS_MODEL');
	// 	$check_assigned_to_job = $this->JOBS_MODEL->checkUserAssignedToJob($user_id, $job_id);
	// 	if(!$check_assigned_to_job){
	// 		$response['result'] = 'supervisor_not_assigned_to_job';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$start_a_job = $this->JOBS_MODEL->updateRoadMakingSqm($user_id, $job_id, $road_marking_sqm);
	// 	if(is_array($start_a_job)){
	// 		$response['result'] = $start_a_job['message'];
	// 		$response['status'] = $start_a_job['status'];
	// 		echo json_encode($response);
	// 		die();
	// 	}else{
	// 		$response['result'] = 'failed';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}
	// }


	// public function update_stud_fixing_nos(){
	// 	header('Content-type: application/json');
	// 	$this->load->helper('string');

	// 	$access_token = $_POST['access_token'];
	// 	$response = array();

	// 	$this->load->model('API/Login_model','API_LOGIN_MODEL');
	// 	$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
	// 	if(!is_array($validate_access_token)){
	// 		$response['result'] = 'invalid_access_token';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$user_id = $validate_access_token['user_id'];
	// 	$job_id = $_POST['job_id'];
	// 	$stud_fixing_nos = $_POST['stud_fixing_nos'];

	// 	$this->load->model('API/Jobs_model','JOBS_MODEL');
	// 	$check_assigned_to_job = $this->JOBS_MODEL->checkUserAssignedToJob($user_id, $job_id);
	// 	if(!$check_assigned_to_job){
	// 		$response['result'] = 'supervisor_not_assigned_to_job';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$start_a_job = $this->JOBS_MODEL->updateStudFixingNos($user_id, $job_id, $stud_fixing_nos);
	// 	if(is_array($start_a_job)){
	// 		$response['result'] = $start_a_job['message'];
	// 		$response['status'] = $start_a_job['status'];
	// 		echo json_encode($response);
	// 		die();
	// 	}else{
	// 		$response['result'] = 'failed';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}
	// }

	// public function update_board_fixing_nos(){
	// 	header('Content-type: application/json');
	// 	$this->load->helper('string');

	// 	$access_token = $_POST['access_token'];
	// 	$response = array();

	// 	$this->load->model('API/Login_model','API_LOGIN_MODEL');
	// 	$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
	// 	if(!is_array($validate_access_token)){
	// 		$response['result'] = 'invalid_access_token';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$user_id = $validate_access_token['user_id'];
	// 	$job_id = $_POST['job_id'];
	// 	$board_fixing_nos = $_POST['board_fixing_nos'];

	// 	$this->load->model('API/Jobs_model','JOBS_MODEL');
	// 	$check_assigned_to_job = $this->JOBS_MODEL->checkUserAssignedToJob($user_id, $job_id);
	// 	if(!$check_assigned_to_job){
	// 		$response['result'] = 'supervisor_not_assigned_to_job';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$start_a_job = $this->JOBS_MODEL->updateBoardFixingNos($user_id, $job_id, $board_fixing_nos);
	// 	if(is_array($start_a_job)){
	// 		$response['result'] = $start_a_job['message'];
	// 		$response['status'] = $start_a_job['status'];
	// 		echo json_encode($response);
	// 		die();
	// 	}else{
	// 		$response['result'] = 'failed';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}
	// }

	public function list_old_jobs(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$page_count = $_POST['page_count'];
		$page_offset = $_POST['page_offset'];

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

	 	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
        $expense_list = $this->JOBS_MODEL->listOldJobs($user_id, $page_count, $page_offset);
        if(is_array($expense_list)){
        	$response = array();
			$response['result'] = $expense_list;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	public function commentAJob(){
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
		$job_id = $_POST['job_id'];
		$comment = $_POST['comment'];

	 	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
        $comment_a_job = $this->JOBS_MODEL->commentAJob($user_id, $job_id, $comment);

        if($comment_a_job === true){
        	$response = array();
			$response['result'] = 'job_commented_successfully';
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}

	public function getCommentsUnderJobId(){
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
		$job_id = $_POST['job_id'];

	 	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
        $get_comments = $this->JOBS_MODEL->getCommentsUnderJobId($user_id, $job_id);

        if(is_array($get_comments)){
        	$response = array();
			$response['result'] = $get_comments;
			$response['status'] = 'success';
        }else{
        	$response = array();
			$response['result'] = 'failed';
			$response['status'] = 'failed';
        }
        echo json_encode($response);
	}


	// public function messageToSupervisor(){
	// 	header('Content-type: application/json');
	// 	$this->load->helper('string');

	// 	$access_token = $_POST['access_token'];

	// 	$this->load->model('API/Login_model','API_LOGIN_MODEL');
	// 	$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
	// 	if(!is_array($validate_access_token)){
	// 		$response = array();
	// 		$response['result'] = 'invalid_access_token';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$user_id = $validate_access_token['user_id'];
	// 	$job_id = $_POST['job_id'];
	// 	$comment = $_POST['comment'];

	//  	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
 //        $comment_a_job = $this->JOBS_MODEL->messageAJob($user_id, $job_id, $comment);

 //        if($comment_a_job === true){
 //        	$response = array();
	// 		$response['result'] = 'job_commented_successfully';
	// 		$response['status'] = 'success';
 //        }else{
 //        	$response = array();
	// 		$response['result'] = 'failed';
	// 		$response['status'] = 'failed';
 //        }
 //        echo json_encode($response);
	// }

	// public function getCommentsUnderJobId(){
	// 	header('Content-type: application/json');
	// 	$this->load->helper('string');

	// 	$access_token = $_POST['access_token'];

	// 	$this->load->model('API/Login_model','API_LOGIN_MODEL');
	// 	$validate_access_token = $this->API_LOGIN_MODEL->checkAccessTokenIsValid($access_token);
	// 	if(!is_array($validate_access_token)){
	// 		$response = array();
	// 		$response['result'] = 'invalid_access_token';
	// 		$response['status'] = 'failed';
	// 		echo json_encode($response);
	// 		die();
	// 	}

	// 	$user_id = $validate_access_token['user_id'];
	// 	$job_id = $_POST['job_id'];

	//  	$this->load->model('API/Jobs_model','JOBS_MODEL'); 
 //        $get_comments = $this->JOBS_MODEL->getCommentsUnderJobId($user_id, $job_id);

 //        if(is_array($get_comments)){
 //        	$response = array();
	// 		$response['result'] = $get_comments;
	// 		$response['status'] = 'success';
 //        }else{
 //        	$response = array();
	// 		$response['result'] = 'failed';
	// 		$response['status'] = 'failed';
 //        }
 //        echo json_encode($response);
	// }





}
