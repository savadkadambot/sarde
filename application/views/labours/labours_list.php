
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Labours</h2>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <ul>
    <div class="row">
        <div class="col-12">
          <a class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Labours/add_labours">Add New Labour</a>
        </div>
      </div>

     </ul>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <th style="width: 1%">
                          Labour Id
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
                          Trade
                      </th>
                      <th style="width: 5%">
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
         foreach ($get_labours_details as $row)  
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
                          <a>
                            <?php echo $row['name']; ?>
                          </a>
                          <br/>
                          <!-- <small>
                              
                          </small> -->
                      </td>
                      <td>
                         <?php echo $row['trade']; ?>
                      </td>
                      <td>
                         <?php echo $row['created_date']; ?>
                      </td>
                    
                     <!--  <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['status']; ?></span>
                      </td> -->
                      <td class="project-actions text-right">
                         <!--  <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> -->
                          <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/Labours/edit_labours/<?php echo $row['id']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                         

                          <!-- <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/Labours/delete_labours/<?php echo $row['id']; ?>"> -->
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
           
            
            
           
        <!-- content-wrapper ends -->
        