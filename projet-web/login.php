<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, $filter_pass);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND pass = '$pass'") or die('query failed');


   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);

      if($row['user'] == 'admin'){

         $_SESSION['admin_username'] = $row['username'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         $_SESSION['admin_school'] = $row['school'];
         header('location:admin_page.php');

      }elseif($row['user']== 'student'){
            $_SESSION['student_username'] = $row['username'];
            $_SESSION['student_email'] = $row['email'];
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_school'] = $row['school'];
            header('location:home.php');
         }elseif($row['user']== 'pilot'){
            $_SESSION['pilot_username'] = $row['username'];
            $_SESSION['pilot_email'] = $row['email'];
            $_SESSION['pilot_id'] = $row['id'];
            $_SESSION['pilot_school'] = $row['school'];
            header('location:pilot_page.php');
         }
      else{
        $message[]='user not found';
      }}

   else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" class="box" placeholder="enter your email" required>
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="submit" class="btn" name="submit" value="login now">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</section>

</body>
</html>