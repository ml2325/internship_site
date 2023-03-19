<?php

@include 'config.php';
$id=$_GET['id'];
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
   
    $sql="UPDATE `users` SET `username`='$username',`email`='$email',`pass`='$pass',`school`='$school',`user`='$user',`promotions`='$promotions' WHERE id=$id";
    $results=mysqli_query($conn,$sql);
    if($result){
        header("localisation:admin_users.php?msg=Data updated ");
    }else{
        echo "failed:" . mysqli_error($conn);
    }
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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" >
        Gestion Students
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit informations</h3>
            <p class="text-muted">Click update</p>
        </div>
        <?php
      
        $sql="SELECT * FROM `users` WHERE id=$id ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw;min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label  class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']?>">
                </div>

                <div class="col">
                    <label  class="form-label">email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']?>">
                </div>


                <div class="col">
                    <label  class="form-label">password:</label>
                    <input type="password" class="form-control" name="pass" value="<?php echo $row['pass']?>">
                </div>
            </div>
         
            <div class="mb-3">
                    <label  class="form-label">school</label>
                    <input type="text" class="form-control" name="school" value="<?php echo $row['school']?>">
                </div>
                <div class="mb-3">
                    <label  class="form-label">user</label>
                    <input type="text" class="form-control" name="user" value="<?php echo $row['user']?>">
                </div>
                <div class="mb-3">
                    <label  class="form-label">promo</label>
                    <input type="text" class="form-control" name="promotions" value="<?php echo $row['promotions']?>">
                </div>
                
         
          <div>
            <button type="submit" class="btn btn-success" name="submit">update</button>
            <a href="pilot_students.php" class="btn btn-danger">Cancel</a>
          </div>
        </form>
        </div>
    </div>

    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>