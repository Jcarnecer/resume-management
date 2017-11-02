<div class="container-fluid" id="record-table">
  <a href="<?= base_url('intern/add') ?>" id="add-button" class="btn custom-button float-right">New Record</a>
  <h3 class="title">Interns</h3>
  <hr>
  <table class="table table-bordered table-responsive-xl" id="intern_table">
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
      if($interns== ''){ } else{
        foreach ($interns as $intern) : ?>
      <tr>
        <td><img class="thumb" id="thumbnail" src="assets/uploads/<?= $intern->images ?>"></td>
        <td><?= $intern->first_name;?> <?= $intern->last_name;?></td>  
        <td><?=$intern->name?></td>
        <td><?=$intern->current_status?></td>
        <td>
        <div class="btn-group">
           <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" data-name="button-view" data-id="<?= $intern->id; ?>">View</a>
                  <a href="<?= base_url('intern/edit/'.$intern->id) ?>" class="dropdown-item" data-id="<?= $intern->id;?>" >Edit</a>
              </div>
           </div> 


          <!-- <button type="button" class="btn btn-info" data-name="button-view" data-id="<?= $intern->id; ?>">View</button>
          <a href="<?= base_url('intern/edit/'.$intern->id) ?>" class="btn btn-warning" data-id="<?= $intern->id;?>" >Edit</a>
        </td> -->
      </tr>
      <?php endforeach; ?>
  <?php }?>
    </tbody>
  </table>
</div>


<!-- View Modal -->
<div id="viewmodal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Intern</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
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
