
 <body>
  <div class="container">

    <h1>Employees</h1>

      <table class="table table-inverse">
       <tr>
         <td><strong>Name</strong></td>
         <td><strong>Home Address</strong></td>
         <td><strong>Email Address</strong>
         <td><strong>Position</strong>
         <td><strong>Date Hired</strong>
       </tr>
       <?php foreach($employee as $employees){?>
       <tr>
         <td><?= $employees->first_name;?> <?= $employees->middle_name;?> <?= $employees->last_name;?></td>
         <td><?= $employees->home_address;?></td>
         <td><?= $employees->email_address;?></td>
         <td><?= $employees->position;?></td>
         <td><?= $employees->date_hired;?></td>

       <?php }?>
      </table>

   </div>
  </div>
 </body>
