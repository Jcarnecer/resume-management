
    <center>
      <h1>Add New Applicant</h1>
    </center>
      <div class="container">
       <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('applicant/create_applicant'); ?>">

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
               <input type="email" name="email_add" class="form-control" placeholder="Email Address"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Password:</label>
           <div class="col-sm-9">
               <input type="password" name="password" class="form-control" placeholder="Password"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Phone Number:</label>
           <div class="col-sm-9">
               <input type="number" name="phone_no" class="form-control" placeholder="Phone Number"/>
           </div>
         </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Home Address:</label>
           <div class="col-sm-9">
               <input type="text" name="address" class="form-control" placeholder="Home Address"/>
           </div>
         </div>


        <div class="form-group">
          <label  class="col-sm-3 control-label">Birth Date:</label>
          <div class="col-sm-9">
              <input type="date" name="bdate" class="form-control"/>
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
           <label  class="col-sm-3 control-label">Position:</label>
           <div class="col-sm-9">
               <select name="position">
                 <?php foreach ($roles as $role): ?>
                  <option value="<?= $role->id; ?>"><?= $role->name; ?></option>
                <?php endforeach; ?>
               </select>
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
               <input type="text" name="salary" class="form-control" placeholder="Expected Salary"/>
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
           <div class="col-sm-9 col-sm-offset-3">
             <input type="submit" value="Create" class="btn btn-primary" />
           </div>
         </div>

      </form>
      </div>
    </body>
  </html>
