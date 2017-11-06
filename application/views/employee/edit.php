<div class="container-fluid">
  <h3>Edit Employee</h3>
  <hr>
  <?php
    echo $this->session->flashdata('email_sent');
  ?>

  <form class="form-horizontal" id="employee-edit-form" enctype="multipart/form-data"  method="POST">

    <input type="hidden" name="id" value="<?=$employee_data->id?>">
    <div class="form-group row">
      <label  class="col-sm-2 control-label">First Name:</label>
      <div class="col-sm-8">
        <input type="type" name="first_name" class="form-control" value="<?= $employee_data->first_name ?>" placeholder="First Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Last Name:</label>
      <div class="col-sm-8">
        <input type="type" name="last_name" class="form-control" value="<?= $employee_data->last_name ?>" placeholder="Last Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Middle Name:</label>
      <div class="col-sm-8">
        <input type="type" name="middle_name" class="form-control" value="<?= $employee_data->middle_name ?>" placeholder="Middle Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Status:</label>
      <div class="col-sm-8">
        <select class="form-control" name="current_status">
        <?php if($employee_data->current_status=='Active'){?>
          <option value="<?= $employee_data->current_status?>"><?= $employee_data->current_status?></option>
          <option value="Inactive">Inactive</option>
        <?php } elseif($employee_data->current_status=='Inactive'){?>
          <option value="Active">Active</option>
          <option value="<?= $employee_data->current_status?>" selected="selected"><?= $employee_data->current_status?></option>
        <?php }?>  
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Email Address:</label>
      <div class="col-sm-8">
        <input type="email" name="email_address" class="form-control" value="<?= $employee_data->email ?>" placeholder="Email Address"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Phone Number:</label>
      <div class="col-sm-8">
        <input type="number" name="phone_number" value="<?= $employee_data->phone_number ?>"  class="form-control" placeholder="Phone Number"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Home Address:</label>
      <div class="col-sm-8">
        <input type="text" name="home_address" class="form-control" value="<?= $employee_data->home_address ?>" placeholder="Home Address"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Birth Date:</label>
      <div class="col-sm-8">
        <input type="date" name="birth_date" class="form-control" value="<?= $employee_data->birthday?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Degree:</label>
      <div class="col-sm-8">
          <input type="text" name="degree" class="form-control" placeholder="Degree" value="<?= $employee_data->degree?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">TIN:</label>
      <div class="col-sm-8">
        <input type="text" name="tin" class="form-control" value="<?= $employee->tin ?>" placeholder="TIN"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">SSS:</label>
      <div class="col-sm-8">
        <input type="text" name="sss" class="form-control" value="<?= $employee->sss ?>" placeholder="SSS"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Philhealth:</label>
      <div class="col-sm-8">
        <input type="text" name="philhealth" class="form-control" value="<?= $employee->philhealth ?>" placeholder="Philhealth"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Pagibig:</label>
      <div class="col-sm-8">
        <input type="text" name="pagibig" class="form-control" value="<?= $employee->pagibig ?>" placeholder="Pagibig"/>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-8 offset-sm-2">
        <input type="submit" value="Update" class="btn custom-button float-right" />
      </div>
    </div>

  </form>
</div><!-- Container End -->
