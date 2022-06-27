<?php
    class Admin_login_model extends CI_Model {

        public function validateLogin($username, $password){  
            $sql = "SELECT * FROM `admin_login` WHERE `username` = '$username' AND `password` = '$password'";   
            $query = $this->db->query($sql)->row();
            $data = array();
            if($query){
                $data['id'] = $query->id;
                $data['admin_name'] = 'Super Admin';
                $data['email'] = $query->email;
            }
            return $data;
        }

}