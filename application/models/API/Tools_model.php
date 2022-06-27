<?php
    class Tools_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function addTools($post_data){
          $add_tools = $this->db->insert('tools',$post_data);
          if($add_tools){
            return true;
          }else{
            return false;
          }          
        }


        public function getToolsDetails($user_id, $page_count, $page_offset, $job_id){ 
          $sql = "SELECT * FROM `tools` WHERE `user_id` = $user_id and `job_id` = $job_id LIMIT $page_count OFFSET $page_offset";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['job_id'] = $row['job_id'];
            $data[$i]['item'] = $row['item'];
            $data[$i]['quantity'] = $row['quantity'];
            $data[$i]['condition'] = $row['condition'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }

          return $data; 
        }



         public function getToolsComments(){ 
          $sql = "SELECT * FROM `tools` ORDER BY `id` DESC";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['item'] = $row['tools'];
            $data[$i]['quantity'] = $row['quantity'];
            $data[$i]['condition'] = $row['condition'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
          return $data; 
        }   


    }
?>
