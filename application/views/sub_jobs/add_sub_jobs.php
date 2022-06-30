
    <div class="container-fluid page-body-wrapper">
    
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Add New Sub Job</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">

                    <div class="form-group">
                      <label for="">Select Job</label>
                      <select type="text" class="form-control" name="job_id">
                        <option value="">Select Job</option>
                        <?php
                        foreach($jobs_list as $row){
                          ?>
                           <option value="<?php echo $row['id']; ?>"><?php echo $row['job_title']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" id="" name="task_name" placeholder="Name">
                    </div>
                     <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" id="" name="task_details" placeholder="Description">
                    </div>
                    <div class="form-group">
                      <label for="">Total</label>
                      <input type="text" class="form-control" id="" name="total" placeholder="Total">
                    </div>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      