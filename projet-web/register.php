<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_username = filter_var($_POST['username']);
   $username = mysqli_real_escape_string($conn, $filter_username);
   $filter_email = filter_var($_POST['email']);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass']);
   $pass = mysqli_real_escape_string($conn, $filter_pass);
   $filter_cpass = filter_var($_POST['cpass']);
   $cpass = mysqli_real_escape_string($conn, $filter_cpass);
   $filter_school = filter_var($_POST['school']);
   $school = mysqli_real_escape_string($conn,$filter_school);
   $filter_user = filter_var($_POST['user']);
   $user= mysqli_real_escape_string($conn, $filter_user);
   $filter_promotions = filter_var($_POST['promotions']);
   $promotions= mysqli_real_escape_string($conn, $filter_promotions);
   $filter_assigned_promo = filter_var($_POST['assigned_promo']);
   $assigned_promo= mysqli_real_escape_string($conn, $filter_assigned_promo);

   $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(username, email, pass, school, user, promotions, assigned_promo) VALUES('$username', '$email', '$pass','$school','$user','$promotions','$assigned_promo')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->

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
      <h3>register now</h3>
      <input type="text" name="username" class="box" placeholder="enter your username" required>
      <input type="email" name="email" class="box" placeholder="enter your email" required>
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
      <input type="text" name="school" class="box" placeholder="confirm your school" required>
      <input type="text" name="user" class="box" placeholder="pilot/student" required>
      <input type="text" name="promotions" class="box" placeholder="promotions" required>
      <input type="text" name="assigned_promo" class="box" placeholder="assigned_promo" required>
      <input type="submit" class="btn" name="submit" value="register now">

      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</section>

</body>
</html>