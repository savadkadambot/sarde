
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            
            <!-- <div class="col-md-12 grid-margin transparent">
              <div class="row"> -->
                <!-- <div class="col-lg-4 col-6"> -->
                <div class="col-md-4 mb-3 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Jobs</p>
                      <p class="fs-30 mb-2"><?php echo $total_jobs_count; ?></p>
                      <a data-toggle="collapse" href="" class="small-box-footer"><a href="<?php echo base_url(); ?>index.php/Jobs">More info </a><i class="fas fa-arrow-circle-left"></i></a>
                      
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-3 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Supervisors</p>
                      <p class="fs-30 mb-2"><?php echo $total_supervisors_count; ?></p>
                      <a data-toggle="collapse" href="" class="small-box-footer"><a href="<?php echo base_url(); ?>index.php/Supervisors">More info </a><i class="fas fa-arrow-circle-left"></i></a>
                      
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-3 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Labours</p>
                      <p class="fs-30 mb-2"><?php echo $total_labours_count; ?></p>
                      <a data-toggle="collapse" href="" class="small-box-footer"><a href="<?php echo base_url(); ?>index.php/Supervisors">More info </a><i class="fas fa-arrow-circle-left"></i></a>
                      
                    </div>
                  </div>
                </div>
              </div>
         <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Recent Jobs</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                     <thead>
                  <tr>
                      <th style="width: 1%">
                          Job Id
                      </th>
                      <th style="width: 20%">
                          Job Title
                      </th>
                       <!-- <th style="width: 20%">
                          Start Date
                      </th>
                       <th style="width: 20%">
                          Finish Date
                      </th> -->
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
                     <!--   <td>
                        <?php echo $row['start_date']; ?>
                      </td>
                       <td>
                        <?php echo $row['finish_date']; ?>
                      </td> -->
                      <td>
                         <?php echo $row['created_date']; ?>
                      </td>
                     
                    <!-- 
                      <td class="project-state">
                          <span class="badge badge-success">Active</span>
                      </td> -->
                      <td class="project-actions text-right">
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

                          <!-- <button onclick="deleteJob(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button> -->
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
          </div>



           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Recent Messaging</p>
                 <!--  <h2>Recent Messaging</h2> -->
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <!-- <ul> -->
    <div class="row">
        <div class="col-12">
         <!--  <a class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Messaging/send_message">Add New Message</a> -->
        </div>
      </div>

    <!-- </ul>-->
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <!-- <th style="width: 1%">
                          Id
                      </th> -->
                      <th style="width: 20%">
                          Receiver
                      </th>
                      <th style="width: 20%">
                          Message Title
                      </th>
                       <th style="width: 20%">
                          Message Description
                      </th>
                      <th style="width: 5%">
                          Created Date
                      </th>
                    
                  </tr>
              </thead>
              <tbody>
                <?php  
         foreach ($messages_list as $row)  
         {  
            ?>
                  <tr>
                      <!-- <td>
                          <?php echo $row['id']; ?>
                      </td> -->
                      <td>
                          <?php echo $row['receiver']; ?>
                      </td>
                       <td>
                          <?php echo $row['message_title']; ?>
                      </td>
                      <td>
                          <?php echo $row['message_description']; ?>
                      </td>
                      <td>
                            <?php echo $row['created_date']; ?>
                          <!-- <small>
                              
                          </small> -->
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


                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
       