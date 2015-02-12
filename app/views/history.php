     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
         
                <div class="col-sm-9   main">
                    <h2 class="sub-header">Tasks History</h2> 
                    </div>
                    <div class="row">
                    <div class="container-fluid center">
                      <div class="col-sm-12">
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
                                    <th>Driver Name</th>
                                    <th></th>
                                </tr>
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
             
        </div>

<?php 
include 'include/commanJS.php';

?>

  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/history.js"></script>

    

    <?php
    include 'include/footer.php';
    ?>