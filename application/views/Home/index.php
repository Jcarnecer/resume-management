
<div class="container-fluid">

  <!-- <div class="page-header">
    <h3>Welcome, Ma'am Tess ♥</h3>
</div> -->

  <div class="row align-items-center">
    <div class="col-md-6 tab-menu">
      <div class="list-group">
        <a href="<?= base_url('employee')?>" class="list-group-item active" id="employee">Employees <br><?= $this->Resume_model->count('record', ['pos_id'=> 1,'current_status'=>'Active']);?></a>
        <a href="<?= base_url('Intern')?>" class="list-group-item" id="intern">Interns <br><?=$this->Resume_model->count('record', ['pos_id'=> 2,'current_status'=>'Active'])?></a>
        <a href="<?= base_url('applicant')?>" class="list-group-item" id="applicants">Applicants <br><?=$this->Resume_model->count('record',['current_status'=>'applicant  '])?></a>
        <a href="<?= base_url('freelance')?>" class="list-group-item" id="freelance">Freelancers <br><?=$this->Resume_model->count('record', ['pos_id'=> 3,'current_status'=>'Active'])?></a>
      </div>
    </div>
  </div>
</div>
  