
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> --><div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/Jobs" type="submit" class="btn btn-info float-right">Back to Job Details</a>
        </div>
                  <ul><h2>Job Details</h2><hr/>
    <div class="row">

      <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Job Id: <?php echo $job_details['id']; ?> &nbsp;&nbsp;&nbsp;<?php echo $job_details['job_title']; ?></h4>
                  <!-- <p class="card-description">
                    Wrap the text in <code>&lt;mark&gt;</code> to highlight text
                  </p> -->
                  <!-- <p>
                    <?php echo $job_details['job_description']; ?><br><br>Start Date: <?php echo $job_details['start_date']; ?><br><br>Finish Date: <?php echo $job_details['finish_date']; ?><br><br>Road Marking Square metre: <?php echo $job_details['road_marking_sqm']; ?><br><br>Stud Fixing Numbers: <?php echo $job_details['stud_fixing_nos']; ?><br><br>Board Fixing Numbers: <?php echo $job_details['board_fixing_nos']; ?>
                  </p> -->

                  <p>
                    <?php echo $job_details['job_description']; ?><br><br>Start Date: <?php echo $job_details['start_date']; ?><br><br>Finish Date: <?php echo $job_details['finish_date'];?>
                  </p>

                </div>
              </div>
        
      </div>

     </ul>

      <h3>Sub Jobs</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Task Name</th>
        <th>Task Details</th>
        <th>Total</th>
        <th>Created Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($sub_jobs as $row){
        ?>
         <tr>
        <td><?php echo $row['task_name']; ?></td>
        <td><?php echo $row['task_details']; ?></td>
        <td><?php echo $row['total']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>

      <form method="POST" action="">
        <input type="hidden" name="job_id" value="1">
         <h3>Add Supervisor</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Check</th>
      </tr>
    </thead>
    <tbody>
      <?php  
         foreach ($supervisors_details as $row)  
         { 
         ?>
         <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <?php
        $checked = "";
        if(in_array($row['id'], $supervisors_assigned)){
           $checked = "checked";
        }
        ?>
        <td><input <?php echo $checked; ?> type="checkbox" id="vehicle1" name="<?php echo $row['id']; ?>" value="1"></td>
      </tr>
         <?php 
         }
         ?>
    </tbody>
  </table>
  <br>
  <div class="col-12">
          <button type="submit" class="btn btn-success float-right">Save</button>
        </div>
</form>
<br><br>



        <input type="hidden" name="job_id" value="1">
         <h3>Labours</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Trade</th>
      </tr>
    </thead>
    <tbody>
      <?php  
         foreach ($labours as $row)  
         { 
         ?>
         <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['trade']; ?></td>
         <?php 
         }
         ?>
    </tbody>
  </table>
<br><br>

<!--  <h3>View Comments</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Commented Supervisor Name</th>
        <th>Comment</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($get_added_comments as $row){
        ?>
         <tr>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table> -->
   <h3>Work Progress</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sub Job</th>
        <th>Item Description</th>
        <th>Number</th>
        <th>Length</th>
        <th>Width</th>
        <th>Meter Square</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($work_progress as $row){
        ?>
         <tr>
        <td><?php echo $row['subjob_id']; ?></td>
        <td><?php echo $row['item_description']; ?></td>
        <td><?php echo $row['no']; ?></td>
        <td><?php echo $row['length']; ?></td>
        <td><?php echo $row['width']; ?></td>
        <td><?php echo $row['meter_sqr']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>

   <h3>Inventory</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sub Job</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($inventory as $row){
        ?>
      <tr>
        <td><?php echo $row['subjob_id']; ?></td>
        <td><?php echo $row['item']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>

   <h3>Quality Check</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sub Job</th>
        <th>Image</th>
        <th>Thickness</th>
        <th>Edge Alignment</th>
        <th>Comment</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($quality_check as $row){
        ?>
      <tr>
        <td><?php echo $row['subjob_id']; ?></td>
        <td> <img src="<?php echo base_url().'uploads/'.$row['file_name']; ?>" alt="Trulli" width="500" height="333"></td>
        <td><?php echo $row['thickness']; ?></td>
        <td><?php echo $row['edge_alignment']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>

  <h3>Labours Work Details</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Trade</th>
        <th>Type</th>
        <th>Hours</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($labours_worked as $row){
        ?>
         <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['trade']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['hours']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>


   <h3>Expenses Details</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Expense</th>
        <th>Amount</th>
        <th>Reference</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($expenses as $row){
        ?>
         <tr>
        <td><?php echo $row['expense']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['reference']; ?></td>
        <td><?php echo $row['created_date']; ?></td>

      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>


 

  <br><br>

  <h3>Tools Details</h3><hr/>

     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Condition</th>
        <th>Date</th>
      </tr>
    </thead>
     <tbody>
      <?php
      foreach($tools as $row){
        ?>
         <tr>
        <td><?php echo $row['item']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['condition']; ?></td>
        <td><?php echo $row['created_date']; ?></td>
      </tr>
        <?php
      }
      ?>
     
    </tbody>
    <tbody>
      
    </tbody>
  </table>

   <br><br>

 

  

                  <div class="table-responsive">
                    
       
                  </div>
                </form>

                </div>
              </div>
            </div>
           
            
      