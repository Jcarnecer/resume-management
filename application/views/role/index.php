
<?php
$position = $this->Resume_model->fetch('resume_position');
?>

<div class="container-fluid" id="record-table">
<button class="btn custom-button float-right" id="btn-add" data-toggle="modal"data-target="#roleModal">Add New Role</button>

  <h5 id="alert-role"></h5>
  <h3 class="title">Roles</h3>
  <hr>
  <!-- <div class="col-md-12"> -->
    <table class="table table-bordered table-responsive-xl" id="table-role">
      <thead>
        <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Status</th>
          <th>Actions</th>  
        </tr>
      </thead>
      <tbody id="tbody-role">
        <?php foreach ($roles as $role) : ?>
          <tr data-role="role_id" class="<?=$role->role_id?>">
          <td data-role="role_name"><?= $role->name?></td>
          <td data-role="position_name"><?=$role->pos_name?></td>
          <td data-role="role_status"><?=$role->status==1?"Activated":"Deactivated"?></td>
          <td>
            <div class="btn-group">
            <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" id="btn-update"data-id="<?= $role->role_id;?>"data-value="<?=$role->pos_id;?>" data-toggle="modal"data-target="#roleModal">Edit</a>
                  <a class="dropdown-item" data-value="<?=$role->pos_id;?>" data-id="<?= $role->role_id;?>"data-function="" id="btn-status">Deactivate</a>
                </div>
            </div>  
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <!-- </div> -->
</div>


<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-row" method="POST" id="role-form">
            <div class="form-group col-md-6">
              <input type="text" id="role_name" class="form-control" name="role_name">
            </div>
            <div class="form-group col-md-6" id="position">
              <select class="form-control" name="pos_id" id="position_name">
                <?php foreach($position as $row):?>
                  <option data-posid="<?= $row->id ?>"value="<?= $row->id ?>"><?= $row->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn custom-button" id="btn-save" data-id="" data-function="">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

