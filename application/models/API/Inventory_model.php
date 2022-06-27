<?php
    class Inventory_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function addItem($post_data){
          $add_item = $this->db->insert('inventory',$post_data);
          if($add_item){
            return true;
          }else{
            return false;
          }          
        }


          public function getItemDetails($user_id, $job_id, $subjob_id){ 
          // $sql = "SELECT * FROM `inventory` WHERE `user_id` = $user_id and `job_id` = $job_id and `subjob_id` = $subjob_id LIMIT $page_count OFFSET $page_offset";

            $sql = "SELECT * FROM `inventory` WHERE `user_id` = $user_id and `job_id` = $job_id and `subjob_id` = $subjob_id";

          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['job_id'] = $row['job_id'];
            $data[$i]['subjob_id'] = $row['subjob_id'];
            $data[$i]['item'] = $row['item'];
            $data[$i]['quantity'] = $row['quantity'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }

          return $data; 
        } 

    }
?>
