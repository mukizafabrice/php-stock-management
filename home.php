<?php
include"init.php";
// if (isset($_SESSION['role'])) {
//     $username = $_SESSION['username'];
//     $role= $_SESSION['role'];
//     $id = $_SESSION['user_id'];
if(($_SESSION["role"]) == 'coordinator'){ 
    header("Location: coordinator.php");
}else if(($_SESSION["role"]) == 'hod'){ 
    header("Location: hod.php");
}else if(($_SESSION["role"]) == 'logistic'){
    header("Location: logistic.php");
}
else{
    header("Location: index.php");
}

// }
?>
 