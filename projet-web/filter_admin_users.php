<?php
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `username`, `email`, `pass`,`user`,`school`,`promotions`,`assigned_promo`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "projet-web");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
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

    <nav>
        <h1>Gestion Users</h1>
    </nav>
    
        
            <div class="middle">
            <h3 style="margin-top:4rem;">Filter Users</h3>
      
      
    
    
    <?php @include 'admin_header.php';?>
    
        <form action="filter_admin_users.php" method="post">
        
          
            <input type="text" name="valueToSearch"  placeholder="Value To Search" style="padding:1rem 1.2rem"><br>
            <input type="submit" name="search" value="Filter" class="btn btn-dark mb-3">
            <a href="admin_users.php" class="btn btn-dark mb-3">Go Back</a>


            <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">school</th>
      <th scope="col">password</th>
      <th scope="col">user</th>
      <th scope="col">promotion</th>
      <th scope="col">assigned_promo</th>
    </tr>
  </thead>
  <tbody>
    


      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['school'];?></td>
                    <td><?php echo $row['pass'];?></td>
                    <td><?php echo $row['user'];?></td>
                    <td><?php echo $row['promotions'];?></td>
                    <td><?php echo $row['assigned_promo'];?></td>
                </tr>
                <?php endwhile;?>
             
  </tbody>
</table>
            
        </form>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>