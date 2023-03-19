<?php

@include 'config.php';

session_start();

$pilot_id = $_SESSION['pilot_id'];

if(!isset($pilot_id)){
   header('location:login.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot side</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css/admincss.css">
</head>
<body>
    <?php @include 'pilot_header.php';?>

   
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
            $select_student = mysqli_query($conn, "SELECT * FROM `users` WHERE user= 'student'") or die('query failed');
            $number_of_student = mysqli_num_rows($select_student);
         ?>
         <h3><?php echo $number_of_student; ?></h3>
         <p>Number Students</p>
      </div>

     

      <div class="box">
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Total Accounts</p>
      </div>

     


    















    <!-- student part -->


      <div class="box">
         <?php
            $select_A1 = mysqli_query($conn, "SELECT * FROM `users` WHERE promotions = 'A1'") or die('query failed');
            $number_of_A1 = mysqli_num_rows($select_A1);
         ?>
         <h3><?php echo $number_of_A1; ?></h3>
         <p>Students A1</p>
      </div>



      <div class="box">
         <?php
            $select_A2 = mysqli_query($conn, "SELECT * FROM `users` WHERE promotions = 'A2'") or die('query failed');
            $number_of_A2 = mysqli_num_rows($select_A2);
         ?>
         <h3><?php echo $number_of_A2; ?></h3>
         <p>Students A2</p>
      </div>



      <div class="box">
         <?php
                $select_A3 = mysqli_query($conn, "SELECT * FROM `users` WHERE promotions = 'A3'") or die('query failed');
            $number_of_A3 = mysqli_num_rows($select_A3);
         ?>
         <h3><?php echo $number_of_A3; ?></h3>
         <p>Students A3</p>
      </div>


      <div class="box">
         <?php
         $select_A4 = mysqli_query($conn, "SELECT * FROM `users` WHERE promotions = 'A4'") or die('query failed');
            $number_of_A4 = mysqli_num_rows($select_A4);
         ?>
         <h3><?php echo $number_of_A4; ?></h3>
         <p>Students A4</p>
      </div>



      <div class="box">
         <?php
                $select_A5 = mysqli_query($conn, "SELECT * FROM `users` WHERE promotions = 'A5'") or die('query failed');
            $number_of_A5 = mysqli_num_rows($select_A5);
         ?>
         <h3><?php echo $number_of_A5; ?></h3>
         <p>Students A5</p>
      </div>

   </div>

</section>
  
</body>
<script src="jsweb/admin_script.js"></script>
</html>