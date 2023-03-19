<?php

@include 'config.php';

session_start();

$pilot_id = $_SESSION['pilot_id'];

if(!isset($pilot_id)){
   header('location:login.php');
};

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $school=$_POST['school'];
    $user=$_POST['user'];
    $promotions=$_POST['promotions'];
    

    $sql="INSERT INTO `users`(id,username, email, pass, school, user,promotions) VALUES(NULL,'$username', '$email', '$pass','$school','$user','$promotions')";
    $results=mysqli_query($conn,$sql);
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css/admincss.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php @include 'pilot_header.php';?>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:blue">
        Gestion Students
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new student</h3>
            <p class="text-muted">here is the form</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw;min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label  class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>

                <div class="col">
                    <label  class="form-label">email:</label>
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>


                <div class="col">
                    <label  class="form-label">password:</label>
                    <input type="password" class="form-control" name="pass" placeholder="password">
                </div>
            </div>
         
            <div class="mb-3">
                    <label  class="form-label">school</label>
                    <input type="text" class="form-control" name="school" placeholder="school">
                </div>
                <div class="mb-3">
                    <label  class="form-label">user</label>
                    <input type="text" class="form-control" name="user" placeholder="student">
                </div>
                <div class="mb-3">
                    <label  class="form-label">promo</label>
                    <input type="text" class="form-control" name="promotions" placeholder="promo">
                </div>
              
         
          <div>
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="pilot_students.php" class="btn btn-danger">Cancel</a>
          </div>
        </form>
        </div>
    </div>




    <div class="container">
        <?php 
        if(isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <a href="pilot_students.php" class="btn btn-dark mb-3">Add New users |^|</a>
        <!-- <a href="filter_pilot_students.php" class="btn btn-dark mb-3">filter</a> -->



        <form action="filter_pilot_students.php" method="post">
        
          

        <input type="submit" name="search" value="Filter" class="btn btn-dark mb-2">






      
        <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">School</th>
      <th scope="col">User</th>
      <th scope="col">Promo</th>
     
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
  
  
  
  <?php
 $sql="SELECT * FROM `users` WHERE user='student'";
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_assoc($result)){
    ?>

      <tr>
      <th><?php echo $row['id']?></th>
      <td><?php echo $row['username']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['pass']?></td>
      <td><?php echo $row['school']?></td>
      <td><?php echo $row['user']?></td>
      <td><?php echo $row['promotions']?></td>
      
      <td>
        <a href="edit_pilot_students.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="delete_pilot_students.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
      </td>
    </tr>
  <?php
 }

?>
  
   <form>
  </tbody>
</table>
</form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>