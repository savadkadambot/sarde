<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_jobs extends CI_Controller {
    
	
	public function index()
	{
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}


		$this->load->model('Sub_jobs_model'); 

         $data['get_sub_jobs_details']=$this->Sub_jobs_model->getSubJobsDetails();
        
			$this->load->view('sub_jobs/sub_jobs_list',$data);		
	}



	public function create_sub_job(){
		if($_POST){
			$data = array();
			$data['job_id'] = $_POST['job_id'];
			$data['task_name'] = $_POST['task_name'];
			$data['task_details'] = $_POST['task_details'];
			$data['total'] = $_POST['total'];
			$data['created_date'] = date('Y-m-d H:i:s');

			// $data = array();
			// $job_id = $job_id;
			// $task_name = $_POST['task_name'];
			// $task_details = $_POST['task_details'];
			// $total = $_POST['total'];
			// $created_date = date('Y-m-d H:i:s');


			$this->load->model('Sub_jobs_model');

			$add_sub_job = $this->Sub_jobs_model->addSubJob($data); 

			if($add_sub_job){
    			redirect(base_url().'index.php/Sub_jobs');
    		}
		}

		$this->load->model('Jobs_model');  

        $data['jobs_list']=$this->Jobs_model->getJobsDetails(); 
		$this->load->view('sub_jobs/add_sub_jobs',$data);

	}
	// public function add_sub_jobs(){
	// 	if(!$this->session->userdata('super_admin_logged_data')){
	// 		$redirect_url = base_url();
	// 		redirect($redirect_url, 'refresh');
	// 	}

	// 	if($_POST){

	// 		$data = array();
	// 		$data['job_id'] = $_POST['job_id'];
	// 		$data['job_title'] = $_POST['job_title'];
	// 		$data['task_name'] = $_POST['task_name'];
	// 		$data['task_details'] = $_POST['task_details'];
	// 		$data['total'] = $_POST['total'];
	// 		$data['created_date'] = date('Y-m-d H:i:s');


	// 		$this->load->model('Sub_jobs_model');

	// 		$add_sub_jobs = $this->Sub_jobs_model->addSubJobs($data);
			
	// 		if($add_sub_jobs){
	// 			redirect('Sub_jobs/index');			 
	// 			}
	// 	  }

	// 	  $this->load->model('Jobs_model'); 

 //        $data['jobs_list']=$this->Jobs_model->getJobsDetails();      

	// 	$this->load->view('sub_jobs/add_sub_jobs',$data);

	// 		}

		// public function edit_labours($id){

		// $this->load->model('Labours_model');
		// $data['labours_details_from_id'] = $this->Labours_model->getLaboursDetailsFromId($id);
		// if($_POST){

		// 	// $update_id = $_POST['update_id'];
		// 	$data = array();
		// 	$data['name'] = $_POST['name'];
		// 	$data['mobile'] = $_POST['mobile'];
		// 	$data['trade'] = $_POST['trade'];
		// 	$data['status'] = $_POST['status'];

			
		// 	$update_details = $this->Labours_model->updateLabours($update_id,$data);
		// 	if($update_details){
		// 		// echo "ssss";
		// 		// die();
		// 		redirect('Labours/index');
		// 	}
		// }
		// // $data['list_careers'] = $this->Career_model->listCareers();

		// 		$this->load->view('labours/edit_labours');

		// // $this->load->view('labours/edit_labours',$data);
		// }

		public function delete_subjobs($id){
			if(!isset($_SESSION['super_admin_logged_data'])){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}

			$this->db->where('id', $id);
	    	$delete = $this->db-> delete('sub_jobs');
			redirect('Sub_jobs/index');
	}
}
?>

