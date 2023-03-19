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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css/admincss.css">
</head>
<body>
<header class="header">
    <div class="flex">
        <a href="admin_page.php" class="logo">Admin<span>Side</span></a>
      <nav class="navbar">
        <a href="admin_page.php">Home</a>
        <a href="admin_internships.php">Internships</a>
        <a href="admin_companies.php">Companies</a>
        <a href="admin_users.php">Users</a>
        <a href="admin_candidatures.php">Candidatures</a>
        <a href="admin_messages.php">Messages</a>

      </nav>
      <div class="icons">
      <div id="menu-btn" class="fas fa-bars"></div>
      <div id="user-btn" class="fas fa-user"></div>
      <div class="account-box">
        <p>username:<span><?php echo $_SESSION['admin_username'];?></span></p>
        <p>email:<span><?php echo $_SESSION['admin_email'];?></span></p>
        <a href="logout.php" class="delete-btn">Logout</a><br>
        <div>new <a href="login.php">login</a> | <a href="register.php">register</a> </div>
      </div>
      </div>

    </div>
</header>
</body>
</html>
