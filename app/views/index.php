  <?php
include 'include/header.php';
   ?>

         <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <div class="jumbotron main-map" id="map-container">
                        MAP HERE
</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task#</th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>Assignd to</th>
                                <th>Status</th>
                                <th> action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>1</td>
                                <td>Mark</td>
                                <td>
                                    <button type="button" class="btn btn-default">Label</button>                                                                                                                                                                                                                                                                                                                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>1</td>
                                <td>Mark</td>
                                <td>
                                    <button type="button" class="btn btn-default">Label</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>1</td>
                                <td>Mark</td>
                                <td>
                                    <button type="button" class="btn btn-default">Label</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=""></div>
                    <!--/row-->
                </div>
                <!--/span-->
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <div class="list-group">
                        
                        <div class="list-group-item">  <label>Task Title</label> <input type="text" class="item-input" id="task_title"> </div>
                        <div class="list-group-item">  <label>Fist Name</label> <input type="text" class="item-input" id="first_name"> </div>
                        <div class="list-group-item">  <label>Last Name</label> <input type="text" class="item-input" id="last_name"> </div>
                        
                        <div class="list-group-item">  <label>Phone</label> <input type="text" class="item-input" id="phone"> </div>
                        <div class="list-group-item">  <label>Address <span style="font-size: 77%;">(select Address using map ) </span></label> <input type="text" style="width: 58%;" id='address'><input type="button" value="show in map" onclick="showAddressInMap()"> </div>
                        <div class="list-group-item">  <label>Note</label> <textarea class="item-input" id="note_text">  </textarea> </div>
                        
                        <div class="list-group-item">  <input type="button" value="Add new task" class="item-input" onclick="AddNewTask();"> </div>
                        
                        <!-- <div class="list-group-item">  <label>Phone</label> <input type="text" class="item-input"> </div> -->

                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <h3>Column title</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
            <!--/row-->
            <hr>
            <footer>
                <div class="panel">
                    <div class="panel-body">check</div>
                </div>
                <p>&copy; Company 2013</p>
            </footer>
        </div>
        <!--/.container-->
<?php 
include 'include/commanJS.php';

?>

  
        <script type="text/javascript" src="js/map-script.js"></script>
        <script type="text/javascript">
        window.load=initMap();
        </script>


   <?php
include 'include/footer.php';
   ?>