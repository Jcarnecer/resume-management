<div class="container-fluid" id="record-table">
  <a href="<?= base_url('employee/add') ?>" id="add-button" class="btn custom-button float-right">New Record</a>
  <h3 class="title">Employees</h3>
  <hr>
  <table class="table table-bordered table-responsive-xl" id='employee_table'>
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if($employees== ''){ } else{
        foreach ($employees as $employee) : ?>
      <tr>
        <td><img id="thumbnail" src="assets/uploads/<?= $employee->images ?>"></td>
        <td><?= $employee->first_name;?> <?= $employee->last_name;?></td>
        <td><?=$employee->name?></td>
        <td><?=$employee->current_status?></td>
        <td>
          <button type="button" class="btn custom-button" data-name="button-view" data-id="<?= $employee->id; ?>">View</button>
          <a href="<?= base_url('employee/edit/'.$employee->id) ?>" class="btn custom-button" data-id="<?= $employee->id;?>" >Edit</a>
        </td>
      </tr>
      <?php endforeach; ?>
        <?php }?>
    </tbody>
  </table>
</div>


<!-- View Modal -->
<div id="viewmodal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Employee</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body">
    <table class="table table-bordered table-responsive-xl">
<thead>

</thead>
<tbody>
<tr>
  <td>
    <b><label class="group-label">First Name:</label></b>
  </td>
  <td>
    <div class="group-data" id="first-name"></div>
  </td>
</tr>
<tr>
  <td>
  <b><label class="group-label">Last Name: </label></b>
  </td>
  <td>
    <div class="group-data" id="last-name"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Middle Name:</label></b>
  </td>
  <td>
    <div class="group-data" id="middle-name"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Home Address:</label></b>
  </td>
  <td>
    <div class="group-data" id="home-address"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Phone Number:</label></b>
  </td>
  <td>
    <div class="group-data" id="phone_number"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Birthday:</label></b>
  </td>
  <td>
    <div class="group-data" id="birthday"></div>
  </td>
</tr>


<tr>
  <td>
    <b><label class="group-label">Date Hired:</label></b>
  </td>
  <td>
    <div class="group-data" id="date_hired"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Role:</label></b>
  </td>
  <td>
    <div class="group-data" id="role"></div>
  </td>
</tr>


<tr>
  <td>
    <b><label class="group-label">SSS:</label></b>
  </td>
  <td>
    <div class="group-data" id="sss"></div>
  </td>
</tr>


<tr>
  <td>
    <b><label class="group-label">TIN:</label></b>
  </td>
  <td>
    <div class="group-data" id="tin"></div>
  </td>
</tr>


<tr>
  <td>
    <b><label class="group-label">Philhealth:</label></b>
  </td>
  <td>
    <div class="group-data" id="philhealth"></div>
  </td>
</tr>


<tr>
  <td>
    <b><label class="group-label">Pagibig:</label></b>
  </td>
  <td>
    <div class="group-data" id="pagibig"></div>
  </td>
</tr>

<tr>
  <td>
    <b><label class="group-label">Comments:</label></b>
  </td>
  <td>
    <div class="group-data" id="comment"></div>
  </td>
</tr>
</tbody>
</table>


    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>