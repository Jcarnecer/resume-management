<div class="container-fluid" id="record-table">

  <div class="col-sm-10">
  <a href="<?= base_url('freelance/add') ?>" id="add-button" type="button" class="btn btn-info pull-right">New Record</a>
    <table class="table table-striped" id="freelance_table">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Role</th> 
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <?php 
        if($freelance== ''){ } else{
          foreach ($freelance as $freelance) : ?>
        <tr>
          <td><img id="thumbnail" src="assets/uploads/<?= $freelance->images ?>"></td>
          <td><h4><?= $freelance->first_name;?> <?= $freelance->last_name;?></h4></td>  
          <td><?=$freelance->name?></td>
          <td><?=$freelance->current_status?></td>
          <td>
            <button type="button" class="btn btn-info" data-name="button-view" data-id="<?=$freelance->id; ?>">View</button>
            <a href="<?= base_url('freelance/edit/'.$freelance->id) ?>" type="button" class="btn btn-warning" data-id="<?= $freelance->id;?>" >Edit</a>
          </td>
        </tr>
        <?php endforeach; ?>
    <?php }?>
      </tbody>
    </table>
  </div>

</div>


<!-- View Modal -->
<div id="viewmodal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Applicant</h4>
    </div>

    <div class="modal-body">
      <div class="list-item">
        <label class="group-label">First Name:</label>
        <div class="group-data" id="first-name"></div>
      </div>

      <div class="list-item">
        <label class="group-label">Last Name:</label>
        <div class="group-data" id="last-name"></div>
      </div>

      <div class="list-item">
        <label class="group-label">Middle Name:</label>
        <div class="group-data" id="middle-name"></div>
      </div>

      <div class="list-item">
        <label class="group-label">Role:</label>
        <div class="group-data" id="position"></div>
      </div>

      <div class="list-item">
        <label class="group-label">Comments:</label>
        <div class="group-data" id="comment"></div>
      </div>

    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>

</body>
</html>

<script>

</script>
