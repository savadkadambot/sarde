<?php

	
defined('BASEPATH') OR exit('No direct script access allowed');

class Messaging extends CI_Controller {
	
	public function list()
	{
		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}


		$this->load->model('Messaging_model'); 

         $data['get_messages']=$this->Messaging_model->listMessages();
		$this->load->view('messaging/list',$data);		
	}


	public function send_message(){

		if(!$this->session->userdata('super_admin_logged_data')){
			$redirect_url = base_url();
			redirect($redirect_url, 'refresh');
		}
		$this->load->model('Messaging_model');

		// $supervisor_details = $this->Messaging_model->getSuperVisorsList($data);
		$this->load->model('Supervisors_model');

		$data['all_supervisors_list'] = $this->Supervisors_model->getAllSupervisorsList();

		if($_POST){
			$post_data = array();
			$post_data['visibility'] = $_POST['visibility'];
			//$data['supervisor_id'] = ;
			$post_data['message_title'] = $_POST['message_title'];
			$post_data['message_description'] = $_POST['message_description'];
			$post_data['created_date'] = date('Y-m-d H:i:s');

			$this->load->model('Messaging_model');
			$send_message = $this->Messaging_model->sendMessage($post_data);

			if($send_message){
				redirect('Messaging/list');			 
				}
		}
		$this->load->view('messaging/send_message',$data);

	}

		public function delete_message($id){
			if(!isset($_SESSION['super_admin_logged_data'])){
				$redirect_url = base_url();
				redirect($redirect_url, 'refresh');
			}
			$this->db->where('id', $id);
	    	$delete = $this->db-> delete('messagetosupervisor');
			redirect('Messaging/list');
		}

}

?>