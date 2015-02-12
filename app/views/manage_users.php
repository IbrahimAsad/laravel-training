    <?php
     include 'include/header.php';
     ?>

<div class="container-fluid">
            <div class="row">
<div>
	

</div>


<div>

	<div class="col-sm-7 col-md-offset-2 ">
		<form class="form-inline">
			<h4>Add new Admin</h4>
			<div class="form-group">
				<label for="admin_name">Name</label>
				<input type="text" class="form-control" id="admin_name" placeholder="admin name...">
			</div>
			<div class="form-group">
				<label for="admin_code">Email</label>
				<input type="text" class="form-control" id="admin_code" placeholder="hx@a!2z">
			</div>
			<button type="button" class="btn btn-success" onclick="addNewAdmin();">Add Admin</button>
		</form>
		<h4 id="result_new_admin"> </h4>
	</div>
	<br/>
	<br/>
 <div class="col-sm-7 col-md-offset-2 ">

<table class="table table-hover" id="admins_table">
		<thead>
			<tr>
				<th>admin  ID</th>
				<th>admin Name</th>
				<th>Admin's Tasks</th>
				 <th>New Code </th>
				 <th> </th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
</div>


</div>



</div>

<?php 
include 'include/commanJS.php';

?>

<script type="text/javascript" src="js/manage_admin.js"></script>

    <?php
    include 'include/footer.php';
    ?>