<?php
include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
if (isset($_GET['id'])) {

	$id = $_GET['id'];
}


$delete = mysqli_query($con, " DELETE FROM request WHERE id = $id");
if ($delete) {
	header("location: hod.php");
}

?>