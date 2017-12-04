 <?php  $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Manila'));
        $date_now = $now->format('Y-m-d');
        $this->load->model('Resume_model');?>



<div class="modal fade" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">  
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
            
                    <table class="table table-bordered table-responsive-xl" id="interview_table">
                        <thead>
                            <tr>
                                <th>Name</th> 
                                <th>Position</th>
                                <th>Role</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_interview">
                          
                        </tbody>

                    </table>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>      
</div>



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
                    <?php if($position==""){

                    }else{
                      foreach($position as $pos):?>
                    <tr>
                      <td><?=$pos->name?></td>
                      <td><?=$this->Resume_model->count('resume_record',['interview_date'=>$date_now,'pos_id'=>$pos->id])==0?"None":$this->Resume_model->count('resume_record',['interview_date'=>$date_now,'pos_id'=>$pos->id])?></td>
                      <td>9:00 am - 1:00pm</td>
                      <td><button class="btn custom-button" data-toggle="modal" data-target="#interviewModal" data-function="applicant_interview" data-posid=<?=$pos->id?>>View</button></td>
                    </tr>
                  
                    <?php endforeach;?>
                    <?php }?>
                    </tbody>
                </table>
        </main>
    </div>
    

</div>







