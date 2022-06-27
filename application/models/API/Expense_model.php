<?php
    class Expense_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function addExpense($post_data,$job_id){
          $add_expense = $this->db->insert('expenses',$post_data);
          if($add_expense){
            return true;
          }else{
            return false;
          }          
        }


        public function getExpenseDetails($user_id, $page_count, $page_offset, $job_id){ 
          $sql = "SELECT * FROM `expenses` WHERE `user_id` = $user_id and `job_id` = $job_id LIMIT $page_count OFFSET $page_offset";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            // $data[$i]['id'] = $row['id'];
            // $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['expense'] = $row['expense'];
            $data[$i]['amount'] = $row['amount'];
            $data[$i]['reference'] = $row['reference'];
            // $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }

          return $data; 
        }



         public function getExpensesComments(){ 
          $sql = "SELECT * FROM `expenses` ORDER BY `id` DESC";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['expense'] = $row['expense'];
            $data[$i]['amount'] = $row['amount'];
            $data[$i]['reference'] = $row['reference'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
          return $data; 
        }   


    }
?>
