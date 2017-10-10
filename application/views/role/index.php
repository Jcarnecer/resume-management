
<?php
$position = $this->Resume_model->fetch('position');
?>

<div class="container-fluid" id="record-table">
    <h2>Roles</h2>
  <div class="col-sm-10">
    <table class="table table-striped" id="table-role">
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
            <button class="btn btn-warning" id="btn-update"data-id="<?= $role->role_id;?>"data-value="<?=$role->pos_id?>" data-toggle="modal"data-target="#roleModal">Edit</a>
            <button class="btn btn-danger" data-id="<?= $role->role_id;?>"data-function="" id="btn-status">Deactivate</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Update Role</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="POST" id="update-role-form">
          <div class="form-group">
            <input type="text" id="role_name" class="form-control">
          </div>
          <div class="form-group" id="position">
            <select class="form-control" name="pos_id" id="position_name">
              <?php foreach($position as $row):?>
                <option data-posid="<?= $row->id ?>"value="<?= $row->id ?>"><?= $row->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateRole" data-id="">Save changes</button>
      </div>
    </div>
  </div>
</div>

