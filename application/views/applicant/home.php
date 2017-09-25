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
      <form class="form-inline" method="POST" id="add-role">
        <div class="form-group">
          <input type="text" placeholder="Add Role" name="role" class="form-control">
        </div>
        <div class="form-group">
          <select class="form-control" name="pos_id">
            <?php foreach($position as $row):?>
              <option value="<?= $row->id ?>"><?= $row->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group checkbox">
          <label><input type="checkbox" value="">Applicant</label>
        </div>
        <input class="btn btn-default" type="submit" value="Add Role">
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-6 tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item active" id="applicant">Applicants <br><?= $this->Resume_model->count('applicants','');?></a>
        <a href="#" class="list-group-item" id="employee">Employees <br><?= $this->Resume_model->count('record','pos_id=1');?></a>
        <a href="#" class="list-group-item" id="employee">Intern <br><?=$this->Resume_model->count('record','pos_id=2')?></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 tab">
      <div class="tab-content active">


        <?php
        if($role_applicant == ''){} else{
         foreach ($role_applicant as $role) :?>

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
                    <a href="<?= base_url('applicants?status=1&role=' . $role->role_id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->role_id,1); ?><br>Applicants</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=2&role=' . $role->role_id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->role_id,2)  ; ?><br>For Interview</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->role_id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->role_id,3); ?><br>Shortlist</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->role_id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->role_id,4); ?><br>Rejected</div>
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


    <div class="col-md-10 tab">
      <div class="tab-content">
        <div class="panel">

          <?php if($role_employee == ''){} else{
           foreach ($role_employee as $role) :?>
            <div class="panel">
              <form action="<?=base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->role_id ?>">
              <a><input type="submit" Value="Delete" class="btn btn-danger"></a>
            </form>
              <div class="panel-heading"><?= $role->name ?><hr></div>
              <div class="panel-body">
                <div class="row grid-divider">

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('applicants?status=1&role=' . $role->role_id); ?>">
                          <div><?= $this->Resume_model->count('employees',['record','current_status=current']); ?><br>Current</div>
                      </a>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('applicants?status=2&role=' . $role->role_id); ?>">
                        <div><?= $this->Resume_model->count('employees',['record','current_status=former']); ?><br>Former</div>
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

      <div class="col-md-10 tab">
        <div class="tab-content">
          <div class="panel">
            <?php if($role_intern == ''){} else{
            foreach ($role_intern as $role) :?>
              <div class="panel">
                <form action="<?=base_url('delete_role')?>">
                <input type="hidden" name="id" value="<?= $role->role_id?>">
                <a><input type="submit" Value="Delete" class="btn btn-danger"></a>
              </form>
                <div class="panel-heading"><?php echo $role->name;?><hr></div>
                <div class="panel-body">
                  <div class="row grid-divider">
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('applicants?status=1&role=' . $role->role_id); ?>">
                          <div><?= $this->Resume_model->count('employees',['record','current_status=current']); ?><br>Current</div>
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('applicants?status=2&role=' . $role->role_id); ?>">
                          <div><?= $this->Resume_model->count('employees',['record','current_status=former']); ?><br>Former</div>
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
</div>
