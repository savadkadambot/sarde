<?php
    class Messaging_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function getSuperVisorsList($data){
          
          $sql = "SELECT * FROM `supervisors_details`";
          $query= $this->db->query($sql);

          return $query->result_array();
        }

         public function sendMessage($data){
          $send_message = $this->db->insert('messagetosupervisor',$data);
        
          if($send_message){
            return true;
          }else{
            return false;
          }
        }

         public function listMessages(){
          $sql = "SELECT * FROM `messagetosupervisor`";
          $query= $this->db->query($sql);

          $i = 0;
          $data = array();
          foreach($query->result_array() as $row){
            $data[$i] = $row;
            if($row['visibility']=='every_one'){
              $data[$i]['receiver'] = 'All Supervisors';
            }else{
              $data[$i]['receiver'] = self::getSuperVisorNameFromId($row['visibility']);
            }
            $i = $i+1;
          }
          return $data;
        }

        public function getSuperVisorNameFromId($id){
          $sql = "SELECT id,name FROM `supervisors_details` WHERE id = $id";
          $result = $this->db->query($sql)->row();
          if($result){
            return $result->name;
          }else{
            return '';
          } 
        }  


        public function getRecentMessagingDetails(){

          $sql = "SELECT * FROM `messagetosupervisor` ORDER BY id DESC LIMIT 5";
          $query = $this->db->query($sql);

          $i = 0;
          $data = array();
         foreach($query->result_array() as $row){
            $data[$i] = $row;
            if($row['visibility']=='every_one'){
              $data[$i]['receiver'] = 'All Supervisors';
            }else{
              $data[$i]['receiver'] = self::getSuperVisorNameFromId($row['visibility']);
            }
            $i = $i+1;
          }
          return $data;

          } 

    }
?>