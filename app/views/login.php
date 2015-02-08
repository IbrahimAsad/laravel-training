     <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">



 <div class="col-md-3 col-md-offset-5">

<form>
<h4> Log in </h4>
  <div class="form-group">
    <label for="yourID">Your ID</label>
    <input type="email" class="form-control" id="yourID" name="yourID" placeholder="Enter your ID">
  </div>
  <div class="form-group">
    <label for="yourCode">Your Code</label>
    <input type="password" class="form-control" id="yourCode" name="yourCode" placeholder="Code">
  </div>
  <button type="button" class="btn btn-default form-control"  id="login_btn">Submit</button>
</form>

</div>
</div>



</div>

<?php 
include 'include/commanJS.php';

?>

<script type="text/javascript" src="js/login.js"></script>
    <?php
    include 'include/footer.php';
    ?>