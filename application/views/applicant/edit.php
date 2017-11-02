<div class="container-fluid">
<h3>Edit Applicant</h3>
<hr>
  <?php
    echo $this->session->flashdata('email_sent');
  ?>

    <form class="form-horizontal" id="edit-form" enctype="multipart/form-data"  method="POST">

      <input type="hidden" name="id" value="<?= $applicant_data->id ?>">
      <input type="hidden" name="position" value="<?= $applicant_data->pos_id?>">

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
          <select class="form-control" name="pos_id">
          <?php if($applicant_data->pos_id=='1'){?>
            <option value=1 selected="selected">Employee</option>
            <option value=2>Intern</option>
            <option value=3>Freelance</option>
          <?php } elseif($applicant_data->pos_id=='2'){?>
            <option value="1">Employee</option>
            <option value="2" selected="selected">Intern</option>
            <option value="3">Freelance</option>
          <?php } elseif($applicant_data->pos_id=='3'){?>
            <option value="1">Employee</option>
            <option value="2">Intern</option>
            <option value="3" selected="selected">Freelance</option>  
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
      <label  class="col-sm-2 control-label">Status:</label>
      <div class="col-sm-8">
        <select class="form-control" name="status">
          <option value="<?= $applicant_data->current_status?>">Select Status</option>>
          <option value="applicant">Applicant</option>
          <option value="interview">For Interview</option>
          <option value="shortlist">Shortlist</option>
          <option value="archived">Archived</option>
          <option value="hired">Hired</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-8 offset-sm-2">
        <input type="submit" value="Update" class="btn custom-button float-right" />
      </div>
    </div>
  </form>

  <center>
    <h3><b>Exam/Interview</b></h3>
  </center>

  <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add_result">
    <input type="hidden" name="id" value="<?= $applicant_data->id ?>">

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Exam Result:</label>
      <div class="col-sm-8">
        <select class="form-control" name="exam_result">
      <?php if($applicant_data->exam_result=='Passed'){?>
        <option value="<?= $applicant_data->exam_result?>"><?=$applicant_data->exam_result?></option>
        <option value="Failed">Failed</option>
      <?php } elseif($applicant_data->exam_result=='Failed'){?>
        <option value="Passed">Passed</option>
        <option value="<?= $applicant_data->exam_result?>" selected="selected"><?= $applicant_data->exam_result?></option>
      <?php }else {?>
        <option value="" selected="selected">Select Exam Result</option>  
        <option value="Passed">Passed</option>
        <option value="Failed">Failed</option>
      <?php }?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-2 control-label">Interview Result:</label>
      <div class="col-sm-8">
        <select class="form-control" name="interview_result" >
          <option value="<?= $applicant_data->interview_result ?>">Select Interview Result</option>
          <option value="1">Passed</option>
          <option value="0">Failed</option>
        </select>
      </div>
    </div>


    <div class="form-group row">
      <label  class="col-sm-2 control-label">Interviewer:</label>
      <div class="col-sm-8">
          <input class="form-control" name="interviewer" placeholder="Interviewer" value="<?= $applicant_data->interviewer ?>"/>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label">Interview Notes:</label>
      <div class="col-sm-8">
        <input type="file" name="notes_file" value="<?= $applicant_data->interview_notes?>">
      </div>
    </div>

      <div class="form-group row">
        <label class="col-sm-2 control-label">Comments:</label>
        <div class="col-sm-8">
          <textarea class="form-control" name="comment"><?=$applicant_data->comment?></textarea>
        </div>
      </div>

    <div class="form-group row">
      <div class="col-sm-8 offset-sm-2">
        <input type="submit" value="Submit" class="btn custom-button float-right" />
      </div>
    </div>
  </form>

</div>