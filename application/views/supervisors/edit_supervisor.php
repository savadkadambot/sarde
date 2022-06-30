
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Update Supervisor Details</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">
                    <input type="hidden" name="update_id" value="<?php echo $supervisor_details_from_id['id']; ?>">

                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" id="" name="name" placeholder="" value="<?php echo $supervisor_details_from_id['name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" id="" name="email" placeholder="" value="<?php echo $supervisor_details_from_id['email']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" class="form-control" id="" name="password" placeholder="" value="<?php echo $supervisor_details_from_id['password']; ?>">
                    </div>
                     <div class="form-group">
                      <label for="">Mobile</label>
                      <input type="text" class="form-control" id="" name="mobile" placeholder="" value="<?php echo $supervisor_details_from_id['mobile']; ?>">
                    </div>
       
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
       