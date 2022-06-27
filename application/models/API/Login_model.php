<?php
    class Login_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function validateLogin($email, $password){
          $this->db->select('id,name,email,status,mobile');
          $this->db->from('supervisors_details');
          $this->db->where('email',$email);
          $this->db->where('password',$password);
          $this->db->where('status',1);
          $query = $this->db->get();
          if($query->num_rows() > 0){
             foreach ($query->result_array() as $row) {
                $data['id'] = $row['id'];
                $data['name'] = $row['name'];
                $data['mobile'] = $row['mobile'];
                $data['email'] = $row['email'];
                $data['status'] = $row['status'];
             }
             return $data;
          }else{
              return FALSE;
          }
        }

        public function addToLoggedDetails($access_token, $user_id){
          $data = array(
            'access_token' => $access_token,
            'user_id' => $user_id,
            'status' => 1           
          );
          $add_logged = $this->db->insert('sarde_logged',$data);

          if($add_logged){
            return true;
          }else{
            return false;
          }
        }

        public function checkAccessTokenIsValid($access_token){
          $this->db->select('');
          $this->db->from('sarde_logged');
          $this->db->where('access_token',$access_token);
          $this->db->where('status',1);
          $query = $this->db->get();
          if($query->num_rows() > 0){
             foreach ($query->result_array() as $row) {
                $data['id'] = $row['id'];
                $data['access_token'] = $row['access_token'];
                $data['user_id'] = $row['user_id'];
             }
             return $data;
          }else{
              return FALSE;
          }

        }

        public function expireAccessToken($access_token){
          $sql = "UPDATE `sarde_logged` SET `status` = 0 WHERE `access_token` = '$access_token'";
          $query = $this->db->query($sql);
          if($query){
            return true;
          }else{
            return false;
          }
        }

    }
?>
