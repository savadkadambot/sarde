
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Sub Jobs</h2>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <ul>
    <div class="row">
        <div class="col-12">
          <a class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Sub_jobs/create_sub_job">Create New Sub Job</a>
        </div>
      </div>

     </ul>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <th style="width: 1%">
                          Sub Job Id
                      </th>
                      <th style="width: 20%">
                          Job Id
                      </th>
                      <!--  <th style="width: 20%">
                          Job Title
                      </th> -->
                      <th style="width: 20%">
                           Name
                      </th>
                      <th style="width: 20%">
                          Description
                      </th>
                       <th style="width: 1 0%">
                          Total
                      </th>
                      <th style="width: 5%">
                          Created Date
                      </th>
                     
                     <!--  <th style="width: 8%" class="text-center">
                          Status
                      </th> -->
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php  
         foreach ($get_sub_jobs_details as $row)  
         {  
            ?>
                  <tr>
                      <td>
                          <?php echo $row['id']; ?>
                      </td>
                       <td>
                          <?php echo $row['job_id']; ?>
                      </td>
                      <!-- <td>
                          <?php echo $row['job_title']; ?>
                      </td> -->
                      <td>
                          <?php echo $row['task_name']; ?>
                      </td>
                      <td>
                          <a>
                            <?php echo $row['task_details']; ?>
                          </a>
                          <br/>
                          <!-- <small>
                              
                          </small> -->
                      </td>
                      <td>
                         <?php echo $row['total']; ?>
                      </td>
                      <td>
                         <?php echo $row['created_date']; ?>
                      </td>
                    
                      <!-- <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['status']; ?></span>
                      </td> -->
                      <td class="project-actions text-right">
                         <!--  <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> -->
                          <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/Sub_jobs/edit_sub_jobs/<?php echo $row['id']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                         
                              <a class="btn btn-danger btn-sm" onclick="deleteList(<?php echo $row['id']; ?>)">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
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
           <script type="text/javascript">
    function deleteList(id){
      var conf = confirm("Do you want to delete? There is no undo?");
      if(conf){
        window.location.href = '<?php echo base_url(); ?>index.php/Sub_jobs/delete_subjobs/'+id
      }
    }
  </script>
            
  