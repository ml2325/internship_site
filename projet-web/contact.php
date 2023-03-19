<?php 
$connection=mysqli_connect('localhost','root');
mysqli_select_db($connection,"projet-web");


$email=$_POST['email'];
$username=$_POST['username'];
$message=$_POST['message'];

$query="INSERT INTO `contact`(`username`,`email`,`message`) VALUES ('$username','$email','$message')";

mysqli_query($connection,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css/contact.css">
</head>
<body>
<div class="container">
  <h1>Contact us</h1>
  <img src="images/Big Shoes - Hero (1).png" alt="" width="550px">
  <form action="" method="post">
    <label for="fname">username</label>
    <input type="text" id="fname" name="username" placeholder="username">
    <label for="emailAddress">Email</label>
    <input id="emailAddress" type="email" name="email" placeholder="your email">
    <label for="subject">Message</label>
    <textarea id="subject" name="message" placeholder=" message" style="height:200px"></textarea>

    <input type="submit" value="submit">
  </form>
</div>

    <?php @include 'footer.php'; ?>
</body>
</html>



