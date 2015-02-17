     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
         
                <div class="col-sm-8   main">
                    <h2 class="sub-header">Section title</h2>
                    <div class="container-fluid" id="map-container" style="height: 400px;">
                     
                    </div>
                    <div class="row">
                    <div class="container-fluid">
                      <div class="col-sm-8">
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


                <div class="row col-sm-4" style="margin-top:50px;">
                <div id="accordion">
                <h3> Add New Task </h3>
                <div> 
                        
                        <div class="list-group-item">  <label>Task Title</label> <input type="text" class="item-input" id="task_title"> </div>
                        <div class="list-group-item">  <label>Fist Name</label> <input type="text" class="item-input" id="first_name"> </div>
                        <div class="list-group-item">  <label>Last Name</label> <input type="text" class="item-input" id="last_name"> </div>
                        
                        <div class="list-group-item">  <label>Phone</label> <input type="text" class="item-input" id="phone"> </div>
                        <div class="list-group-item">  <label>Address <span style="font-size: 77%;">(select Address using map ) </span></label> <input type="text" style="width: 58%;" id='address'><input type="button" value="show in map" onclick="showAddressInMap()"> </div>
                        <div class="list-group-item">  <label>Note</label> <textarea class="item-input" id="note_text">  </textarea> </div>
                        
                        <div class="list-group-item">  <input type="button" value="Add new task" class="item-input" onclick="AddNewTask();"> </div>
                        
                        <!-- <div class="list-group-item">  <label>Phone</label> <input type="text" class="item-input"> </div> -->

                    
                </div>
                  <h3 > Tasks / Drivers </h3>
                  <div>

                    <form class="form-horizontal">
                      <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10" style=" border-bottom: 1px solid #e5e5e5; padding-bottom: 22px; " >
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" onchange="showNewTasks(this.checked);" id="new_tasks"> Show New  Tasks
                          </label>
                        </div>
                      </div>


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
                    </tbody>
                  </table>
                </div>

              </div>

                       </div>
                    
                </div>
            </div>
             
        </div>

<?php 
include 'include/commanJS.php';

?>
 
<script type="text/javascript" src="js/dashboard.js"></script>

    

    <?php
    include 'include/footer.php';
    ?>