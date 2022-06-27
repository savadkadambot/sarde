<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Labours extends CI_Controller {
    
	
	public function index()
	{
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}


		$this->load->model('Labours_model'); 

         $data['get_labours_details']=$this->Labours_model->getLaboursDetails();
        
			$this->load->view('labours/labours_list',$data);		
	}




	public function add_labours(){
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}


		if($_POST){

			$data = array();
			$data['job_id'] = $_POST['job_id'];
			$data['name'] = $_POST['name'];
			$data['mobile'] = $_POST['mobile'];
			$data['trade'] = $_POST['trade'];
			$data['created_date'] = date('Y-m-d H:i:s');


			$this->load->model('Labours_model');
			$add_labours = $this->Labours_model->addlabours($data);
			
			if($add_labours){
				redirect('Labours');			 
				}
		  }

		  $this->load->model('Jobs_model'); 

        $data['jobs_list']=$this->Jobs_model->getJobsDetails();      

		$this->load->view('labours/add_labours',$data);

			}

		public function edit_labours($id){
		$this->load->model('Labours_model');

		
		if($_POST){

			$update_id = $_POST['update_id'];
			$post_data = array();
			$post_data['name'] = $_POST['name'];
			$post_data['mobile'] = $_POST['mobile'];
			$post_data['trade'] = $_POST['trade'];
			//$post_data['status'] = $_POST['status'];

			
			$update_details = $this->Labours_model->updateLabours($update_id,$post_data);
			if($update_details){
				// echo "ssss";
				// die();
				redirect('Labours/index');
			}
		}
		$data['labours_details_from_id'] = $this->Labours_model->getLaboursDetailsFromId($id);
		// $data['list_careers'] = $this->Career_model->listCareers();

				$this->load->view('labours/edit_labours',$data);

		// $this->load->view('labours/edit_labours',$data);
		}

		public function delete_labours($id){
			if(!isset($_SESSION['super_admin_logged_data'])){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}
			$this->db->where('id', $id);
	    	$delete = $this->db-> delete('labours_details');
			redirect('Labours/index');
	}
}
?>

