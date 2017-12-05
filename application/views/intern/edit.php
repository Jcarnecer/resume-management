<?php $role=$this->Resume_model->fetch('resume_role',['pos_id'=>2])?>
<div class="container-fluid">
  <h3>Edit Intern</h3>
  <hr>
  <?php
    echo $this->session->flashdata('email_sent');
  ?>

  <form class="form-horizontal" id="intern-edit-form" enctype="multipart/form-data"  method="POST">

    <input type="hidden" name="id" value="<?= $applicant_data->id ?>"/>
    <input type="hidden" name="position" value="<?= $applicant_data->pos_id?>"/>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">First Name</label>
      <div class="col-sm-8">
        <input type="type" name="first_name" class="form-control" value="<?= $applicant_data->first_name ?>" placeholder="First Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Last Name</label>
      <div class="col-sm-8">
        <input type="type" name="last_name" class="form-control" value="<?= $applicant_data->last_name ?>" placeholder="Last Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Middle Name</label>
      <div class="col-sm-8">
        <input type="type" name="middle_name" class="form-control" value="<?= $applicant_data->middle_name ?>" placeholder="Middle Name"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Status:</label>
      <div class="col-sm-8">
        <select class="form-control" name="current_status">
        <?php if($applicant_data->current_status=='Active'){?>
          <option value="<?= $applicant_data->current_status?>" selected="selected"><?= $applicant_data->current_status?></option>
          <option value="Inactive">Inactive</option>
        <?php } elseif($applicant_data->current_status=='Inactive'){?>
          <option value="Active">Active</option>
          <option value="<?= $applicant_data->current_status?>" selected="selected"><?= $applicant_data->current_status?></option>
        <?php }?>  
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Email Address:</label>
      <div class="col-sm-8">
        <input type="email" name="email_address" class="form-control" value="<?= $applicant_data->email ?>" placeholder="Email Address"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Role:</label>
      <div class="col-sm-8">
        <select id="role" name="role" class="form-control">
        <?php 
        if($role->role_id==$applicant_data->role_id){?>
            <option value="<?= $role->role_id ?>" selected="selected"><?=$role->name?></option>
      <?php }?>
            <?php foreach($role as $row): ?>
            <option value="<?= $row->role_id ?>"><?= $row->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Phone Number:</label>
      <div class="col-sm-8">
          <input type="number" name="phone_number" value="<?= $applicant_data->phone_number ?>"  class="form-control" placeholder="Phone Number"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Home Address:</label>
      <div class="col-sm-8">
          <input type="text" name="home_address" class="form-control" value="<?= $applicant_data->home_address ?>" placeholder="Home Address"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Birth Date:</label>
      <div class="col-sm-8">
          <input type="date" name="birth_date" class="form-control" value="<?= $applicant_data->birthday?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Degree:</label>
      <div class="col-sm-8">
          <input type="text" name="degree" class="form-control" placeholder="Degree" value="<?= $applicant_data->degree?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">School:</label>
      <div class="col-sm-8">
          <input type="text" name="school" class="form-control" placeholder="School" value="<?= $applicant_data->school?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Application Date:</label>
      <div class="col-sm-8">
          <input type="date" name="application_date" class="form-control" value="<?= $applicant_data->application_date?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label">Comment:</label>
      <div class="col-sm-8">
        <textarea class="form-control" name="comment"><?= $applicant_data->comment?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-8 offset-sm-2">
      `<input class="btn custom-button float-right" type="button" id="btn_interncancel" value="Cancel"/>
        <input type="submit" value="Update" class="btn custom-button float-right"/>
      </div>
    </div>

  </form>
</div>