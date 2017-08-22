<div class="container">

  <div class="input-group" style="float:right">
    <form method="POST" action="<?= base_url('applicant/insert_role');?>" >
      <input type="text" name="name" class="form-control">
      <span class="input-group-btn" style="width:0;">
        <input class="btn btn-default" type="submit" value="Add Role">
      </span>
    </form>
  </div>
</div>


<div class="container">
  <button id="applicant" type="button" class="btn btn-default">Applicants <br><?= $count;?></button>
  <button id="employee" type="button" class="btn btn-default">Employees <br><?= $countemployee;?></button>


  <div class="container" id="applicant-div">
    <?php foreach ($role as $role) :?>
    <h2><?php echo $role->name;?></h2>
        <div class="row">
           <div class="container">
            <a href="<?= base_url('applicant?status=1&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">APPLICANTS <br><?= $this->applicant->count($role->id,1); ?> </a>
            <a href="<?= base_url('applicant?status=2&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">FOR INTERVIEW <br><?= $this->applicant->count($role->id,2); ?></a>
            <a href="<?= base_url('applicant?status=3&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">SHORTLIST <br><?= $this->applicant->count($role->id,3); ?></a>
            <a href="<?= base_url('applicant?status=4&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">REJECTED <br><?= $this->applicant->count($role->id,4); ?></a>
           </div>
         </div>
             <?php endforeach;?>
    </div>
  </div>

  <div class="container" id="employee-div">

    <div class="row">
       <div class="container">
        <a href="<?= base_url('view_employee?status=0');?>" type="button" class="btn btn-default" id="btn">Former <br><?= $countempformer;?></a>
        <a href="<?= base_url('view_employee?status=1');?>" type="button" class="btn btn-default" id="btn">Current <br><?= $countempcurrent;?></a>
        <a href="<?= base_url('addEmployee')?>" id="addEmployee" type="button" class="btn btn-default">Add Employee</a><br>
      </div>
  </div>
</div>




 <script>
 $(document).ready(function(){
     $("#applicant").click(function(){
         $("#applicant-div").show();
         $("#employee-div").hide();
     });
     $("#employee").click(function(){
         $("#employee-div").show();
         $("#applicant-div").hide();
     });
 });
 </script>
