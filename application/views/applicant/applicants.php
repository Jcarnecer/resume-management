  <div class="container-fluid" id="record-table">

    <div class="col-sm-10">
      <table class="table table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Date of Application</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($applicants as $applicant) : ?>
          <tr>
            <td><img id="thumbnail" src="assets/uploads/<?= $applicant->images ?>"></td>
            <td><h4><?= $applicant->first_name;?> <?= $applicant->last_name;?></h4></td>
            <td><?= $applicant->application_date;?></td>
            <td>
              <button type="button" class="btn btn-info" data-name="button-view" data-id="<?= $applicant->id; ?>">View</button>
              <a href="<?= base_url('applicant/edit_view/'.$applicant->id) ?>" type="button" class="btn btn-warning" data-id="<?= $applicant->id;?>" >Edit</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>


<!-- View Modal -->
<div id="viewmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Applicant</h4>
      </div>

      <div class="modal-body">


        <div class="modal-body">
        <table class="table table-bordered table-responsive">
    <thead>

    </thead>
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
        <b><label class="group-label">Role:</label></b>
      </td>
      <td>
        <div class="group-data" id="position"></div>
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

<!--put divider here!-->

        <tr>
          <td class"border-right:none">
            <b><label class="group-label">Exam/Interview Result:</label></b>
          </td>
          <td>
          </td>
        </tr>

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
          <div class="group-data" id="exam-result"></div>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
