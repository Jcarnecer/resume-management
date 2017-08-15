<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <center>
    <h1>Add Employee</h1>
  </center>
    <div class="container">
     <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('ApplicantController/add_employee'); ?>">
       <input type="hidden" name="id">
       <div class="form-group">
         <label  class="col-sm-3 control-label">Last Name:</label>
         <div class="col-sm-9">
             <input type="text" name="last_name" class="form-control"  placeholder="Last Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">First Name:</label>
         <div class="col-sm-9">
             <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Middle Name:</label>
         <div class="col-sm-9">
             <input type="text" name="middle_name" class="form-control" placeholder="Middle Name"/>
         </div>
       </div>


       <div class="form-group">
         <label  class="col-sm-3 control-label">Home Address:</label>
         <div class="col-sm-9">
            <input type="text" name="address" class="form-control" placeholder="Home Address"/>
          </div>
        </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Email Address:</label>
         <div class="col-sm-9">
             <input type="email" name="email_add" class="form-control" placeholder="Email Address"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Phone Number:</label>
         <div class="col-sm-9">
             <input type="number" name="phone_no"  class="form-control" placeholder="Phone Number"/>
         </div>
       </div>



      <div class="form-group">
        <label  class="col-sm-3 control-label">Birth Date:</label>
        <div class="col-sm-9">
            <input type="date" name="bdate"  class="form-control"/>
        </div>
      </div>


       <div class="form-group">
         <label  class="col-sm-3 control-label">Position:</label>
         <div class="col-sm-9">
             <input type="text" name="position"  class="form-control" placeholder="Position"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Date Hired:</label>
         <div class="col-sm-9">
             <input type="date" name="date_hired" class="form-control" placeholder="Date Hired"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">SSS Number:</label>
         <div class="col-sm-9">
             <input type="text" name="sss" class="form-control" placeholder="SSS Number"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">TIN:</label>
         <div class="col-sm-9">
             <input type="text" name="tin" class="form-control" placeholder="tin"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">PhilHealth:</label>
         <div class="col-sm-9">
             <input type="text" name="philhealth" class="form-control" placeholder="philhealth"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Pagibig:</label>
         <div class="col-sm-9">
             <input type="text" name="pagibig" class="form-control" placeholder="pagibig"/>
         </div>
       </div>

       <div class="form-group">
         <div class="col-sm-9 col-sm-offset-3">
           <input type="submit" value="Add Applicant" class="btn btn-primary" />
         </div>
       </div>

    </form>
    </div>
</body>
</html>
