
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Add New Labour</h3>
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
                      <input type="text" class="form-control" id="" name="name" placeholder="Name">
                    </div>
                     <div class="form-group">
                      <label for="">Mobile</label>
                      <input type="number" class="form-control" id="" name="mobile" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="">Trade</label>
                      <input type="text" class="form-control" id="" name="trade" placeholder="Trade">
                    </div>

              <!--  <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control form-control" id="exampleFormControlSelect1" name="status">
                      <option selected disabled>Select one</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option> 
                    </select>
                  </div> -->


    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
        <!-- content-wrapper ends -->
       