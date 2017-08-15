
  <center>
    <h1>Edit Applicant</h1>
  </center>
    <div class="container">
     <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('applicant/edit'); ?>">
       <input type="hidden" name="id" value="<?= $applicant_data->id ?>">
       <div class="form-group">
         <label  class="col-sm-3 control-label">Last Name:</label>
         <div class="col-sm-9">
             <input type="text" name="last_name" value="<?= $applicant_data->last_name ?>" class="form-control"  placeholder="Last Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">First Name:</label>
         <div class="col-sm-9">
             <input type="text" name="first_name" value="<?= $applicant_data->first_name ?>" class="form-control" placeholder="First Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Middle Name:</label>
         <div class="col-sm-9">
             <input type="text" name="middle_name" value="<?= $applicant_data->middle_name ?>" class="form-control" placeholder="Middle Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Email Address:</label>
         <div class="col-sm-9">
             <input type="email" name="email_add" class="form-control" value="<?= $applicant_data->email_add ?>" placeholder="Email Address"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Phone Number:</label>
         <div class="col-sm-9">
             <input type="number" name="phone_no" value="<?= $applicant_data->phone_no ?>"  class="form-control" placeholder="Phone Number"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Home Address:</label>
         <div class="col-sm-9">
             <input type="text" name="address" class="form-control" value="<?= $applicant_data->address ?>" placeholder="Home Address"/>
         </div>
       </div>


      <div class="form-group">
        <label  class="col-sm-3 control-label">Birth Date:</label>
        <div class="col-sm-9">
            <input type="date" name="bdate" value="<?= $applicant_data->bdate ?>" class="form-control"/>
        </div>
      </div>


       <div class="form-group">
         <label  class="col-sm-3 control-label">Degree:</label>
         <div class="col-sm-9">
             <input type="text" name="degree" value="<?= $applicant_data->degree ?>" class="form-control" placeholder="Degree"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">School:</label>
         <div class="col-sm-9">
             <input type="text" name="school" value="<?= $applicant_data->school ?>" class="form-control" placeholder="School"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Position:</label>
         <div class="col-sm-9">
             <input type="text" name="position" value="<?= $applicant_data->position ?>" class="form-control" placeholder="Position"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Application Date:</label>
         <div class="col-sm-9">
             <input type="date" name="application_date" value="<?= $applicant_data->application_date ?>" class="form-control"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Expected Salary:</label>
         <div class="col-sm-9">
             <input type="text" name="salary" value="<?= $applicant_data->salary ?>" class="form-control" placeholder="Expected Salary"/>
         </div>
       </div>

       <div class="form-group">
         <label class="col-sm-3 control-label">Comment:</label>
         <div class="col-sm-9">
           <textarea class="form-control" name="comment"></textarea>
         </div>
       </div>

       <div class="form-group">
         <label class="col-sm-3 control-label">Image:</label>
         <div class="col-sm-9">
           <input type="file" name="image">
         </div>
       </div>


       <div class="form-group">
         <div class="col-sm-9 col-sm-offset-3">
           <input type="submit" value="Create" class="btn btn-primary" />
         </div>
       </div>

    </form>
    </div>
</body>
</html>
