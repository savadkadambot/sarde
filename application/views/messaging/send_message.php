
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
                  <h3>Send Message</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label>Supervisor Name</label>
                      <select type="text" class="form-control" name="visibility">
                        <option value="">Select Visibility</option>
                        <option value="every_one">All Supervisors</option>
                        <?php
                        foreach ($all_supervisors_list as $row) {
                          ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                          <?php
                        }
                        ?>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Message Title</label>
                      <input type="text" class="form-control" name="message_title" placeholder="Message Title" required="" value="">
                    </div>

                    <div class="form-group">
                      <label>Message Description</label>
                      <textarea type="text" class="form-control" name="message_description" rows="5" cols="3"></textarea>
                    </div>

                   <br>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
<!--                     <button class="btn btn-light">Cancel</button>
 -->                  </form>
     
                   <a href="<?php echo base_url(); ?>index.php/Messaging/list" type="submit" class="btn btn-info float-right">Back to Message Details</a>
                </div>

              </div>
            </div>
          
          </div>
        </div>
       