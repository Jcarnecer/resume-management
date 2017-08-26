<div class="container">

  <div class="page-header">
    <h1>Welcome, Bitch</h1>
  </div>

  <div class="row">
    <a href="<?= base_url('applicant/add') ?>" id="add-button" type="button" class="btn btn-info pull-left">New FAM</a>
    <div class="input-group pull-right">
      <form method="POST" action="<?= base_url('applicant/insert_role');?>" >
        <input type="text" name="name" class="form-control">
        <input class="btn btn-default" type="submit" value="Add Role">
      </form>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6 tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item active">Applicants <br>1,23<?= $count;?></a>
        <a href="#" class="list-group-item">Employees <br>2,34<?= $countemployee;?></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="tab">
      <div class="tab-content active">
        <?php foreach ($role as $role) :?>
          <div class="panel">
            <div class="panel-heading"><?php echo $role->name;?><hr></div>
            <div class="panel-body">
              <div class="row grid-divider">
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=1&role=' . $role->id); ?>">
                      <div>Applicants <br><?= $this->applicant->count($role->id,1); ?></div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=2&role=' . $role->id); ?>">
                      <div>For Interview <br><?= $this->applicant->count($role->id,2); ?></div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->id); ?>">
                      <div>Shortlist <br><?= $this->applicant->count($role->id,3); ?></div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->id); ?>">
                      <div>Rejected <br><?= $this->applicant->count($role->id,4); ?></div>
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

  <div class="row">
    <div class="col-md-6 tab">
      <div class="tab-content">
        <a href="<?= base_url('view_employee?status=0');?>" type="button" class="btn btn-default" id="btn">Former <br><?= $countempformer;?></a>
        <a href="<?= base_url('view_employee?status=1');?>" type="button" class="btn btn-default" id="btn">Current <br><?= $countempcurrent;?></a>
        <h2> Intern </h2>
        <a href="<?= base_url('view_employee?status=0');?>" type="button" class="btn btn-default" id="btn">Former <br><?= $countempformer;?></a>
        <a href="<?= base_url('view_employee?status=1');?>" type="button" class="btn btn-default" id="btn">Current <br><?= $countempcurrent;?></a>

        <br><a href="<?= base_url('addEmployee')?>" id="addEmployee" type="button" class="btn btn-default">Add Staff</a>
      </div>
    </div>
  </div>
</div>
