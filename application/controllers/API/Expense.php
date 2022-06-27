<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

	public function add_expense()
	{
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$job_id = $_POST['job_id'];

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
			'expense' => $_POST['expense'],
			'amount' => $_POST['amount'],
			'reference' => $_POST['reference']
		);

		$this->load->model('API/Expense_model','API_EXPENSE_MODEL');
		$add_expense = $this->API_EXPENSE_MODEL->addExpense($post_data,$job_id);

		if($add_expense === true){
			$response = array();
			$response['result'] = 'expense_added_successfully';
			$response['status'] = 'success';
		}else{
			$response = array();
			$response['result'] = 'failed_to_add_the_expense';
			$response['status'] = 'failed';
		}
		echo json_encode($response);
		die();
	}

	public function list_all_expenses(){
		header('Content-type: application/json');
		$this->load->helper('string');

		$access_token = $_POST['access_token'];
		$page_count = $_POST['page_count'];
		$page_offset = $_POST['page_offset'];
		$job_id = $_POST['job_id'];


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

	 	$this->load->model('API/Expense_model','API_EXPENSE_MODEL'); 
        $expense_list = $this->API_EXPENSE_MODEL->getExpenseDetails($user_id, $page_count, $page_offset, $job_id);
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


	public function list_expenses_comments(){

		$this->load->model('API/Expense_model','EXPENSE_MODEL'); 

        $data['jobs_list']=$this->EXPENSE_MODEL->getExpensesComments();
    
		$this->load->view('comments/expenses',$data);
	}

}

