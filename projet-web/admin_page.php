<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin side</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css/admincss.css">
</head>
<body>
    <?php @include 'admin_header.php';?>

   
    <section class="dashboard">
    <h1 class="title">Statistics</h1>
   <div class="box-container">
   
      <div class="box">
        <?php
         $select_companies = mysqli_query($conn, "SELECT * FROM `companies`") or die('query failed');
         $number_companies = mysqli_num_rows($select_companies);
      ?>
      <h3><?php echo $number_companies; ?></h3>
      <p>Number  Companies</p>
   </div>

   <div class="box">
         <?php
            $select_internship = mysqli_query($conn, "SELECT * FROM `internship`") or die('query failed');
            $number_of_internship = mysqli_num_rows($select_internship);
         ?>
         <h3><?php echo $number_of_internship; ?></h3>
         <p>Number internships</p>
      </div>

     

      <div class="box">
         <?php
            $select_pilot = mysqli_query($conn, "SELECT * FROM `users` WHERE user= 'pilot'") or die('query failed');
            $number_of_pilot = mysqli_num_rows($select_pilot);
         ?>
         <h3><?php echo $number_of_pilot; ?></h3>
         <p>Number Pilots</p>
      </div>

      <div class="box">
         <?php
            $select_student = mysqli_query($conn, "SELECT * FROM `users` WHERE user= 'student'") or die('query failed');
            $number_of_student = mysqli_num_rows($select_student);
         ?>
         <h3><?php echo $number_of_student; ?></h3>
         <p>Number Students</p>
      </div>

      <div class="box">
         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user = 'admin'") or die('query failed');
            $number_of_admin = mysqli_num_rows($select_admin);
         ?>
         <h3><?php echo $number_of_admin; ?></h3>
         <p>Admin Users</p>
      </div>

      <div class="box">
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Total Accounts</p>
      </div>

      <div class="box">
         <?php
            $select_candidatures = mysqli_query($conn, "SELECT * FROM `candidatures`") or die('query failed');
            $number_of_candidatures = mysqli_num_rows($select_candidatures);
         ?>
         <h3><?php echo $number_of_candidatures; ?></h3>
         <p>Num Candidatures</p>
      </div>

   </div>

</section>
  
</body>
<script src="jsweb/admin_script.js"></script>
</html>