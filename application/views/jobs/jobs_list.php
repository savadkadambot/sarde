
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Jobs</h2>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <ul>
    <div class="row">
        <div class="col-12">
          <a style="margin-left:3px" class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Jobs/create_job">Create New Job</a>
          <a style="margin-left:3px" class="btn btn-info float-right" href="<?php echo base_url(); ?>index.php/Jobs/index/pending_jobs">Pending Jobs</a>
          <a style="margin-left:3px" class="btn btn-info float-right" href="<?php echo base_url(); ?>index.php/Jobs/index/ongoing_jobs">Ongoing Jobs</a>
          <a style="margin-left:3px" class="btn btn-info float-right" href="<?php echo base_url(); ?>index.php/Jobs/index/old_jobs">Old Jobs</a>
          <a style="margin-left:3px" class="btn btn-info float-right" href="<?php echo base_url(); ?>index.php/Jobs">All Jobs</a>

          



        </div>
      </div>



     </ul>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <th style="width: 1%">
                          Job Id
                      </th>
                      <th style="width: 20%">
                          Job Title
                      </th>
                       <th style="width: 20%">
                          Start Date
                      </th>
                       <th style="width: 20%">
                          Finish Date
                      </th>
                      <th style="width: 20%">
                          Created Date
                      </th>
                     
                      <!-- <th style="width: 8%" class="text-center">
                          Status
                      </th> -->
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php  
         foreach ($jobs_list as $row)  
         {  
            ?>
                  <tr>
                      <td>
                          <?php echo $row['id']; ?>
                      </td>
                      <td>
                        <?php echo $row['job_title']; ?>
                      </td>
                       <td>
                        <?php echo $row['start_date']; ?>
                      </td>
                       <td>
                        <?php echo $row['finish_date']; ?>
                      </td>
                      <td>
                         <?php echo $row['created_date']; ?>
                      </td>
                     
                    <!-- 
                      <td class="project-state">
                          <span class="badge badge-success">Active</span>
                      </td> -->
                      <td class="project-actions text-right">
                          <!-- <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>index.php/Jobs/create_sub_job/<?php echo $row['id']; ?>">
                              <i class="fas fa-folder">
                              </i>
                              Create Sub Jobs
                          </a> -->
                          <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>index.php/Jobs/view_job_details/<?php echo $row['id']; ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                         <!--  <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/Labours/edit_labours/<?php echo $row['id']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          -->

                          <button onclick="deleteJob(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                      </td>
                  </tr>

                <?php 
              }
               ?>
 
              </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
            
            
       

<script>
    function deleteJob(id){
      var status = confirm("Do you want to delete job. There is no undo?")
      if(status){
        window.location='<?php echo base_url();?>index.php/Jobs/deleteJob/'+id;
      }
    }
  </script>