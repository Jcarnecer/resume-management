<div class="container-fluid">

  <!-- <div class="page-header">
    <h3>Welcome, Ma'am Tess ♥</h3>
</div> -->

  <div class="row">
  <!-- <a href="<?= base_url('roles')?>" class="btn custom-button" id="Roles"> View Roles</a> -->
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 center-block dashboard-margin">
      <ul class="button-group">
        <li><a href="<?= base_url('employee')?>" class="button-group-item active" id="employee">Employees <br> <span class="number"><?= $this->Resume_model->count_record(['record.pos_id'=> '1']);?></span></a></li>
        <li><a href="<?= base_url('Intern')?>" class="button-group-item" id="intern">Interns <br> <span class="number"><?=$this->Resume_model->count_record(['record.pos_id'=> '2'])?></span></a></li>
        <li><a href="<?= base_url('applicant')?>" class="button-group-item" id="applicants">Applicants <br> <span class="number"><?=$this->Resume_model->count_applicant()?></span></a></li>
        <li><a href="<?= base_url('freelance')?>" class="button-group-item" id="freelance">Freelancers <br> <span class="number"><?=$this->Resume_model->count_record(['record.pos_id'=>'3'])?></span></a></li>
      </ul>
    </div>
  </div>
</div>
  