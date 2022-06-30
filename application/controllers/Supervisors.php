<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisors extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }
	
	public function index()
	{
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}

		$this->load->model('Supervisors_model'); 
		$data['get_supervisors_details']=$this->Supervisors_model->getSupervisorsDetails();
		$this->load->view('common/header');
		$this->load->view('supervisors/supervisors_list',$data);
		$this->load->view('common/footer');			
	}

	public function add_supervisors(){
  	 if(!isset($_SESSION['super_admin_logged_data'])){
	  		$redirect_url = base_url();
		  	redirect($redirect_url, 'refresh');
		 }

		 $this->load->model('Supervisors_model');
		 $data['error_message'] = '';
		 $data['name'] = '';
		 $data['email'] = '';
		 $data['password'] = '';
		 $data['mobile'] = '';
		 // $data['active_status'] = '';

		 if($_POST){
		 		$check_email_is_registered = $this->Supervisors_model->checkEmailIsRegistered($_POST['email']);
		 		if($check_email_is_registered === true){
		 			$data['error_message'] = 'Email Already Registered';
		 			$data['name'] = $_POST['name'];
		 			$data['email'] = $_POST['email'];
		 			$data['password'] = $_POST['password'];
		 			$data['mobile'] = $_POST['mobile'];
		 			// $data['active_status'] = $_POST['active_status'];
		 		}else{
		 			$post_data = array();
					$post_data['name'] = $_POST['name'];
					$post_data['email'] = $_POST['email'];
					$post_data['password'] = $_POST['password'];
					$post_data['mobile'] = $_POST['mobile'];
					// $post_data['status'] = $_POST['status'];

					$this->load->model('Supervisors_model');
					$add_supervisors = $this->Supervisors_model->addSupervisors($post_data);
					
					if($add_supervisors){
						redirect('Supervisors');			 
					}else{
						$data['error_message'] = 'Failed';
					}
		 		}
		  }
		  $this->load->view('common/header');
			$this->load->view('supervisors/add_supervisors',$data);
			$this->load->view('common/footer');

		}

		public function delete_supervisors($id){
			if(!isset($_SESSION['super_admin_logged_data'])){
				$redirect_url = base_url();
				redirect($redirect_url, 'refresh');
			}
			$this->db->where('id', $id);
	    	$delete = $this->db-> delete('supervisors_details');
			redirect('Supervisors/index');
		}

		public function list_labours($supervisor_id)
		{
			if(!$this->session->userdata('super_admin_logged_data')){
				$redirect_url = base_url();
				redirect($redirect_url, 'refresh');
			}

			$this->load->model('Supervisors_model'); 
			$data['labours_details']=$this->Supervisors_model->getLaboursDetails($supervisor_id);
			$data['supervisor_id']=$supervisor_id;
			
			$this->load->view('supervisors/labours_list',$data);			
		}

		public function add_labours($supervisor_id){
  	 if(!isset($_SESSION['super_admin_logged_data'])){
	  		$redirect_url = base_url();
		  	redirect($redirect_url, 'refresh');
		 }

		 $this->load->model('Supervisors_model');
		 $data['error_message'] = '';
		 // $data['name'] = '';
		 // $data['email'] = '';
		 // $data['password'] = '';
		 // $data['mobile'] = '';
		 // $data['active_status'] = '';

		 if($_POST){
		 			$post_data = array();
		 			$post_data['user_id'] = $supervisor_id;
					$post_data['name'] = $_POST['name'];
					$post_data['mobile'] = $_POST['mobile'];
					$post_data['trade'] = $_POST['trade'];
					// $post_data['type'] = $_POST['type'];
					// $post_data['hours'] = $_POST['hours'];
					$post_data['created_date'] = date('Y-m-d H:i:s');

					$add_labour = $this->Supervisors_model->addLabour($post_data);
					
					if($add_labour){
						redirect('Supervisors/list_labours/'.$supervisor_id);			 
					}else{
						$data['error_message'] = 'Failed';
					}
		  }
			$this->load->view('supervisors/add_labours',$data);
		}


		public function delete_labours($supervisor_id,$labour_id){

				if(!isset($_SESSION['super_admin_logged_data'])){
			   $redirect_url = base_url();
			   redirect($redirect_url, 'refresh');
		    }
			$this->db->where('id', $labour_id);
	    	$delete = $this->db-> delete('labours_details');
			redirect('Supervisors/list_labours/'.$supervisor_id);
			
		}


		public function send_message($id){
	
				 if(!isset($_SESSION['super_admin_logged_data'])){
	  		$redirect_url = base_url();
		  	redirect($redirect_url, 'refresh');
		 }

		 $this->load->model('Supervisors_model');
		 

		 if($_POST){
		 		
		 			$post_data = array();
		 			$post_data['supervisor_id'] = $id;
					$post_data['message'] = $_POST['message'];
					$this->load->model('Supervisors_model');
					$add_supervisors = $this->Supervisors_model->sendMessage($post_data);
					
					if($add_supervisors){
						redirect('Supervisors');			 
					}else{
						$data['error_message'] = 'Failed';
					}
		 		}
		 		$this->load->view('supervisors/messages',$data);
		  }


		 public function edit_supervisor($id){

		$this->load->model('Supervisors_model');

		if($_POST){

			$update_id = $_POST['update_id'];
			$post_data = array();
			$post_data['name'] = $_POST['name'];
			$post_data['email'] = $_POST['email'];
			$post_data['password'] = $_POST['password'];
			$post_data['mobile'] = $_POST['mobile'];
			//$post_data['status'] = $_POST['status'];

			$update_details = $this->Supervisors_model->updateSupervisor($update_id,$post_data);
			if($update_details){
				// echo "ssss";
				// die();
				redirect('Supervisors/index');
			}
		}

		$data['supervisor_details_from_id'] = $this->Supervisors_model->getSupervisorDetailsFromId($id);
		// $data['list_careers'] = $this->Career_model->listCareers();
				$this->load->view('common/header');
				$this->load->view('supervisors/edit_supervisor',$data);
				$this->load->view('common/footer');


		// $this->load->view('labours/edit_labours',$data);
		}

		
}
?>

