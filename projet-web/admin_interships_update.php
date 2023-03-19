<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_internship'])){

   $update_p_id = $_POST['update_p_id'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $remuneration = mysqli_real_escape_string($conn, $_POST['remuneration']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
 
   $places_intern = mysqli_real_escape_string($conn, $_POST['places_intern']);
   $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
  
   $competences = mysqli_real_escape_string($conn, $_POST['competences']);
   $company_name = mysqli_real_escape_string($conn, $_POST['c_name']);
   $period_internship = mysqli_real_escape_string($conn, $_POST['period_internship']);
   $date_intern = mysqli_real_escape_string($conn, $_POST['date_intern']);

   mysqli_query($conn, "UPDATE `internships` SET name = '$name', details = '$details', remuneration = '$remuneration', date_intern='$date_intern',c_name='$c_name',period_intership='$period_internship',places_inter='$places_intern',localisation='$localisation',competences='$competences' WHERE id = '$update_p_id'") or die('query failed');

  

   $message[] = 'internship updated successfully!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update internship</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="styles.css/admincss.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="update-internship">

<?php

   $update_id = $_GET['update'];
   $select_internships = mysqli_query($conn, "SELECT * FROM `internships` WHERE id = '$update_id'") or die('query failed');
   if(mysqli_num_rows($select_internships) > 0){
      while($fetch_internships = mysqli_fetch_assoc($select_internships)){
?>

<form action="" method="post" enctype="multipart/form-data">
   
   <input type="hidden" value="<?php echo $fetch_internships['id']; ?>" name="update_p_id">
   
   <input type="text" class="box" value="<?php echo $fetch_internships['name']; ?>" required placeholder="update internship name" name="name">
   <input type="number" min="0" class="box" value="<?php echo $fetch_internships['remuneration']; ?>" required placeholder="update internship remuneration" name="remuneration">
   <input type="number" min="0" class="box" value="<?php echo $fetch_internships['places_intern']; ?>" required placeholder="update internship places_intern" name="places_intern">
   <textarea name="details" class="box" required placeholder="update internship details" cols="30" rows="10"><?php echo $fetch_internships['details']; ?></textarea>
   <input type="text" class="box" value="<?php echo $fetch_internships['localisation']; ?>" required placeholder="update internship localisation" name="localisation">
   <input type="text" class="box" value="<?php echo $fetch_internships['competences']; ?>" required placeholder="update internship competences" name="competences">
   <input type="text" class="box" value="<?php echo $fetch_internships['c_name']; ?>" required placeholder="update internship company name" name="c_name">
   <input type="text" class="box" value="<?php echo $fetch_internships['period_internship']; ?>" required placeholder="update internship period" name="period_internship">
  
   <input type="date" id="start" name="date_intern" value="<?php echo $fetch_internships['date_intern']; ?>" min="2023-02-12" max="2023-04-21" name="date_intern">

      
         <div class="date_intern">Date put on website:<?php echo $fetch_internship['date_intern']; ?></div>
  

         

     


   <input type="submit" value="update internship" name="update_internship" class="btn">
   <a href="admin_internships.php" class="option-btn">go back</a>
</form>

<?php
      }
   }else{
      echo '<p class="empty">no update internship select</p>';
   }
?>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>