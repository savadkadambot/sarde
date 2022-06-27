<?php
    class Labours_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

         public function addlabours($data){
          $add_labours = $this->db->insert('labours_details',$data);
        
          if($add_labours){
            return true;
          }else{
            return false;
          }
        }

        public function getLaboursDetails(){ 


            $sql = "SELECT * FROM `labours_details`";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['job_id'] = $row['job_id'];
            // $data[$i]['job_title'] = self::getJobNameFromJobId($row['job_id']);
            $data[$i]['job_title'] = self::getJobNameFromJobId($row['id']);
            $data[$i]['name'] = $row['name'];
            $data[$i]['mobile'] = $row['mobile'];
            $data[$i]['trade'] = $row['trade'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
          return $data; 
        } 

         public function getJobNameFromJobId($job_id){
            $job_id = 8;
            //$job_id = 1;
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";

            return '';
        }





        public function getLaboursDetailsFromId($id){


            $sql = "SELECT * FROM `labours_details` WHERE `id`= $id LIMIT 1";
          $query= $this->db->query($sql);

          $data = array();
          foreach ($query->result_array() as $row) {
            $data['id'] = $id;
            $data['job_id'] = $row['job_id'];
            $data['name'] = $row['name'];
            $data['mobile'] = $row['mobile'];
            $data['trade'] = $row['trade'];
            $data['created_date'] = $row['created_date'];
        }
          return $data; 
            
        }

        public function updateLabours($update_id,$data){
          
          $this->db->where('id', $update_id);
          $update = $this->db->update('labours_details', $data);
          if($update){
            return true;
          }else{
            return false;
          }
        }

        public function deleteLabours($id){
          $sql = "UPDATE `labours_details` SET `status` = 0 WHERE id = $id";
          $query = $this->db->query($sql);
          if($query){
            return true;
          }else{
            return false;
          }
        }


}
?>