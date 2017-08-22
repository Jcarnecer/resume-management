<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

 <head>
  <title>Display employee details</title>
 </head>
 <body>
  <div class="row">
   <div style="width:500px;margin:50px;">
    <h1>Employees</h1>
    <table class="table table-inverse">
     <tr>
       <td><strong>First Name</strong></td>
       <td><strong>Last Name</strong></td>
     </tr>
     <?php foreach($employee as $employees){?>
     <tr>
       <td><?= $employees->first_name;?></td>
       <td><?= $employees->last_name;?></td>
     </tr>
     <?php }?>
    </table>
   </div>
  </div>
 </body>
