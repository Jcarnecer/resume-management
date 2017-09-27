
  <center>
    <h3><b>Edit Applicant</b></h3>
  </center>
    <div class="container">
      <?php
        echo $this->session->flashdata('email_sent');
      ?>

     <form class="form-horizontal" id="edit-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('employee/edit'); ?>">

       <input type="hidden" name="id" value="<?=$employee_data->id?>">
       <div class="form-group">
         <label  class="col-sm-3 control-label">First Name</label>
         <div class="col-sm-9">
             <input type="type" name="first_name" class="form-control" value="<?= $employee_data->first_name ?>" placeholder="First Name"/>
         </div>
       </div>

       <div class="form-group">
           <label  class="col-sm-3 control-label">Last Name</label>
         <div class="col-sm-9">
             <input type="type" name="last_name" class="form-control" value="<?= $employee_data->last_name ?>" placeholder="Last Name"/>
         </div>
       </div>

       <div class="form-group">
           <label  class="col-sm-3 control-label">Middle Name</label>
         <div class="col-sm-9">
             <input type="type" name="middle_name" class="form-control" value="<?= $employee_data->middle_name ?>" placeholder="Middle Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Email Address:</label>
         <div class="col-sm-9">
             <input type="email" name="email_address" class="form-control" value="<?= $employee_data->email ?>" placeholder="Email Address"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Phone Number:</label>
         <div class="col-sm-9">
             <input type="number" name="phone_number" value="<?= $employee_data->phone_number ?>"  class="form-control" placeholder="Phone Number"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Home Address:</label>
         <div class="col-sm-9">
             <input type="text" name="home_address" class="form-control" value="<?= $employee_data->home_address ?>" placeholder="Home Address"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Status:</label>
         <div class="col-sm-9">
           <select class="form-control" name="current_status" value="<?= $employee_data->current_status?>">
             <option>Select Status</option>
             <option value="Current">Current</option>
             <option value="Former">Former</option>
           </select>
         </div>
       </div>


       <div class="form-group">
         <div class="col-sm-9 col-sm-offset-3">
           <input type="submit" value="Update" class="btn btn-primary" />
         </div>
       </div>

    </form>

    </div>