
    <div class="container-fluid page-body-wrapper">
    
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

               <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Create new job</h3>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" method="POST" action="">

        
                     <div class="form-group">
                      <label for="">Job Title</label>
                      <input type="text" class="form-control" id="" name="job_title" placeholder="Job Title" required>
                    </div>
                    <div class="form-group">
                      <label for="">Job Description</label>
                      <textarea class="form-control" name="job_description" cols="30" rows="10" required=""></textarea>
                      
                    </div>
                   
                    <div class="form-group">
                      <label for="">Start Date</label>
                      <input type="date" class="form-control" id="" name="start_date" placeholder="Start Date" required>
                    </div>
                    <div class="form-group">
                      <label for="">Finish Date</label>
                      <input type="date" class="form-control" id="" name="finish_date" placeholder="Finish Date" required>
                    </div>
                 
                    <br>
                   <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   <br>
                    <a href="<?php echo base_url(); ?>index.php/Jobs" type="submit" class="btn btn-info float-right">Back to Job Details</a>
                   </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
        