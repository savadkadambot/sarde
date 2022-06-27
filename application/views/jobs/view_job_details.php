<?php echo base_url(); ?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SarDe Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>newtheme/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>newtheme/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> -->
        <!--<h2>SarDe</h2>-->
          <img src="<?php echo base_url(); ?>/newtheme/images/aklogo.png" alt="logo" style="width: 40px;"/>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!--<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">-->
        <!--  <span class="icon-menu"></span>-->
        <!--</button>-->
        <!--<ul class="navbar-nav mr-lg-2">-->
        <!--  <li class="nav-item nav-search d-none d-lg-block">-->
        <!--    <div class="input-group">-->
        <!--      <div class="input-group-prepend hover-cursor" id="navbar-search-icon">-->
        <!--        <span class="input-group-text" id="search">-->
        <!--          <i class="icon-search"></i>-->
        <!--        </span>-->
        <!--      </div>-->
        <!--      <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">-->
        <!--    </div>-->
        <!--  </li>-->
        <!--</ul>-->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <!-- <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p> -->
              <!-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a> -->
              <!-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a> -->
              <!-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a> -->
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">

        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Admin_login/logout">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
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
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="overflow: visible;">

        
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin_home/" >
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Employees</span></a>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="nav-link dropdown-item" href="<?php echo base_url(); ?>index.php/Supervisors"><i class="ti-user menu-icon"></i>
              <span class="menu-title">Project Managers</span></a>
              <a class="nav-link dropdown-item" href="<?php echo base_url(); ?>index.php/Supervisors"><i class="ti-user menu-icon"></i>
              <span class="menu-title">Supervisors</span></a>
              <a class="nav-link dropdown-item" href="<?php echo base_url(); ?>index.php/Labours"><i class="ti-user menu-icon"></i>
              <span class="menu-title">Labours</span></a>
            </div>
          </li>
         
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Project Managers</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="" href="<?php echo base_url(); ?>index.php/Supervisors" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Supervisors</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="" href="<?php echo base_url(); ?>index.php/Labours" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Labours</span>
              <i class="menu-arrow"></i>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="" href="<?php echo base_url(); ?>index.php/Jobs" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Jobs</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
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
      foreach($labours as $row){
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
           
            
            
           
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. <a href="https://www.bootstrapdash.com/" target="_blank">InstaDesign</a>. All rights reserved.</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>newtheme/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>newtheme/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>newtheme/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>newtheme/js/template.js"></script>
  <script src="<?php echo base_url(); ?>newtheme/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>newtheme/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

