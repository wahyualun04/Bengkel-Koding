<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="icon"  href="medicalife.png">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
  <title>Poliklinik</title>
</head>

<style>
  .header-background {
    padding-top: 250px;
    padding-bottom: 250px;
    color: black;
    background-image: url("https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }
</style>

<body>
<?php 
include ('navbar.php');
?>  
  <main role="main" class="container">
    <?php
      if (isset($_GET['page'])) {
      ?>
          <h2 class="text-center my-3"><?php echo ucwords($_GET['page']) ?></h2>
      <?php
          include($_GET['page'] . ".php");
      } else {?>
       
    </main>
      <!-- Header start -->
      <div class="container-fluid header-background text-center">
        <h5>Selamat Datang</h5>
        <h1 class="display-4 text-white">SISTEM INFORMASI POLIKNINIK</h1>
      </div>
      <!-- Header End -->

      <?php
      }
      ?>
      
</body>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>