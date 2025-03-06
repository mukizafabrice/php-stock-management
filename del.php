<?php
include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
if(isset($_GET['id'])){
    $id =  $_GET['id']; 
}
$query = mysqli_query($con, "DELETE FROM equipment WHERE id = '$id'");

if($query){
    echo "
    <script>
    confirm('are you sure you want to delete?');
    window.location.href ='coordinator.php';
    </script>
     ";
}
?>