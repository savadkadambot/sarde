<?php
    class Supervisors_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }


        public function addSupervisors($data){
          $add_supervisors = $this->db->insert('supervisors_details',$data);
        
          if($add_supervisors){
            return true;
          }else{
            return false;
          }
        }


        public function getSupervisorsDetails(){ 
          $sql = "SELECT * FROM `supervisors_details` ORDER BY `id` DESC";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['name'] = $row['name'];
            $data[$i]['email'] = $row['email'];
            $data[$i]['password'] = $row['password'];
            $data[$i]['mobile'] = $row['mobile'];
            // if($row['status']==1){
            //     $active_status = "Active";
            // }else{
            //     $active_status = "Inactive";
            // }
            // $data[$i]['status'] = $row['status'];
            // if($row['status']==1){
            //     $active_status = "Active";
            // }else{
            //     $active_status = "Inactive";
            // }
            // $data[$i]['active_status'] = $active_status;
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
          return $data; 
        }  

        public function deleteSupervisors($id){
          // $sql = "UPDATE `supervisors_details` SET `status` = 0 WHERE id = $id";
         $sql = "UPDATE `supervisors_details` WHERE id = $id";

          $query = $this->db->query($sql);
          if($query){
            return true;
          }else{
            return false;
          }
        }
        
        public function checkEmailIsRegistered($email){
            $sql = "SELECT * FROM `supervisors_details` WHERE `email` = '$email'";
            $query = $this->db->query($sql);

            $result_array = $query->result_array();
            if(count($result_array)>0){
                return true;
            }else{
                return false;
            }
        }

        public function addLabour($data){
          $add_labour = $this->db->insert('labours_details',$data);
        
          if($add_labour){
            return true;
          }else{
            return false;
          }
        }

        public function getLaboursDetails($supervisor_id){ 
          $sql = "SELECT * FROM `labours_details` WHERE `user_id` = $supervisor_id ORDER BY `id` DESC";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['user_id'] = $row['user_id'];
            $data[$i]['name'] = $row['name'];
            $data[$i]['mobile'] = $row['mobile'];
            $data[$i]['trade'] = $row['trade'];
            // $data[$i]['type'] = $row['type'];
            // $data[$i]['hours'] = $row['hours'];
            // $data[$i]['active_status'] = $row['active_status'];
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
          return $data; 
        }  

        public function sendMessage($data){
          $send_message = $this->db->insert('messageToSupervisor',$data);
        
          if($send_message){
            return true;
          }else{
            return false;
          }
        }



        public function getAllSupervisorsList(){
          $sql = "SELECT id,name FROM `supervisors_details` WHERE status = 1";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['name'] = $row['name'];
           
            $i = $i+1;
          }
          return $data; 
        }  


        public function getSupervisorDetailsFromId($id){


            $sql = "SELECT * FROM `supervisors_details` WHERE `id`= $id LIMIT 1";
          $query= $this->db->query($sql);

          $data = array();
          foreach ($query->result_array() as $row) {
            $data['id'] = $id;
            $data['name'] = $row['name'];
            $data['email'] = $row['email'];
            $data['password'] = $row['password'];
            $data['mobile'] = $row['mobile'];
            $data['created_date'] = $row['created_date'];
        }
          return $data; 
            
        }

        public function updateSupervisor($update_id,$data){
          
          $this->db->where('id', $update_id);
          $update = $this->db->update('supervisors_details', $data);
          if($update){
            return true;
          }else{
            return false;
          }
        }


        


}
?>