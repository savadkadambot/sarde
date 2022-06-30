
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Messaging</h2>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <ul>
    <div class="row">
        <div class="col-12">
          <a class="btn btn-success float-right" href="<?php echo base_url(); ?>index.php/Messaging/send_message">Add New Message</a>
        </div>
      </div>

     </ul>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                  <tr>
                      <th style="width: 1%">
                          Id
                      </th>
                      <th style="width: 20%">
                          Receiver
                      </th>
                      <th style="width: 20%">
                          Message Title
                      </th>
                       <th style="width: 20%">
                          Message Description
                      </th>
                      <th style="width: 5%">
                          Created Date
                      </th>
                    
                  </tr>
              </thead>
              <tbody>
                <?php  
         foreach ($get_messages as $row)  
         {  
            ?>
                  <tr>
                      <td>
                          <?php echo $row['id']; ?>
                      </td>
                      <td>
                          <?php echo $row['receiver']; ?>
                      </td>
                       <td>
                          <?php echo $row['message_title']; ?>
                      </td>
                      <td>
                          <?php echo $row['message_description']; ?>
                      </td>
                      <td>
                            <?php echo $row['created_date']; ?>
                          <!-- <small>
                              
                          </small> -->
                      </td>

                      <td class="project-actions text-right">
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
           
              <script type="text/javascript">
              function deleteList(id){
              var conf = confirm("Do you want to delete? There is no undo?");
              if(conf){
             window.location.href = '<?php echo base_url(); ?>index.php/Messaging/delete_message/'+id
             }
            }
          </script>
            
           
      