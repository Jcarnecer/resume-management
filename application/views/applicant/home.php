<div class="container">

  <div class="input-group" style="float:right">
    <form method="POST" action="<?= base_url('applicant/insert_role');?>" >
      <input type="text" name="add_role" class="form-control">
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
    <h2><?php echo $role->addrole;?></h2>
        <div class="row">
           <div class="container">
             <?php if($role->addrole == 'Java Developer'){ ?>
            <a href="<?= base_url('applicant');?>" type="button" class="btn btn-default" id="btn">  APPLICANTS <br><?= $count_java ?> </a>
            <?php }else{ ?>
                  <a href="<?= base_url('applicant');?>" type="button" class="btn btn-default" id="btn">  APPLICANTS <br><?= $count_web ?> </a>
            <?php } ?>
            <a href="<?= base_url('applicant?application_status=2');?>" type="button" class="btn btn-default" id="btn">FOR INTERVIEW</a>
            <a href="<?= base_url('applicant?application_status=3');?>" type="button" class="btn btn-default" id="btn">SHORTLIST</a>
            <a href="<?= base_url('applicant?application_status=4');?>" type="button" class="btn btn-default" id="btn">REJECTED</a>
           </div>
         </div>
             <?php endforeach; ?>
    </div>
  </div>

  <div class="container" id="employee-div">
    <a href="<?= base_url('addEmployee')?>" id="addEmployee" type="button" class="btn btn-default">Add Employee</a>
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
