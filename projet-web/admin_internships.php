<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_internship'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $remuneration = mysqli_real_escape_string($conn, $_POST['remuneration']);
   $places_intern = mysqli_real_escape_string($conn, $_POST['places_intern']);
   $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $competences = mysqli_real_escape_string($conn, $_POST['competences']);
   $company_name = mysqli_real_escape_string($conn, $_POST['c_name']);
   $period_internship = mysqli_real_escape_string($conn, $_POST['period_internship']);
   $date_intern = mysqli_real_escape_string($conn, $_POST['date_intern']);

   $select_internship_name = mysqli_query($conn, "SELECT name FROM `internship` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_internship_name) > 0){
      $message[] = 'internship already exist!';
   }else{
      $insert_internship = mysqli_query($conn, "INSERT INTO `internship`(name, details, remuneration, places_intern,period_internship,date_intern) VALUES('$name', '$details', '$remuneration', '$places_intern','$period_internship','$date_intern')") or die('query failed');
      if($insert_internship){
           $message[] = 'offer added successfully!';

     }
   }




}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_intern = mysqli_query($conn, "SELECT image FROM `internship` WHERE id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `internship` WHERE id = '$delete_id'") or die('query failed');
   // mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `competences` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_internships.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>internship</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="style.css/admincss.css">

</head>
<body>
   
<?php @include 'admin_header.php';?>

<section class="add-internship">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>add new offer</h3>
      <input type="text" class="box" required placeholder="enter offer name" name="name">
      <input type="text" class="box" required placeholder="enter localisation" name="localisation">
      <input type="text" class="box" required placeholder="company name" name="c_name">
      <input type="text" class="box" required placeholder="period offer" name="period_internship">
      <input type="text" class="box" required placeholder="competences" name="competences">
      <input type="number" min="0" class="box" required placeholder="enter remuneration" name="remuneration">
      <input type="number" min="0" class="box" required placeholder="enter num places interns" name="places_intern">
      <textarea name="details" class="box" required placeholder="enter job details" cols="10" rows="10"></textarea>
      <input type="date" id="start" name="date_intern" value="2023-02-22" min="2023-02-12" max="2023-04-21">
      <input type="submit" value="add offer" name="add_internship" class="btn">
     
</form>

</section>

<section class="show-internship">

   <div class="box-container">

      <?php
         $select_internship = mysqli_query($conn, "SELECT * FROM `internship`") or die('query failed');
         if(mysqli_num_rows($select_internship) > 0){
            while($fetch_internship = mysqli_fetch_assoc($select_internship)){
      ?>
      <div class="box">
         
         <div class="name">Stage:<b><?php echo $fetch_internship['name']; ?></b></div>
         <div class="places_intern">Number inters:<?php echo $fetch_internship['places_intern']; ?></div>
         <div class="date_intern">Date put on website:<?php echo $fetch_internship['date_intern']; ?></div>
          <div class="remuneration">Remuneration:<?php echo $fetch_internship['remuneration']; ?></div>
         <div class="c_name">Company name:<?php echo $fetch_internship['c_name']; ?></div>
         <div class="localisation">Localisation:<?php echo $fetch_internship['localisation']; ?></div>
         <div class="competences">Competences:<?php echo $fetch_internship['competences']; ?></div>
         <div class="period_internship">Period offer(days):<?php echo $fetch_internship['period_internship']; ?></div>
         <div class="details">Description:<?php echo $fetch_internship['details']; ?></div>
  

          <a href="admin_interships_update.php?<?php echo $fetch_internship['id']; ?>" class="option-btn">update</a>
         <a href="admin_internship.php?delete=<?php echo $fetch_internship['id']; ?>" class="delete-btn" onclick="return confirm('delete this offer?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no internship added yet!</p>';
      }
      ?> 



   </div> 
   

</section>












<script src="js/admin_script.js"></script>

</body>
</html>