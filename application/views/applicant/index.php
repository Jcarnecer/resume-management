<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>" />
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <script type="text/javascript">
  		var base_url = window.location.origin+"/resume-management/";
  	</script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</head>
<body>

  <?php include 'application\views\applicant\home.php';?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
