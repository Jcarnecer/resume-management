<?php
$position = $this->Resume_model->fetch('position');
?>
<div class="container">

  <div class="page-header">
    <h1>Welcome, Ma'am Tess <3</h1>
  </div>

  <div class="row">
    <a href="<?= base_url('applicant/add') ?>" id="add-button" type="button" class="btn btn-info pull-left">New Record</a>
  </div>

  <div class="row">
    <div class="input-group pull-right">
      <form class="form-inline" method="POST" id="add-role-form">
        <div class="form-group">
          <input type="text" placeholder="Add Role" name="role" class="form-control">
        </div>
        <div class="form-group" id="position">
          <select class="form-control" name="pos_id">
            <?php foreach($position as $row):?>
              <option value="<?= $row->id ?>"><?= $row->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group checkbox">
          <label><input type="checkbox" value="1" name="applicant">Applicant</label>
        </div>
        <input class="btn btn-default" type="submit" value="Add Role">
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-6 tab-menu">
      <div class="list-group">

        <a href="#" class="list-group-item active" id="applicant">Applicants <br><?= $this->Resume_model->count('record', ['current_status'=>"applicant"]);?></a>
        <a href="#" class="list-group-item" id="employee">Employees <br><?= $this->Resume_model->count('record', ['pos_id' => 1, 'current_status' => "current"]);?></a>
        <a href="#" class="list-group-item" id="intern">Intern <br><?=$this->Resume_model->count('record', ['pos_id' => 2,'current_status'=>"current",'current_status'=>"former"])?></a>
      </div>
    </div>
  </div>

  <div class="row" id="applicant">
    <div class="col-md-10 tab">
      <div class="tab-content active">
        <?php
        if($role_applicant == ''){} else{
         foreach ($role_applicant as $role) :
        ?>
          <div class="panel">
            <form method="get" action="<?= base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->role_id?>">
              <input type="submit" Value="Delete" class="btn btn-danger pull-right">
            </form>
            <div class="panel-heading"><?php echo $role->name;?><hr></div>
            <div class="panel-body">
              <div class="row grid-divider">
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=1&role=' . $role->role_id .'&current_status=applicant'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id,'application_status' => 1,'current_status' => "applicant"]);?><br>Applicants</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=2&role=' . $role->role_id .'&current_status=applicant'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'application_status' => 2,'current_status' => "applicant"]); ?><br>For Interview</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->role_id .'&current_status=applicant'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'application_status' => 3,'current_status' => "applicant"]); ?><br>Shortlist</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->role_id .'&current_status=applicant'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'application_status' => 4, 'current_status' => "applicant"]); ?><br>Rejected</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      <?php } ?>
      </div>
    </div>
  </div>


    <div class="col-md-10 tab" id="employee">
      <div class="tab-content">
        <div class="panel">
          <?php if($role_employee == ''){} else{
           foreach ($role_employee as $role) :?>
            <div class="panel">
              <form action="<?=base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->role_id ?>">
              <a><input type="submit" Value="Delete" class="btn btn-danger pull-right"></a>
            </form>
              <div class="panel-heading"><?= $role->name ?><hr></div>
              <div class="panel-body">
                <div class="row grid-divider">

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('employee?current_status=current&role=' . $role->role_id .'&position=1' ); ?>">
                        <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'current', 'pos_id' => 1]); ?><br>Current</div>
                      </a>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('employee?current_status=former&role=' . $role->role_id .'&position=1'  ); ?>">
                        <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'former', 'pos_id' => 1]); ?><br>Former</div>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        <?php } ?>
        </div>
      </div>

      <div id="intern">
      <div class="col-md-10 tab">
        <div class="tab-content">
          <div class="panel">
            <?php if($role_intern == ''){} else{
            foreach ($role_intern as $role) :?>
              <div class="panel">
                <form action="<?=base_url('delete_role')?>">
                <input type="hidden" name="id" value="<?= $role->role_id?>">
                <a><input type="submit" Value="Delete" class="btn btn-danger pull-right"></a>
              </form>
                <div class="panel-heading"><?php echo $role->name;?><hr></div>
                <div class="panel-body">
                  <div class="row grid-divider">
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('intern?current_status=current&role=' . $role->role_id .'&position=2'); ?>">
                          <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'current', 'pos_id' => 2]); ?><br>Current</div>
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('intern?current_status=former&role=' . $role->role_id .'&position=2'); ?>">
                          <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'former','pos_id' => 2]); ?><br>Former</div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          <?php } ?>
        </div>
    </div>
  </div>
</div>
