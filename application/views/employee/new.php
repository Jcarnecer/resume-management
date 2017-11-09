<?php $position = $this->Resume_model->fetch('position');
     $role=$this->Resume_model->fetch('role',['pos_id'=>1,'status'=>1]);

// print_r($position);die;
  ?>
<div class="container-fluid">
  <h3>Add New Record</h3>
  <hr>
  <form class="form-horizontal" id="add-employee-form" enctype="multipart/form-data"  method="POST">
    
      <div id="status" class="form-group row">
        <label class="control-label col-sm-2">Current Status:</label>
        <div class="col-sm-8">
          <select name="current_status" id="current_status" class="form-control">
            <option value="disabled selected">Select Status</option>
            <!-- <option value="applicant">Applicant</option> -->
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
      </div>
    
      <div class="form-group row">
        <label  class="col-sm-2 control-label">Role:</label>
        <div class="col-sm-8">
            <select  id="role-employee" name="role" class="form-control">   
                <?php foreach($role as $row): ?>
                  <option value="<?= $row->role_id ?>" data-id="<?=$row->pos_id?>"><?= $row->name ?></option>
                  <?php endforeach; ?>
                  <option disabled>──────────</option>
                  <option value="Add Role" data-icon="glyphicon-heart" data-function="add_emprole" data-toggle="modal_emprole" data-target="modal" >Add Role</option>
            </select>
        </div>  
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Last Name:</label>
        <div class="col-sm-8">
          <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">First Name:</label>
        <div class="col-sm-8">
          <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Middle Name:</label>
        <div class="col-sm-8">
          <input type="text" name="middle_name" class="form-control" placeholder="Middle Name"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Email Address:</label>
        <div class="col-sm-8">
          <input type="email" name="email_address" class="form-control" placeholder="Email Address"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Phone Number:</label>
        <div class="col-sm-8">
          <input type="text" name="phone_number" class="form-control" placeholder="Phone Number"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Home Address:</label>
        <div class="col-sm-8">
          <input type="text" name="home_address" class="form-control" placeholder="Home Address"/>
        </div>
      </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Birth Date:</label>
      <div class="col-sm-8">
        <input type="date" name="birth_date" class="form-control"/>
      </div>
    </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">Degree:</label>
        <div class="col-sm-8">
          <input type="text" name="degree" class="form-control" placeholder="Degree"/>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-2 control-label">School:</label>
        <div class="col-sm-8">
          <input type="text" name="school" class="form-control" placeholder="School"/>
        </div>
      </div>

      <!-- Ito yung pang employee na part :)  -->

    
    <div class="form-group row"><br>
      <label  class="col-sm-2 control-label">Date Hired:</label>
      <div class="col-sm-8">
        <input type="date" name="date_hired" class="form-control" placeholder="Date Hired"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">SSS Number:</label>
      <div class="col-sm-8">
        <input type="text" name="sss" class="form-control" placeholder="SSS Number"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">TIN:</label>
      <div class="col-sm-8">
        <input type="text" name="tin" class="form-control" placeholder="TIN"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">PhilHealth:</label>
      <div class="col-sm-8">
        <input type="text" name="philhealth" class="form-control" placeholder="PHILHEALTH"/>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Pagibig:</label>
      <div class="col-sm-8">
          <input type="text" name="pagibig" class="form-control" placeholder="PAGIBIG"/>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label">Comment:</label>
      <div class="col-sm-8">
        <textarea class="form-control" name="comment"></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label">Image:</label>
      <div class="col-sm-8">
        <input type="file" name="image_file">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-8 offset-sm-2">
       <input class="btn custom-button float-right" type="button"  id="btn_empcancel"value="Cancel"/>
        <input class="btn custom-button float-right" type="submit" value="Create"/>
      </div>
    </div>

  </form>
</div>



<div class="modal fade" id="modal_emprole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Role:Employee</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-row" method="POST" id="role_form_employee">
            <div class="form-group col-md-6">
              <input type="text" id="role_name" class="form-control" name="role_name">
            </div>
            <div class="form-group col-md-6" id="position">
              <select class="form-control" name="pos_id" id="position_name">
                <?php foreach($position as $row):?>
                  <option data-posid="<?= $row->id ?>"value="<?= $row->id ?>"><?= $row->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn custom-button" id="btn-save" data-id="" data-function="">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>