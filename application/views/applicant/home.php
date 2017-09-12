<div class="container">

  <div class="page-header">
    <h1>Welcome, Ma'am Tess <3</h1>
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
        <a href="#" class="list-group-item active" id="applicant">Applicants <br><?= $count;?></a>
        <a href="#" class="list-group-item" id="employee">Employees <br><?= $countemployee;?></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 tab">
      <div class="tab-content active">
        <?php foreach ($role as $role) :?>
          <div class="panel">
            <div class="panel-heading"><?php echo $role->name;?><hr></div>
            <div class="panel-body">
              <div class="row grid-divider">
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=1&role=' . $role->id); ?>">
                      <div><?= $this->applicant->count($role->id,1); ?><br>Applicants</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=2&role=' . $role->id); ?>">
                      <div><?= $this->applicant->count($role->id,2); ?><br>For Interview</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->id); ?>">
                      <div><?= $this->applicant->count($role->id,3); ?><br>Shortlist</div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->id); ?>">
                      <div><?= $this->applicant->count($role->id,4); ?><br>Rejected</div>
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
          <div class="panel-heading">Regular<hr></div>
          <div class="panel-body">
            <div class="row grid-divider">
              <div class="col-sm-6">
                <div class="col-padding">
                  <a href="<?= base_url('view_employee?status=0');?>">
                    <div>Former <br><?= $countempformer;?></div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="col-padding">
                  <a href="<?= base_url('view_employee?status=1');?>">
                    <div>Current <br><?= $countempcurrent;?></div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-heading">Intern<hr></div>
          <div class="panel-body">
            <div class="row grid-divider">
              <div class="col-sm-6">
                <div class="col-padding">
                  <a href="<?= base_url('view_employee?status=0');?>">
                    <div>Former <br><?= $countinternformer;?></div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="col-padding">
                  <a href="<?= base_url('view_employee?status=1');?>">
                    <div>Current <br><?= $countinterncurrentemp;?></div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
