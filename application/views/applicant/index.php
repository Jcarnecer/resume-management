<div class="container-fluid" id="record-table">
  <a href="<?= base_url('applicants/add') ?>" id="add-button" class="btn custom-button float-right">New Record</a>
  <h3 class="title">Applicants</h3>
  <hr>
  <table class="table table-bordered table-responsive-xl" id="applicant_table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="tbody_applicant">
      <?php 
        if($applicants==''){}else{
      foreach ($applicants as $applicant) : ?>
      <tr>
        <!-- <td><img class="thumb" id="thumbnail" src="assets/uploads/<?= $applicant->images ?>"></td> -->
        <td><?= $applicant->first_name;?> <?= $applicant->last_name;?></td>
        <td><?= $applicant->pos_name?></td>
        <td><?= $applicant->name?></td>
        <td><?= $applicant->current_status?></td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" data-name="button-view" data-id="<?= $applicant->id; ?>">View</a>
          <!-- <a href="<?= base_url('assets/uploads/'.$applicant->file) ?>" type="button" class="btn btn-info" data-id="<?= $applicant->id;?>" >View Resume</a> -->
          <a href="<?= base_url('applicant/edit_view/'.$applicant->id) ?>" class="dropdown-item" data-id="<?= $applicant->id;?>" >Edit</a>
            </div>

          </div>
          <!-- <button type="button" class="btn custom-button" data-name="button-view" data-id="<?= $applicant->id; ?>">View</button>
          <a href="<?= base_url('assets/uploads/'.$applicant->file) ?>" type="button" class="btn btn-info" data-id="<?= $applicant->id;?>" >View Resume</a> 
          <a href="<?= base_url('applicant/edit_view/'.$applicant->id) ?>" class="btn custom-button" data-id="<?= $applicant->id;?>" >Edit</a> -->
          
        </td>
      </tr>
      <?php endforeach; ?>
        <?php }?>
    </tbody>
  </table>
  </div>


<!-- View Modal -->
<div id="viewmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Applicant</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="modal-body">
          <table class="table table-bordered table-responsive-xl">
            <thead> </thead>
              <tbody>
              <tr>
                <td>
                  <b><label class="group-label">First Name:</label></b>
                </td>
                <td>
                  <div class="group-data" id="first-name"></div>
                </td>
              </tr>

              <tr>
                <td>
                <b><label class="group-label">Last Name: </label></b>
                </td>
                <td>
                  <div class="group-data" id="last-name"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Middle Name:</label></b>
                </td>
                <td>
                  <div class="group-data" id="middle-name"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Home Address:</label></b>
                </td>
                <td>
                  <div class="group-data" id="home-address"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Phone Number:</label></b>
                </td>
                <td>
                  <div class="group-data" id="phone_number"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Birthday:</label></b>
                </td>
                <td>
                  <div class="group-data" id="birthday"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Degree:</label></b>
                </td>
                <td>
                  <div class="group-data" id="degree"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">School:</label></b>
                </td>
                <td>
                  <div class="group-data" id="school"></div>
                </td>
              </tr>

              
              <tr>
                <td>
                  <b><label class="group-label">Role:</label></b>
                </td>
                <td>
                  <div class="group-data" id="role"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Application Date:</label></b>
                </td>
                <td>
                  <div class="group-data" id="app_date"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Interview Date:</label></b>
                </td>
                <td>
                  <div class="group-data" id="interview_date"></div>
                </td>
              </tr>


              <tr>
                <td>
                  <b><label class="group-label">Comments:</label></b>
                </td>
                <td>
                  <div class="group-data" id="comment"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <b><label class="group-label">Resume:</label></b>
                </td>
                <td>
                  <div class="group-data"><a target="_blank" id="resume"></a></div>
                </td>
              </tr>
            </tbody>
          </table>

    <!--put divider here!-->
    <div class="row">
      <h4>Exam/Interview Result</h4>
    </div>
    <table class="table table-bordered table-responsive">
      <thead> </thead>
        <tbody>

      <tr>
        <td>
          <b><label class="group-label">Exam Result:</label></b>
        </td>
        <td>
          <div class="group-data" id="exam-result"></div>
        </td>
      </tr>

      <tr>
        <td>
          <b><label class="group-label">Interview Result:</label></b>
        </td>
        <td>
          <div class="group-data" id="interview-result"></div>
        </td>
      </tr>

      <tr>
        <td>
          <b><label class="group-label">Interviewer:</label></b>
        </td>
        <td>
          <div class="group-data" id="interviewer"></div>
        </td>
      </tr>

      <tr>
        <td>
          <b><label class="group-label">Interview Notes:</label></b>
        </td>
        <td>
          <div class="group-data"><a target="_blank" id="interview-notes"></a></div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
</div>