<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {
	
	public function index()
	{
	    
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}

		$this->load->model('Jobs_model');
		$data['total_jobs_count'] = $this->Jobs_model->getTotalJobsCount();
		$data['total_supervisors_count'] = $this->Jobs_model->getTotalSuperVisorsCount();
		$data['total_labours_count'] = $this->Jobs_model->getLaboursCount();

		$data['jobs_list'] = $this->Jobs_model->getRecentJobsDetails();

		$this->load->model('Messaging_model');
		$data['messages_list'] = $this->Messaging_model->getRecentMessagingDetails();
		$this->load->view('common/header',$data);
		$this->load->view('admin_home/dashboard',$data);
		$this->load->view('common/footer',$data);	
	}


	// public function recent_jobs(){
		
	// 	$this->load->model('Jobs_model');

		

	// 	$this->load->view('admin_home/dashboard',$data);

	// }



	


}
 

