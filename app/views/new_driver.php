     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">



 <div class="col-md-3 col-md-offset-5">

<form>
<h4> Add the Driver name and the code ....  </h4>
  <div class="form-group">
    <label for="yourID">Driver's Full Name</label>
    <input type="email" class="form-control" id="driver_name" placeholder="Enter Driver's name">
  </div>
  <div class="form-group">
    <label for="yourCode">Driver's Code </label>
    <input type="password" class="form-control" id="driver_code" placeholder="Enter Driver's code">
  </div>
  <button type="button" id="addDriver" class="btn btn-default form-control" >Submit</button>
</form>
<div id="driver_result">
<ul>
  
</ul>
  
</div>
</div>
</div>



</div>

<?php 
include 'include/commanJS.php';

?>

<script type="text/javascript" src="js/addDriver.js"></script>

    <?php
    include 'include/footer.php';
    ?>