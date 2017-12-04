<div class="container-fluid">

  <div class="page-header">
    <h3>Welcome</h3>
</div>
  
  <div class="row">
  <main role="main" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 pt-3">
  <!-- <a href="<?= base_url('roles')?>" class="btn custom-button" id="Roles"> View Roles</a> -->
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 center-block dashboard-margin">
      <ul class="button-group">
        <li><a href="<?= base_url('employee')?>" class="button-group-item active" id="employee">Employees</a></li>
        <li><a href="<?= base_url('Intern')?>" class="button-group-item" id="intern">Interns</a></li>
        <li><a href="<?= base_url('freelance')?>" class="button-group-item" id="freelance">Freelancers</a></li>
        <li><a href="<?= base_url('applicant')?>" class="button-group-item" id="applicants">Applicants</a></li>
      </ul>
    </div>

    <h2>Interview Schedules</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Position</th>
                  <th># of Applicants</th>
                  <th>Time</th>
                  <th>Actions</th>
                </tr>
              </thead> 
              <tbody>
                <tr>
                  <td>Employee</td>
                  <td><?=$interview_employee==0?"None":$interview_employee?></td>
                  <td>9:00 am - 1:00pm</td>
                  <td><button class="btn custom-button">View</button></td>
                </tr>
                <tr>
                  <td>Intern</td>
                  <td><?=$interview_intern==0?"None":$interview_intern?></td>
                  <td>9:00 am - 1:00pm</td>
                  <td><button class="btn custom-button" data-toggle="modal" data-target="#interviewModal">View</button></td>
                </tr>
                <tr>
                  <td>Freelance</td>
                  <td><?=$interview_freelance==0?"None":$interview_intern?></td>
                  <td>9:00 am - 1:00pm</td>
                  <td><button class="btn custom-button">View</button></td>
                </tr>
        </main>
    </div>
    
  <div class="modal fade" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="dialog">
        <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">For Interview</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">

        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
</div>




</div>




