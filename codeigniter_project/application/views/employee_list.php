<div class="row">
        <div class="col-md-10">
          <h1>Employee List</h1>
        </div>
        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>index.php/Employee/addEmployee" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px">Add Employee</a>
        </div>
        <div class="col-md-12">
          <p></p>
        </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Employee Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $employee as $emp ) {?>
    <tr>
      <th scope="row"><?php echo $emp['id'] ?></th>
      <td><?php echo $emp['name']; ?></td>
      <td><?php echo $emp['email']; ?></td>
      <td><?php echo $emp['address']; ?></td>
      <td><a href="<?php echo site_url('Employee/edit/'.$emp['id']); ?>" class="btn btn-warning">Edit</a> <a href="<?php echo site_url('Employee/delete/'.$emp['id']); ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this employee')">Delete</a></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
    
  </div>
</div>