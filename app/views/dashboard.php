     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
         
                <div class="col-sm-9   main">
                    <h2 class="sub-header">Section title</h2>
                    <div class="container-fluid" id="map-container" style="height: 400px;">
                     
                    </div>
                    <div class="row">
                    <div class="container-fluid">
                      <div class="col-sm-9">
                        <h3 > Latest Tasks in the server  </h3>
                      <small> click in the NOT STARTED task .. then click in the driver you want to make the task .</small>
                      </div>
                      <div class="col-sm-3"> <button class="btn" id="cancel_selected_task" onclick="cancelSelectedTask();" style=" margin-top: 25px;display:none; ">Cancel selected task</button></div>
                    </div>
                        <table class="table table-hover" id="tasks_table">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Task ID</th>
                                    <th>Task</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Assigned</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="row col-sm-3" style="margin-top:50px;">
                        <form class="form-horizontal">
                          <div class="form-group">
                             <div class="col-sm-offset-2 col-sm-10" style=" border-bottom: 1px solid #e5e5e5; padding-bottom: 22px; " >
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" onchange="showNewTasks(this.checked);" id="new_tasks"> Show New  Tasks
                              </label>
                          </div>
                      </div>
                     <!--  <div class="col-sm-offset-2 col-sm-10 "style=" border-bottom: 1px solid #e5e5e5; padding-bottom: 22px; " >
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" onchange="showAssignedTasks(this.checked);" id="assigned_tasks"> Show Assigned Tasks
                              </label>
                          </div>
                      </div> -->
                    
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" checked onchange="showNotStartedTasks(this.checked);" id="not_started_tasks"> Show Not Started Tasks
                              </label>
                          </div>
                      </div>
                      
                      <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" onchange="showInProgressTasks(this.checked);" id="in_progress_tasks"> Show In Progress Tasks
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" onchange="showCompletedTasks(this.checked);" id="completed_tasks"> Show Completed Tasks
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" onchange="showDrivers(this.checked);" id="show_drivers" checked> Show Drivers
                              </label>
                          </div>
                      </div>
                    </div>    
                  </form>   
                  <table class="table table-hover" id="dirver_table">
                          <thead>
                              <th> Driver Name</th>
                              <th>Driver Location</th>
                          </thead>
                          <tbody>
                             <!--  <td>Ibrahim </td>
                              <td>London </td> -->
                          </tbody>
                        </table>

                    </div>
                    
                </div>
            </div>
             
        </div>

<?php 
include 'include/commanJS.php';

?>

  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>

    

    <?php
    include 'include/footer.php';
    ?>