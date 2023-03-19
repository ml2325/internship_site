<?php 
@include 'config.php';
$id=$_GET['id'];
$sql="DELETE FROM `users` WHERE id=$id";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location:pilot_students.php?msg=Record deleted successfully");
}else{
    echo "failed:" . mysqli_error($conn);
}
?>