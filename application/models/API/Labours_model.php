<?php
    class Labours_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function addLabours($post_data){
          
          $add_labours = $this->db->insert('labours_worked',$post_data);
          if($add_labours){
            return true;
          }else{
            return false;
          }          
        }


        public function getLaboursDetails($user_id,$job_id){ 
          $sql = "SELECT * FROM `labours_worked` WHERE `job_id` = $job_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['job_id'] = $row['job_id'];
            $data[$i]['name'] = $row['name'];
            $data[$i]['trade'] = $row['trade'];
            $data[$i]['type'] = $row['type'];
            $data[$i]['hours'] = $row['hours'];
            //$data[$i]['own'] = $row['own'];
            $i = $i+1;
          }

          return $data; 
        } 

        public function getAdminAssignedLabours($user_id,$job_id){ 
          $sql = "SELECT * FROM `labours_details` WHERE `job_id` = $job_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['job_id'] = $row['job_id'];
            $data[$i]['name'] = $row['name'];
            $data[$i]['trade'] = $row['trade'];
            $data[$i]['mobile'] = $row['mobile'];
            $data[$i]['created_date'] = $row['created_date'];
            //$data[$i]['own'] = $row['own'];
            $i = $i+1;
          }

          return $data; 
        } 





        //  public function getLaboursDetails(){ 

        

        //     $sql = "SELECT * FROM `labours_details`";
        //   $query= $this->db->query($sql);

        //   $data = array();
        //   $i = 0;
        //   foreach ($query->result_array() as $row) {
        //     $data[$i]['id'] = $row['id'];
        //     $data[$i]['name'] = $row['name'];
        //     $data[$i]['mobile'] = $row['mobile'];
        //     $data[$i]['trade'] = $row['trade'];
        //     if($row['status']==1){
        //         $active_status = "Active";
        //     }else{
        //         $active_status = "Inactive";
        //     }
        //     $data[$i]['status'] = $active_status;
        //     $data[$i]['created_date'] = $row['created_date'];
        //     $i = $i+1;
        //   }

        //   return $data; 
        // }


    }
?>
