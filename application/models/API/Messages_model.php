<?php
    class Messages_model extends CI_Model
    {
        public function __construct()
        {
                $this->load->database();
        }

         public function getMessages($user_id){ 
         // $sql = "SELECT * FROM `messagetosupervisor` WHERE `visibility` = 1 OR `supervisor_id` = '$user_id'";

          $sql = "SELECT * FROM `messagetosupervisor` WHERE `visibility` = 'every_one' OR `visibility` = $user_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
             $data[$i]['id'] = $row['id'];
             $data[$i]['visibility'] = $row['visibility'];
             $data[$i]['supervisor_id'] = $row['supervisor_id'];
             $data[$i]['message_title'] = $row['message_title'];
             $data[$i]['message_description'] = $row['message_description'];
             $data[$i]['created_date'] = $row['created_date'];
             $i = $i+1;
          }

          return $data; 
        } 


        public function listJobs($user_id, $page_count, $page_offset){ 
          $sql = "SELECT * FROM `jobs_assigned` WHERE `supervisor_id` = $user_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $job_id = $row['job_id'];
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id LIMIT 1";
            $query = $this->db->query($sql);

            foreach($query->result_array() as $row){
                if($row['finish_date_time']){
                    continue;
                }
                $data[$i]['id'] = $row['id'];
                $data[$i]['job_title'] = $row['job_title'];
                $data[$i]['job_description'] = $row['job_description'];
                $data[$i]['start_date_time'] = $row['start_date_time'];
                $data[$i]['finish_date_time'] = $row['finish_date_time'];
                $data[$i]['road_marking_sqm'] = $row['road_marking_sqm'];
                $data[$i]['stud_fixing_nos'] = $row['stud_fixing_nos'];
                $data[$i]['board_fixing_nos'] = $row['board_fixing_nos'];
                $data[$i]['total_hours_took'] = 0;
                $data[$i]['averege_completed'] = 50;
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
          }
          return $data; 
        }

        public function checkUserAssignedToJob($user_id, $job_id){
            $sql = "SELECT * FROM `jobs_assigned` WHERE `job_id` = $job_id and `supervisor_id` = $user_id";
            $query_result = $this->db->query($sql)->row();

            return $query_result;
        }

        public function startAJob($user_id, $job_id){
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
            $result = $this->db->query($sql)->row();

            $job_id = $result->id;

            if($result->start_date_time){
                return array('status'=>'failed','message'=>'start_date_time_already_updated');
            }

            $data = array(
             'start_date_time' => date('Y-m-d H:i:s'),
             );
             
            $update = $this->db->update('jobs',$data,'id='.$job_id);
            if($update){
                return array('status'=>'success','message'=>'job_start_time_updated_successfully');
            }else{
                return false;
            }
        }

        public function endAJob($user_id, $job_id){
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
            $result = $this->db->query($sql)->row();

            $job_id = $result->id;

            if($result->finish_date_time){
                return array('status'=>'failed','message'=>'finish_date_time_already_updated');
            }

            $data = array(
             'finish_date_time' => date('Y-m-d H:i:s'),
             );
             
            $update = $this->db->update('jobs',$data,'id='.$job_id);
            if($update){
                return array('status'=>'success','message'=>'finish_date_time_updated_successfully');
            }else{
                return false;
            }
        }

        public function updateRoadMakingSqm($user_id, $job_id, $road_marking_sqm){
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
            $result = $this->db->query($sql)->row();

            $job_id = $result->id;

            // if($result->finish_date_time){
            //     return array('status'=>'failed','message'=>'finish_date_time_already_updated');
            // }

            $data = array(
             'road_marking_sqm' => $road_marking_sqm,
             );
             
            $update = $this->db->update('jobs',$data,'id='.$job_id);
            if($update){
                return array('status'=>'success','message'=>'road_marking_sqm_updated_successfully');
            }else{
                return false;
            }
        }

        public function updateStudFixingNos($user_id, $job_id, $stud_fixing_nos){
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
            $result = $this->db->query($sql)->row();

            $job_id = $result->id;

            // if($result->finish_date_time){
            //     return array('status'=>'failed','message'=>'finish_date_time_already_updated');
            // }

            $data = array(
             'stud_fixing_nos' => $stud_fixing_nos,
             );
             
            $update = $this->db->update('jobs',$data,'id='.$job_id);
            if($update){
                return array('status'=>'success','message'=>'stud_fixing_nos_updated_successfully');
            }else{
                return false;
            }
        }

        public function updateBoardFixingNos($user_id, $job_id, $stud_fixing_nos){
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id";
            $result = $this->db->query($sql)->row();

            $job_id = $result->id;

            // if($result->finish_date_time){
            //     return array('status'=>'failed','message'=>'finish_date_time_already_updated');
            // }

            $data = array(
             'board_fixing_nos' => $board_fixing_nos,
             );
             
            $update = $this->db->update('jobs',$data,'id='.$job_id);
            if($update){
                return array('status'=>'success','message'=>'board_fixing_nos_updated_successfully');
            }else{
                return false;
            }
        }


        public function listOldJobs($user_id, $page_count, $page_offset){ 
          $sql = "SELECT * FROM `jobs_assigned` WHERE `supervisor_id` = $user_id";
          $query= $this->db->query($sql);

          $data = array();
          $i = 0;
          foreach ($query->result_array() as $row) {
            $job_id = $row['job_id'];
            $sql = "SELECT * FROM `jobs` WHERE `id` = $job_id AND `finish_date_time` != '' LIMIT 1";
            $query = $this->db->query($sql);

            foreach($query->result_array() as $row){
                $data[$i]['id'] = $row['id'];
                $data[$i]['job_title'] = $row['job_title'];
                $data[$i]['job_description'] = $row['job_description'];
                $data[$i]['start_date_time'] = $row['start_date_time'];
                $data[$i]['finish_date_time'] = $row['finish_date_time'];
                $data[$i]['road_marking_sqm'] = $row['road_marking_sqm'];
                $data[$i]['stud_fixing_nos'] = $row['stud_fixing_nos'];
                $data[$i]['board_fixing_nos'] = $row['board_fixing_nos'];
                $data[$i]['total_hours_took'] = 0;
                $data[$i]['averege_completed'] = 0;
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
          }
          return $data; 
        }


        public function commentAJob($user_id, $job_id, $comment){
            $data = array(
                'user_id' => $user_id,
                'job_id' => $job_id,
                'comment' => $comment,
                'created_date' => date('Y-m-d H:i:s')
            );
            $add_comment = $this->db->insert('jobs_comments',$data);

            if($add_comment){
                return true;
            }else{
                return false;
            }
        }

        public function getCommentsUnderJobId($user_id, $job_id){
            $sql = "SELECT * FROM `jobs_comments` WHERE `job_id` = $job_id";
            $query = $this->db->query($sql);

            foreach($query->result_array() as $row){
                $data[$i]['id'] = $row['id'];
                $data[$i]['user_id'] = $row['user_id'];
                $data[$i]['job_id'] = $row['job_id'];
                $data[$i]['comment'] = $row['comment'];
                $data[$i]['created_date'] = $row['created_date'];
                $i = $i+1;
            }
            return $data;
        }


        // public function messageAJob($user_id, $job_id, $comment){
        //     $data = array(
        //         'user_id' => $user_id,
        //         'job_id' => $job_id,
        //         'comment' => $comment,
        //         'created_date' => date('Y-m-d H:i:s')
        //     );
        //     $add_comment = $this->db->insert('jobs_comments',$data);

        //     if($add_comment){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }

        // public function getCommentsUnderJobId($user_id, $job_id){
        //     $sql = "SELECT * FROM `jobs_comments` WHERE `job_id` = $job_id";
        //     $query = $this->db->query($sql);

        //     foreach($query->result_array() as $row){
        //         $data[$i]['id'] = $row['id'];
        //         $data[$i]['user_id'] = $row['user_id'];
        //         $data[$i]['job_id'] = $row['job_id'];
        //         $data[$i]['comment'] = $row['comment'];
        //         $data[$i]['created_date'] = $row['created_date'];
        //         $i = $i+1;
        //     }
        //     return $data;
        // }



    }
?>
