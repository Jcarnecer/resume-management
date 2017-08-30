
  <center>
    <h3><b>Edit Applicant</b></h3>
  </center>
    <div class="container">
      <?php
        echo $this->session->flashdata('email_sent');
      ?>


     <form class="form-horizontal" id="add-form" enctype="multipart/form-data"  method="POST" action="<?= base_url('applicant/edit'); ?>">
       <input type="hidden" name="id" value="<?= $applicant_data->id ?>">
       <input type="hidden" name="last_name" value="<?= $applicant_data->last_name ?>">
       <input type="hidden" name="first_name" value="<?= $applicant_data->first_name ?>">
       <input type="hidden" name="middle_name" value="<?= $applicant_data->middle_name ?>">
       <input type="hidden" name="email_address" value="<?= $applicant_data->email_address?>">

       <input type="hidden" name="home_address" value="<?= $applicant_data->home_address ?>">


       <div class="form-group">
         <label  class="col-sm-3 control-label">Email Address:</label>
         <div class="col-sm-9">
             <input type="email" name="email_address" class="form-control" value="<?= $applicant_data->email_address ?>" placeholder="Email Address"/>
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
             <input type="text" name="home_address" class="form-control" value="<?= $applicant_data->home_address ?>" placeholder="Home Address"/>
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
              <option value="1">Pass</option>
              <option value="0">Failed</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label  class="col-sm-3 control-label">Interview Result:</label>
          <div class="col-sm-9">
            <select class="form-control" name="interview_result">
              <option value="1">Pass</option>
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
