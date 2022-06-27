<?php
    class Sub_jobs_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

         public function addSubJob($data){
            // ini_set('display_errors', 1);

         $add_sub_job = $this->db->insert('sub_jobs',$data);

   
          if($add_sub_job){
            return true;
          }else{
            return false;
          }
        }

        public function getSubJobsDetails(){ 

            $sql = "SELECT * FROM `sub_jobs`";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['job_id'] = $row['job_id'];
            $data[$i]['job_title'] = self::getJobNameFromJobId($row['job_id']);
            $data[$i]['task_name'] = $row['task_name'];
            $data[$i]['task_details'] = $row['task_details'];
            $data[$i]['total'] = $row['total'];
            // if($row['status']==1){
            //     $active_status = "Active";
            // }else{
            //     $active_status = "Inactive";
            // }
            // $data[$i]['status'] = $active_status;
            $data[$i]['created_date'] = $row['created_date'];
            $i = $i+1;
          }
      
          return $data; 
        } 

         public function getJobNameFromJobId($job_id){
            $job_id = 8;
            //$job_id = 1;
            $sql = "SELECT * FROM `jobs` WHERE `job_id` = $job_id";

            return '';
        }



//         public function deleteSubJobs($id){
//           $sql = "UPDATE `sub_jobs` SET `status` = 0 WHERE id = $id";
//           $query = $this->db->query($sql);
//           if($query){
//             return true;
//           }else{
//             return false;
//           }
//         }


}
?>