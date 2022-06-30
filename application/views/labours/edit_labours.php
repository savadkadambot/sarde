
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
     
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Update Labour Details</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">
                    <input type="hidden" name="update_id" value="<?php echo $labours_details_from_id['id']; ?>">

                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" id="" name="name" placeholder="Name" value="<?php echo $labours_details_from_id['name']; ?>">
                    </div>
                     <div class="form-group">
                      <label for="">Mobile</label>
                      <input type="number" class="form-control" id="" name="mobile" placeholder="Mobile" value="<?php echo $labours_details_from_id['mobile']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Trade</label>
                      <input type="text" class="form-control" id="" name="trade" placeholder="Trade" value="<?php echo $labours_details_from_id['trade']; ?>">
                    </div>
       
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
        <!-- content-wrapper ends -->
       