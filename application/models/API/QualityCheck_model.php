<?php
    class QualityCheck_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function addQualityCheck($user_id, $file_name, $job_id, $subjob_id, $location, $thickness, $edge_alignment, $comment){
          $data = array(
            'user_id' => $user_id,
            'file_name' => $file_name,
            'job_id' => $job_id,
            'subjob_id' => $subjob_id,
            'location' => $location,
            'thickness' => $thickness,
            'edge_alignment' => $edge_alignment,
            'comment' => $comment,
            'created_date' => date('Y-m-d H:i:s')
          );
       
          $add_quality_check = $this->db->insert('quality_check',$data);
          if($add_quality_check){
            return true;
          }else{
            return false;
          }          
        }

        public function listQualityCheck($user_id, $job_id, $subjob_id){
          $sql = "SELECT * FROM `quality_check` WHERE `user_id` = $user_id and `job_id` = $job_id and `subjob_id` = $subjob_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
             $data[$i]['id'] = $row['id'];
             $data[$i]['user_id'] = $row['user_id'];
             $data[$i]['job_id'] = $row['job_id'];
             $data[$i]['file_name'] = $row['file_name'];
             $data[$i]['file_full_url'] = base_url().'uploads/'.$row['file_name'];
             $data[$i]['subjob_id'] = $row['subjob_id'];
             $data[$i]['location'] = $row['location'];
             $data[$i]['thickness'] = $row['thickness'];
             $data[$i]['edge_alignment'] = $row['edge_alignment'];
             $data[$i]['comment'] = $row['comment'];
             $data[$i]['created_date'] = $row['created_date'];             
             $i = $i+1;
          }
          return $data;
        }
    }
?>
