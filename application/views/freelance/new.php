<?php $position = $this->Resume_model->fetch('position');
     $role=$this->Resume_model->fetch('role',['pos_id'=>3]);

// print_r($position);die;
  ?>

    <center>
      <h3>Add New Record</h3>
    </center>
      <div class="container pull-left">
       <form class="form-horizontal pull" id="add-freelance-form" enctype="multipart/form-data"  method="POST">
    
          <div id="status" class="form-group">
            <label class="col-sm-3 control-label">Current Status:</label>
            <div class="col-sm-9">
                <select name="current_status" id="current_status" class="form-control">
                  <option value="disabled selected">Select Status</option>
                  <!-- <option value="applicant">Applicant</option> -->
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
            </div>
          </div>

         <div class="form-group">
           <label  class="col-sm-3 control-label">Role:</label>
           <div class="col-sm-9">
               <select id="role" name="role" class="form-control">
               <?php foreach($role as $row): ?>
                   <option value="<?= $row->role_id ?>"><?= $row->name ?></option>
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
           <label class="col-sm-3 control-label">Comment:</label>
           <div class="col-sm-9">
             <textarea class="form-control" name="comment"></textarea>
           </div>
         </div>

         <div class="form-group">
           <label class="col-sm-3 control-label">Image:</label>
           <div class="col-sm-9">
             <input type="file" name="image_file">
           </div>
         </div>

         <div class="form-group">
           <div class="col-sm-9 col-sm-offset-3">
             <input type="submit" value="Create"/>
           </div>
         </div>

      </form>