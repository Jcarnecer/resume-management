<div class="container">

  <div class="page-header">
    <h1>Welcome, Ma'am Tess <3</h1>
  </div>

  <div class="row">
    <a href="<?= base_url('applicant/add') ?>" id="add-button" type="button" class="btn btn-info pull-left">New Record</a>
    <div class="input-group pull-right">
      <form method="POST" action="<?= base_url('insert_role');?>" >
        <input type="text" name="role" class="form-control">
        <select class="form-control" name="type">
          <option value="1">Applicant</option>
          <option value="2">Eployee</option>
          <option value="3">Intern</option>
        </select>
        <input class="btn btn-default" type="submit" value="Add Role">
      </form>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6 tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item active" id="applicant">Applicants <br><?= $count;?></a>
        <a href="#" class="list-group-item" id="employee">Employees <br><?= $countemployee;?></a>
        <a href="#" class="list-group-item" id="employee">Intern <br><?= $countemployee;?></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 tab">
      <div class="tab-content active">
        <?php foreach ($role_applicant as $role) :?>
          <div class="panel">
            <form method="get" action="<?= base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->id?>">
              <input type="submit" Value="Delete" class="btn btn-danger pull-right">
            </form>
            <div class="panel-heading"><?php echo $role->name;?><hr></div>
            <div class="panel-body">
              <div class="row grid-divider">
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=1&role=' . $role->id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->id,1); ?><br>Applicants</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=2&role=' . $role->id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->id,2); ?><br>For Interview</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->id,3); ?><br>Shortlist</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->id); ?>">
                      <div><?= $this->Resume_model->count_applicant($role->id,4); ?><br>Rejected</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php endforeach;?>
      </div>
    </div>
  </div>


    <div class="col-md-10 tab">
      <div class="tab-content">
        <div class="panel">
          <?php foreach ($role_employee as $role) :?>
            <div class="panel">
              <form action="<?=base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->id?>">
              <a><input type="submit" Value="Delete" class="btn btn-danger"></a>
            </form>
              <div class="panel-heading"><?php echo $role->name;?><hr></div>
              <div class="panel-body">
                <div class="row grid-divider">

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('applicants?status=1&role=' . $role->id); ?>">
                        <div><?= $this->Resume_model->count_applicant($role->id,1); ?><br>Current</div>
                      </a>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="col-padding">
                      <a href="<?= base_url('applicants?status=2&role=' . $role->id); ?>">
                        <div><?= $this->Resume_model->count_applicant($role->id,0); ?><br>Former</div>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>

      <div class="col-md-10 tab">
        <div class="tab-content">
          <div class="panel">
            <?php foreach ($role_intern as $role) :?>
              <div class="panel">
                <form action="<?=base_url('delete_role')?>">
                <input type="hidden" name="id" value="<?= $role->id?>">
                <a><input type="submit" Value="Delete" class="btn btn-danger"></a>
              </form>
                <div class="panel-heading"><?php echo $role->name;?><hr></div>
                <div class="panel-body">
                  <div class="row grid-divider">
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('applicants?status=1&role=' . $role->id); ?>">
                          <div><?= $this->Resume_model->count_applicant($role->id,1); ?><br>Current</div>
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="col-padding">
                        <a href="<?= base_url('applicants?status=2&role=' . $role->id); ?>">
                          <div><?= $this->Resume_model->count_applicant($role->id,0); ?><br>Former</div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
        </div>

    </div>
  </div>
</div>
