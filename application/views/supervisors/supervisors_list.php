
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Supervisors</h2>

                <ul>
                  <div class="row">
                    <div class="col-12">
                      <a class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Supervisors/add_supervisors">Add New Supervisor</a>
                </div>
               </div>
             </ul>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <th style="width: 1%">
                          Id
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                       <th style="width: 20%">
                          Email
                      </th>
                      <th style="width: 20%">
                          Mobile
                      </th>
                      <th style="width: 5%">
                          Created Date
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
                <?php  
         foreach ($get_supervisors_details as $row)  
         {  
            ?>
                  <tr>
                      <td>
                          <?php echo $row['id']; ?>
                      </td>
                      <td>
                            <?php echo $row['name']; ?>
                      </td>
                      <td>
                            <?php echo $row['email']; ?>
                      </td>
                       <td>
                            <?php echo $row['mobile']; ?>
                      </td>
                    
              
                      <td>
                         <?php echo $row['created_date']; ?>
                      </td>

                      <!-- <?php
                      if($row['status']==1){
                        $status_detail = 'success';
                      }else{
                        $status_detail = 'danger';
                      }
                      ?> -->
                    
                    <!--   <td class="project-state">
                          <span class="badge badge-<?php echo $status_detail; ?>"><?php echo $row['active_status']; ?></span>
                      </td> -->
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>index.php/Supervisors/edit_supervisor/<?php echo $row['id']; ?>">
                              <i class="fas fa-folder">
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
        window.location.href = '<?php echo base_url(); ?>index.php/Supervisors/delete_supervisors/'+id
      }
    }
  </script>
            
            
       