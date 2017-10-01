  <div class="container-fluid" id="record-table">

    <div class="col-sm-10">
      <table class="table table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($applicants as $applicant) : ?>
          <tr>
            <td><img id="thumbnail" src="assets/uploads/<?= $applicant->images ?>"></td>
            <td><h4><?= $applicant->first_name;?> <?= $applicant->last_name;?></h4></td>
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
        <div class="list-item">
          <label class="group-label">First Name:</label>
          <div class="group-data" id="first-name"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Last Name:</label>
          <div class="group-data" id="last-name"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Middle Name:</label>
          <div class="group-data" id="middle-name"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Role:</label>
          <div class="group-data" id="position"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Application Date:</label>
          <div class="group-data" id="app_date"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Comments:</label>
          <div class="group-data" id="comment"></div>
        </div>

        <div class="list-item">
          <label class="group-label">Resume:</label>
          <div class="group-data"><a target="_blank" id="resume"></a></div>
        </div>

        <b>Exam/Interview</b>
          <div class="list-item">
            <label class="group-label">Exam Result:</label>
            <div class="group-data" id="exam-result"></div>
          </div>

          <div class="list-item">
            <label class="group-label">Interview Result:</label>
            <div class="group-data" id="interview-result"></div>
          </div>

          <div class="list-item">
            <label class="group-label">Interviewer:</label>
            <div class="group-data" id="interviewer"></div>
          </div>

          <div class="list-item">
            <label class="group-label">interview notes:</label>
            <div class="group-data"><a target="_blank" id="interview-notes"></a></div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
