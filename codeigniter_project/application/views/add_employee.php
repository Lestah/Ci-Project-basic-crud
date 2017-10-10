<div class="row">
	<div class="col">
	</div>
	<div class="col-6">
	<h1>Add Employee</h1>
	<?php echo validation_errors(); ?>
	<form action="addEmployee" method="post">
		<div class="form-group">
		    <label for="name">Employee name</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
  		</div>
	    <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
	    </div>
	    <div class="form-group">
		    <label for="address">address</label>
		    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
	    </div>
		<input type="submit" class="btn btn-primary">
	</form>
	</div>
	<div class="col">
	</div>
</div>