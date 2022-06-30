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
        	$this->load->view('common/header');
			$this->load->view('sub_jobs/sub_jobs_list',$data);
			$this->load->view('common/footer');	
	}



	public function create_sub_job(){
		if($_POST){
			$data = array();
			$data['job_id'] = $_POST['job_id'];
			$data['task_name'] = $_POST['task_name'];
			$data['task_details'] = $_POST['task_details'];
			$data['total'] = $_POST['total'];
			$data['created_date'] = date('Y-m-d H:i:s');



			$this->load->model('Sub_jobs_model');

			$add_sub_job = $this->Sub_jobs_model->addSubJob($data); 

			if($add_sub_job){
    			redirect(base_url().'index.php/Sub_jobs');
    		}
		}

		$this->load->model('Jobs_model');  

        $data['jobs_list']=$this->Jobs_model->getJobsDetails(); 
        $this->load->view('common/header');
		$this->load->view('sub_jobs/add_sub_jobs',$data);
		$this->load->view('common/footer');
	}
	
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

