<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
	
	public function index($status='')
	{
		// if(!isset($_SESSION['super_admin_logged_data'])){
		// 	$redirect_url = base_url();
		// 	redirect($redirect_url, 'refresh');
		// }

		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);

		$this->load->model('Jobs_model'); 

        $data['jobs_list']=$this->Jobs_model->getJobsDetails($job_id='',$status);

		$this->load->view('jobs/jobs_list',$data);

	}

	public function create_job(){
		if($_POST){
			$data = array();
			$data['job_title'] = $_POST['job_title'];
			$data['job_description'] = $_POST['job_description'];
			$data['start_date'] = $_POST['start_date'];
			$data['finish_date'] = $_POST['finish_date'];
			$data['road_marking_sqm'] = $_POST['road_marking_sqm'];
			$data['stud_fixing_nos'] = $_POST['stud_fixing_nos'];
			$data['board_fixing_nos'] = $_POST['board_fixing_nos'];

			$this->load->model('Jobs_model');
			$add_jobs = $this->Jobs_model->addJobs($data);

			if($add_jobs){
    			redirect(base_url().'index.php/Jobs');
    		}
		}
		$this->load->view('jobs/create_job');

	}


	// public function create_sub_job($job_id){
	// 	if($_POST){
	// 		$data = array();
	// 		$data['job_id'] = $job_id;
	// 		$data['task_name'] = $_POST['task_name'];
	// 		$data['task_details'] = $_POST['task_details'];
	// 		$data['total'] = $_POST['total'];
	// 		$data['created_date'] = date('Y-m-d H:i:s');
		
	// 		$this->load->model('Jobs_model');

	// 		$add_sub_job = $this->Jobs_model->addSubJob($data);

	// 		if($add_sub_job){
 //    			redirect(base_url().'index.php/Jobs');
 //    		}
	// 	}
	// 	$this->load->view('jobs/create_sub_job');

	// }



	public function view_job_details($job_id){
		$this->load->model('Jobs_model');
		$this->load->model('Sub_jobs_model');
		if($_POST){
			$supervisor_list = $_POST;
			$delete_jobs_assigned = $this->Jobs_model->deleteJobsAssigned($job_id);

			foreach($supervisor_list as $key=>$value){
				if(!is_numeric($key)){
					continue;
				}
				$data = array();
				$data['job_id'] = $job_id;
				$data['supervisor_id'] = $key;
				$data['created_date'] = date('Y-m-d H:i:s');

				$add_supervisor_to_a_job = $this->Jobs_model->assignSupervisorToAJob($data);
			}
		}
		$data['supervisors_assigned'] = $this->Jobs_model->getSuperVisorAssigned($job_id);
		$data['get_added_comments'] = $this->Jobs_model->getAddedComments($job_id);
		$data['tools'] = $this->Jobs_model->getTools($job_id);
		$data['expenses'] = $this->Jobs_model->getExpenses($job_id);
		$data['labours'] = $this->Jobs_model->getLabours($job_id);
		$data['work_progress'] = $this->Jobs_model->getWorkProgress($job_id);
		$data['inventory'] = $this->Jobs_model->getInventory($job_id);
		$data['quality_check'] = $this->Jobs_model->getQualityCheck($job_id);
		$job_details = $this->Jobs_model->getJobsDetails($job_id);
		$data['job_details'] = $job_details[0];
		
		$data['sub_jobs'] = $this->Jobs_model->getSubJobDetails($job_id); 
		// print_r($data['sub_jobs']);
		// die();

		$this->load->model('Supervisors_model');
		$data['supervisors_details'] = $this->Supervisors_model->getSupervisorsDetails();

		$this->load->model('Jobs_model');
		$data['labours'] = $this->Jobs_model->getLaboursUnderJobid($job_id);


		$this->load->view('jobs/view_job_details',$data);

	}

	public function deleteJob($id){
		if(!$id){
			echo "Id is required";
			die();
		}
		$this->load->model('Jobs_model');
        $delete_job = $this->Jobs_model->deleteJob($id);
        if($delete_job){
        	redirect(base_url().'index.php/Jobs');
        }
	}

	// 	public function delete_labours($id){
	// 		if(!isset($_SESSION['super_admin_logged_data'])){
	// 		$redirect_url = base_url();
	// 		redirect($redirect_url, 'refresh');
	// 	}
	// 		$this->db->where('id', $id);
	//     	$delete = $this->db-> delete('labours_details');
	// 		redirect('Labours/index');
	// }
}
?>

