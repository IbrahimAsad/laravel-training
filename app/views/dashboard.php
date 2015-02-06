     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
         
                <div class="col-sm-9   main">
                    <h1 class="page-header">Dashboard</h1>
                    
                    <h2 class="sub-header">Section title</h2>
                    <div class="container-fluid" >
                        MAP
                    </div>
                    <div class="table table-hover">
                        <table class="table table-striped" id="tasks_table">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Task ID</th>
                                    <th>Task</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr id="">
                                    <td>1</td>
                                    <td>Fixs it</td>
                                    <td>Ibrahim Asad</td>
                                    <td>Nablus</td>
                                    <td>20-12-2001</td>
                                    <td>NOT STARTED </td>
                                    <td>
                                        <a class="task-icons-options" ><img src="css/icons/assign.png"></a>
                                        <a class="task-icons-options" ><img src="css/icons/edit.png"></a>
                                        <a class="task-icons-options" ><img src="css/icons/delete.png"></a>
                                    </td>
                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="row">
                        <form class="form-horizontal">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" checked> Show Tasks
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" checked> Show Drivers
                              </label>
                          </div>
                      </div>
                    </div>    
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Sign in</button>
                      </div>
                  </div>
                  </form>   
                  <table class="table table-hover">
                          <thead>
                              <th> Driver Name</th>
                              <th>Driver Location</th>
                          </thead>
                          <tbody>
                              <td>Ibrahim </td>
                              <td>London </td>
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