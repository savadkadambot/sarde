
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
               
          
        
              <div class="card">

                <div class="card-body">
                  <?php
                if($error_message!=''){
                  ?>
                  <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $error_message; ?>
</div>
                  <?php
                }
                ?>
                  <h3>Add New Supervisor</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo $name; ?>">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required="" value="<?php echo $password; ?>">
                    </div>

                    
                    <div class="form-group">
                      <label>Mobile</label>
                      <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required="" value="<?php echo $mobile; ?>">
                    </div>
                    
                    <!-- <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div> -->

               <!-- <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control form-control" name="status" required="">
                      <option>Select Status</option>
                      <option <?php if($active_status == 1){ echo "selected"; } ?> value="1">Active</option>
                      <option <?php if($active_status == 0){ echo "selected"; } ?> value="0">Inactive</option> 
                    </select>
                  </div> -->

                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo base_url(); ?>index.php/Supervisors" type="submit" class="btn btn-info float-right">Back to Supervisors Details</a>
<!--                     <button class="btn btn-light">Cancel</button>
 -->                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
       