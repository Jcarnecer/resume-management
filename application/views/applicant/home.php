<?php
$position = $this->Resume_model->fetch('position');
?>
<div class="container">

  <div class="page-header">
    <h3>Welcome, Ma'am Tess ♥</h3>
  </div>

  <div class="row new_record">
    <a href="<?= base_url('applicant/add') ?>" id="add-button" type="button" class="btn btn-info pull-left">New Record</a>
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
</div>

  <div class="row">
    <div class="col-md-6 tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item" id="employee">Employees <br><?= $this->Resume_model->count('record', ['pos_id'=> 1]);?></a>
        <a href="#" class="list-group-item" id="intern">Intern <br><?=$this->Resume_model->count('record', ['pos_id'=> 2])?></a>
      </div>
    </div>
  </div>

  <div class="row" id="employee">
    <div class="col-md-10 tab">
      <div class="tab-content active" id="employee_tab">
		  <?php
        if($role_employee== ''){} else{
         foreach ($role_employee as $role) :
        ?>
          <div class="panel">
            <form method="get" action="<?= base_url('delete_role')?>">
              <input type="hidden" name="id" value="<?= $role->role_id?>">
              <input type="submit" Value="Delete" class="btn btn-danger pull-right">
            </form>
            <div class="panel-heading"><?php echo $role->name;?><hr></div>
            <div class="panel-body">
              <div class="row grid-divider">

                <div class="col-sm-2">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?role=' . $role->role_id .'&current_status=applicant'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id,'current_status' => 'applicant','current_status' => "applicant", 'pos_id' => 1]);?><br>Applicants</div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="col-padding">
                    <a href="<?= base_url('appplicants?role=' . $role->role_id .'&current_status=interview'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'interview', 'pos_id' => 1]); ?><br>For Interview</div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=3&role=' . $role->role_id .'&current_status=shortlist'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'shortlist', 'pos_id' => 1]); ?><br>Shortlist</div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="col-padding">
                    <a href="<?= base_url('applicants?status=4&role=' . $role->role_id .'&current_status=archived'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'archived', 'pos_id' => 1]); ?><br>Rejected</div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="col-padding">
                      <a href="<?= base_url('employee?current_status=current&role=' . $role->role_id .'&position=1'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'current', 'pos_id' => 1]); ?><br>Current</div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="col-padding">
                    <a href="<?= base_url('employee?current_status=former&role=' . $role->role_id .'&position=1'); ?>">
                      <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'former', 'pos_id' => 1]); ?><br>Former</div>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
		  	<?php endforeach;?>
			<?php }?>
      </div>
    </div>


    <div class="col-md-10 tab" id="intern">
      <div class="tab-content" id="intern_tab">
          <?php if($role_intern == ''){} else{
           foreach ($role_intern as $role) :?>
           <div class="panel">
             <form method="get" action="<?= base_url('delete_role')?>">
               <input type="hidden" name="id" value="<?= $role->role_id?>">
               <input type="submit" Value="Delete" class="btn btn-danger pull-right">
             </form>
             <div class="panel-heading"><?php echo $role->name;?><hr></div>
             <div class="panel-body">
               <div class="row grid-divider">

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="<?= base_url('applicants?role=' . $role->role_id .'&current_status=applicant'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id,'current_status' => 'applicant','pos_id' => 2]);?><br>Applicants</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="<?= base_url('applicants?role=' . $role->role_id .'&current_status=interview'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'interview','pos_id' => 2]); ?><br>For Interview</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="<?= base_url('applicants?role=' . $role->role_id .'&current_status=shortlist'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'shortlist','pos_id' => 2]); ?><br>Shortlist</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="<?= base_url('applicants?role=' . $role->role_id .'&current_status=archived'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'archived', 'pos_id' => 2]); ?><br>Rejected</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                       <a href="<?= base_url('employee?current_status=current&role=' . $role->role_id .'&position=2'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'current', 'pos_id' => 2]); ?><br>Current</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="<?= base_url('employee?current_status=former&role=' . $role->role_id .'&position=2'); ?>">
                       <div><?= $this->Resume_model->count('record', ['role_id' => $role->role_id, 'current_status' => 'former', 'pos_id' => 2]); ?><br>Former</div>
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
