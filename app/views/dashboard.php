     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active">
                            <a href="#">Overview</a>
                        </li>
                        
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="">Nav item</a>
                        </li>
                        
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="">Nav item again</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-sm-9   main">
                    <h1 class="page-header">Dashboard</h1>
                    <div class="row placeholders">
</div>
                    <h2 class="sub-header">Section title</h2>
                    <div class="table-responsive">
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
            </div>
            <div id="assign-task" >
               <div>
                   <select id="driver-list"></select>
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