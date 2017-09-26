
  <center>
    <h3><b>Edit Applicant</b></h3>
  </center>
    <div class="container">
      <?php
        echo $this->session->flashdata('email_sent');
      ?>

     <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('applicant/edit'); ?>">

       <input type="hidden" name="id" value="<?= $applicant_data->id ?>">
       <input type="hidden" name="school" value="<?= $applicant_data->school?>">
       <input type="hidden" name="position" value="<?= $applicant_data->pos_id?>">
       <input type="hidden" name="birth_date" value="<?= $applicant_data->birthday ?>">
       <input type="hidden" name="degree" value="<?= $applicant_data->degree?>">

       <div class="form-group">
         <label  class="col-sm-3 control-label">First Name</label>
         <div class="col-sm-9">
             <input type="type" name="first_name" class="form-control" value="<?= $applicant_data->first_name ?>" placeholder="First Name"/>
         </div>
       </div>

       <div class="form-group">
           <label  class="col-sm-3 control-label">Last Name</label>
         <div class="col-sm-9">
             <input type="type" name="last_name" class="form-control" value="<?= $applicant_data->last_name ?>" placeholder="Last Name"/>
         </div>
       </div>

       <div class="form-group">
           <label  class="col-sm-3 control-label">Middle Name</label>
         <div class="col-sm-9">
             <input type="type" name="middle_name" class="form-control" value="<?= $applicant_data->middle_name ?>" placeholder="Middle Name"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Email Address:</label>
         <div class="col-sm-9">
             <input type="email" name="email_address" class="form-control" value="<?= $applicant_data->email ?>" placeholder="Email Address"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Phone Number:</label>
         <div class="col-sm-9">
             <input type="number" name="phone_number" value="<?= $applicant_data->phone_number ?>"  class="form-control" placeholder="Phone Number"/>
         </div>
       </div>

       <div class="form-group">
         <label  class="col-sm-3 control-label">Home Address:</label>
         <div class="col-sm-9">
             <input type="text" name="home_address" class="form-control" value="<?= $applicant_data->home_address ?>" placeholder="Home Address"/>
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
          <input type="date" name="application_date" class="form-control" placeholder="application_date"/>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Comment:</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="comment"></textarea>
      </div>
    </div>



      <div class="form-group">
        <label  class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-9">
          <select class="form-control" name="status" value="<?php $applicant_data->application_status;?>">
            <option value="1" selected>Applicant</option>
            <option value="2">For Interview</option>
            <option value="3">Shortlist</option>
            <option value="4">Archived</option>
            <option value="5">Hired</option>
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

    <div class="container">
      <center>
        <h3><b>Exam/Interview</b></h3>
      </center>

       <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= base_url('add_result'); ?>">
         <input type="hidden" name="id" value="<?= $applicant_data->id ?>">

        <div class="form-group">
          <label  class="col-sm-3 control-label">Exam Result:</label>
          <div class="col-sm-9">
            <select class="form-control" name="exam_result">
              <option selected="selected">Select Exam Result</option>
              <option value="1">Passed</option>
              <option value="0">Failed</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-3 control-label">Interview Result:</label>
          <div class="col-sm-9">
            <select class="form-control" name="interview_result">
              <option selected="selected"value="3">Select Interview Result</option>
              <option value="1">Passed</option>
              <option value="0">Failed</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label  class="col-sm-3 control-label">Interviewer:</label>
          <div class="col-sm-9">
              <input class="form-control" name="interviewer" placeholder="Interviewer"/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Interview Notes:</label>
          <div class="col-sm-9">
            <input type="file" name="notes">
          </div>
        </div>

         <div class="form-group">
           <label class="col-sm-3 control-label">Comments:</label>
           <div class="col-sm-9">
             <textarea class="form-control" name="comment"> </textarea>
           </div>
         </div>

        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
            <input type="submit" value="Submit" class="btn btn-primary" />
          </div>
        </div>

      </form>

    </div>
</body>
</html>
