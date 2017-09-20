
    <center>
      <h3>Add New Record</h3>
    </center>
      <div class="container">
       <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('applicant/addRecord'); ?>">

         <div class="form-group">
           <label  class="col-sm-3 control-label">Role:</label>
             <div class="col-sm-9">
               <select id='staff' class="form-control" name="employment_type">
                 <option value="disabled selected">Select your option</option>
                 <option value="1">Applicant</option>
                 <option value="2">Employee</option>
                 <option value="3">Intern</option>
               </select>
             </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-3 control-label">Status:</label>
            <div class="col-sm-9">
                <select name="status" class="form-control">
                  <option value="disabled selected">Select Status</option>
                  <option value="1">Current</option>
                  <option value="0">Former</option>
                </select>
            </div>
          </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Position:</label>
           <div class="col-sm-9">
               <select name="position" class="form-control">
                 <?php foreach ($roles as $role): ?>
                  <option value="<?= $role->id; ?>"><?= $role->name; ?></option>
                <?php endforeach; ?>
               </select>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Last Name:</label>
           <div class="col-sm-9">
               <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
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
           <label  class="col-sm-3 control-label">Email Address:</label>
           <div class="col-sm-9">
               <input type="email" name="email_address" class="form-control" placeholder="Email Address"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Phone Number:</label>
           <div class="col-sm-9">
               <input type="text" name="phone_number" class="form-control" placeholder="Phone Number"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Home Address:</label>
           <div class="col-sm-9">
               <input type="text" name="home_address" class="form-control" placeholder="Home Address"/>
           </div>
         </div>


        <div class="form-group">
          <label  class="col-sm-3 control-label">Birth Date:</label>
          <div class="col-sm-9">
              <input type="date" name="birth_date" class="form-control"/>
          </div>
        </div>


         <div class="form-group">
           <label  class="col-sm-3 control-label">Degree:</label>
           <div class="col-sm-9">
               <input type="text" name="degree" class="form-control" placeholder="Degree"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">School:</label>
           <div class="col-sm-9">
               <input type="text" name="school" class="form-control" placeholder="School"/>
           </div>
         </div>


         <div class="form-group">
           <label  class="col-sm-3 control-label">Application Date:</label>
           <div class="col-sm-9">
               <input type="date" name="application_date" class="form-control"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Expected Salary:</label>
           <div class="col-sm-9">
               <input type="text" name="expected_salary" class="form-control" placeholder="Expected Salary"/>
           </div>
         </div>

         <div style='display:none;' id='emp_form'>
           <div class="form-group"><br>
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
                 <input type="text" name="tin" class="form-control" placeholder="TIN"/>
             </div>
           </div>

           <div class="form-group">
             <label  class="col-sm-3 control-label">PhilHealth:</label>
             <div class="col-sm-9">
                 <input type="text" name="philhealth" class="form-control" placeholder="PHILHEALTH"/>
             </div>
           </div>

           <div class="form-group">
             <label  class="col-sm-3 control-label">Pagibig:</label>
             <div class="col-sm-9">
                 <input type="text" name="pagibig" class="form-control" placeholder="PAGIBIG"/>
             </div>
           </div>

         </div>

         <div class="form-group">
           <label class="col-sm-3 control-label">Comment:</label>
           <div class="col-sm-9">
             <textarea class="form-control" name="comment"></textarea>
           </div>
         </div>

         <div class="form-group">
           <label class="col-sm-3 control-label">Resume:</label>
           <div class="col-sm-9">
             <input type="file" name="resume">
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
