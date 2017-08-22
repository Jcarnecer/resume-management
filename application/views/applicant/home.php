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
  <button id="employee" type="button" class="btn btn-default">Employees</button>


  <div class="container" id="applicant-div">
    <?php foreach ($role as $role) : ?>
    <h2><?php echo $role->name;?></h2>
        <div class="row">
           <div class="container">

            <a href="<?= base_url('applicant?status=1&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn"> APPLICANTS <br><?= $this->applicant->count($role->id); ?> </a>
            <a href="<?= base_url('applicant?status=2&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">FOR INTERVIEW</a>
            <a href="<?= base_url('applicant?status=3&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">SHORTLIST</a>
            <a href="<?= base_url('applicant?status=4&role=' . $role->id); ?>" type="button" class="btn btn-default" id="btn">REJECTED</a>
           </div>
         </div>
             <?php endforeach; ?>
    </div>
  </div>

  <div class="container" id="employee-div">


    <div class="row">
       <div class="container">

        <a href="<?= base_url('view_employee');?>" type="button" class="btn btn-default" id="btn">Former</a>
        <a href="<?= base_url('view_employee');?>" type="button" class="btn btn-default" id="btn">Current</a>

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
