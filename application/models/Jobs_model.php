<?php
    class Jobs_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

        public function getTotalJobsCount(){
            $sql = "SELECT count(*) as count FROM `jobs`";  
            $query= $this->db->query($sql);

            $result = $query->result_array();

            return $result[0]['count'];
        }

        public function getTotalSuperVisorsCount(){
            $sql = "SELECT count(*) as count FROM `supervisors_details`";  
            $query= $this->db->query($sql);

            $result = $query->result_array();

            return $result[0]['count'];
        }

         public function getLaboursCount(){
            $sql = "SELECT count(*) as count FROM `labours_details`";  
            $query= $this->db->query($sql);

            $result = $query->result_array();

            return $result[0]['count'];
        }


        public function addJobs($data){
            ini_set('display_errors', 1);

          $add_labours = $this->db->insert('jobs',$data);
        
          if($add_labours){
            return true;
          }else{
            return false;
          }
        }


        //    public function addSubJob($data){
        //     ini_set('display_errors', 1);

        //   $add_sub_job = $this->db->insert('sub_jobs',$data);
        
        //   if($add_sub_job){
        //     return true;
        //   }else{
        //     return false;
        //   }
        // }

        public function assignSupervisorToAJob($data){
          $jobs_assigned = $this->db->insert('jobs_assigned',$data);
        
          if($jobs_assigned){
            return true;
          }else{
            return false;
          }
        }





        public function getJobsDetails($job_id='',$status=''){  
            if($status == 'old_jobs'){
                $sql = "SELECT * FROM `jobs` WHERE `actual_finish_date` != ''";
            }else if($status == 'ongoing_jobs'){
                $sql = "SELECT * FROM `jobs` WHERE `actual_start_date` != '' AND `actual_finish_date` IS NULL ";
            }else if($status == 'pending_jobs'){
                $sql = "SELECT * FROM `jobs` WHERE `actual_start_date` IS NULL";
            }else{
                if($job_id){
                    $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
                }else{
                    $sql = "SELECT * FROM `jobs`";
                }
            }  
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
             $data[$i]['id'] = $row['id'];
                $data[$i]['job_title'] = $row['job_title'];
                $data[$i]['job_description'] = $row['job_description'];
                $data[$i]['start_date'] = $row['start_date'];
                $data[$i]['finish_date'] = $row['finish_date'];               
                $data[$i]['actual_start_date'] = $row['actual_start_date'];
                $data[$i]['actual_finish_date'] = $row['actual_finish_date'];
                $data[$i]['road_marking_sqm'] = $row['road_marking_sqm'];
                $data[$i]['stud_fixing_nos'] = $row['stud_fixing_nos'];
                $data[$i]['board_fixing_nos'] = $row['board_fixing_nos'];
                // $data[$i]['status'] = $row['status'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
          }

          return $data; 
        } 


        public function getSubJobDetails($job_id=''){  
                    $sql = "SELECT * FROM `sub_jobs` WHERE `job_id` = $job_id";
                
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
                $data[$i]['id'] = $row['id'];
                $data[$i]['task_name'] = $row['task_name'];
                $data[$i]['task_details'] = $row['task_details'];
                $data[$i]['total'] = $row['total'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
          }

          return $data; 
        } 


        public function getSuperVisorAssigned($job_id){    
          $sql = "SELECT * FROM `jobs_assigned` WHERE `job_id` = $job_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
             $data[$i] = $row['supervisor_id'];
             $i = $i+1;
          }

          return $data; 
        } 

        public function deleteJobsAssigned($job_id){  
          $this->db->delete('jobs_assigned', array('job_id' => $job_id));
        } 



        public function deleteJob($id){
            $this->db->delete('jobs', array('id' => $id));
            return true;
        }

        public function getAddedComments($job_id){
            //$job_id = 1;
            $sql = "SELECT * FROM `jobs_comments` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['id'] = $row['id'];
                $data[$i]['user_id'] = $row['user_id'];
                $data[$i]['user_name'] = self::getNameFromUserId($row['user_id']);
                $data[$i]['comment'] = $row['comment'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

        public function getNameFromUserId($user_id){
           // $user_id = 5;
            $sql = "SELECT 'name' FROM `supervisors_details` WHERE `id` = $user_id";
            $query= $this->db->query($sql);

            if(count($query->result_array())>0){
                $result = $query->result_array();
                $result = $result[0];
                $name = $result['name'];
                return $name;
            }else{
                return '';
            }
        }

         public function getLaboursUnderJobid($job_id){
            $sql = "SELECT * FROM `labours_details` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            return $query->result_array();
        }

         public function getTools($job_id){
            //$job_id = 1;
            $sql = "SELECT * FROM `tools` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['item'] = $row['item'];
                $data[$i]['quantity'] = $row['quantity'];
                $data[$i]['condition'] = $row['condition'];
               $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

        public function getExpenses($job_id){
            //$job_id = 1;
            $sql = "SELECT * FROM `expenses` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['expense'] = $row['expense'];
                $data[$i]['amount'] = $row['amount'];
                $data[$i]['reference'] = $row['reference'];
               $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

         public function getLabours($job_id){
            //$job_id = 1;
            $sql = "SELECT * FROM `labours_worked` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['name'] = $row['name'];
                $data[$i]['trade'] = $row['trade'];
                $data[$i]['type'] = $row['type'];
                $data[$i]['hours'] = $row['hours'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

         public function getWorkProgress($job_id){
            //$job_id = 1;
            $sql = "SELECT * FROM `work_progress` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['subjob_id'] = $row['subjob_id'];
                //$data[$i]['subjob_id'] = self::getCategoryName($row['subjob_id']);
                $data[$i]['item_description'] = $row['item_description'];
                $data[$i]['no'] = $row['no'];
                $data[$i]['length'] = $row['length'];
                $data[$i]['width'] = $row['width'];
                $data[$i]['meter_sqr'] = $row['meter_sqr'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

        

        public function getInventory($job_id){
            $sql = "SELECT * FROM `inventory` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['subjob_id'] = $row['subjob_id'];
                //$data[$i]['subjob_id'] = self::getCategoryName($row['subjob_id']);
                $data[$i]['item'] = $row['item'];
                $data[$i]['quantity'] = $row['quantity'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }


         public function getQualityCheck($job_id){
            $sql = "SELECT * FROM `quality_check` WHERE `job_id` = $job_id";
            $query= $this->db->query($sql);

            $data = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $data[$i]['subjob_id'] = $row['subjob_id'];
                //$data[$i]['subjob_id'] = self::getCategoryName($row['subjob_id']);
                $data[$i]['file_name'] = $row['file_name'];
                $data[$i]['thickness'] = $row['thickness'];
                $data[$i]['edge_alignment'] = $row['edge_alignment'];
                $data[$i]['comment'] = $row['comment'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }

         public function getCategoryName($subjob_id){
            // if($subjob_id==$)
          // if($subjob_id==1){
          //   return 'Road Marking';
          // }else if($subjob_id==2){
          //   return "Stud Fixing";
          // }else  if($subjob_id==3){
          //   return 'Board Fixing';
          // }else{
          //   return '';
          // }

        }

        

        public function getRecentJobsDetails(){
        
            $sql = "SELECT * from jobs order by id desc limit 5";
            $query= $this->db->query($sql);

             $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
             $data[$i]['id'] = $row['id'];
                $data[$i]['job_title'] = $row['job_title'];
                $data[$i]['job_description'] = $row['job_description'];
                $data[$i]['start_date_time'] = $row['start_date_time'];
                $data[$i]['finish_date_time'] = $row['finish_date_time'];
                $data[$i]['road_marking_sqm'] = $row['road_marking_sqm'];
                $data[$i]['stud_fixing_nos'] = $row['stud_fixing_nos'];
                $data[$i]['board_fixing_nos'] = $row['board_fixing_nos'];
                $data[$i]['created_date'] = $row['created_date'];
             
                $i = $i+1;
          }

         
// print_r($data);
// die();
          return $data; 


        }


}
?>