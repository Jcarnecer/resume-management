

  <a href="<?= base_url('home')?>"><img id="logo" src="assets/img/logo.png"></a>
    <a href="<?= base_url('applicant/add') ?>" id="add-button" type="button" class="btn btn-info pull-right">New Applicant</a>

      <div class="panel panel-default">
        <div class="container-fluid">

          <div class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
              <div class="list-group">
                <li><a href="#">Role</a></li>
                  <div class="list-group">
                    <li class="list-group-item"><a href="<?= base_url('applicant?role=Web Developer') ?>">Web Developer</a>
                    <li class="list-group-item"><a href="<?= base_url('applicant?role=Intern') ?>">Intern</a>
                  </div>
              </div>

              <div class="list-group">
                <li><a href="#">Expected Salary</a></li>
                <div class="list-group">
                  <li class="list-group-item"><a href="<?= base_url('applicant?salary=asc') ?>">Ascending</a></li>
                  <li class="list-group-item"><a href="<?= base_url('applicant?salary=desc') ?>">Descending</a></li>
                </div>
              </div>

              <li><a href="#">Expected Start</a></li>
              <li><a href="#">Application date</a></li>
            </ul>
          </div>

        <div class="col-sm-10">


            <!-- Applicant Tab -->
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Applicant</th>
                    <th>Name</th>
                    <th>Expected Salary</th>
                    <th>Actions</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($applicants as $applicant) : ?>
                  <tr>
                    <td><img id="thumbnail" src="assets/uploads/<?= $applicant->images ?>"></td>
                    <td><h4><?= $applicant->first_name;?> <?= $applicant->last_name;?></h4></td>
                    <td><?= $applicant->salary;?></td>
                    <td>
                      <button type="button" class="btn btn-info" data-name="button-view" data-id="<?= $applicant->id; ?>">View</button>
                      <a href="<?= base_url('applicant/edit_view/'.$applicant->id) ?>" type="button" class="btn btn-warning" data-id="<?= $applicant->id;?>" >Edit</a>
                      <button type="button" class="btn btn-danger" id="archived">Archived</button>
                    </td>
                    <td>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
          </div>

      </div>
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
                <div class="group-data"><a id="resume"></a></div>
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

<script>
$(function(){

    $('[data-name="button-view"]').click(function() {
        var applicantId = $(this).attr('data-id');
        var url = "<?= base_url('applicant') ?>/" +  applicantId;

        $.ajax({
            "url": url,
            "method": "GET",
            "success": function(response, status, http) {
                if (http.status == 200) {
                    $('#first-name').html(response.first_name);
                    $('#last-name').html(response.last_name);
                    $('#middle-name').html(response.middle_name);
                    $('#position').html(response.position);
                    $('#app_date').html(response.application_date);
                    $('#comment').html(response.comment);
                    $('#resume').html(response.file);
                    $('#viewmodal').modal('show');
                }
            }
        });
    });

});
</script>
