<div class="row">
	<div class="col">
	</div>
	<div class="col-6">
	<h1>Edit Employee</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Employee/edit/'.$employee['id']); ?>
		<div class="form-group">
		    <label for="name">Employee name</label>
		    <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>" placeholder="Enter name">
  		</div>
	    <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['email']; ?>" placeholder="Enter email">
	    </div>
	    <div class="form-group">
		    <label for="address">address</label>
		    <input type="text" class="form-control" id="address" name="address" value="<?php echo $employee['address']; ?>"placeholder="Enter address">
	    </div>
		<div class="row">
			<div class="col-sm-6">
				<input type="submit" value="save" class="btn btn-info btn-lg btn-block" style="margin-top: 20px">
			</div>
			<div class="col-sm-6">
				<a href="<?php echo base_url(); ?>index.php/Employee/getEmployee" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">cancel</a>
			</div>
		</div>
	</form>
	</div>
	<div class="col">
	</div>
</div>