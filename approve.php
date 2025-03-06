<?php
include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
if (isset($_GET['id'])) {

	$id = $_GET['id'];
}
// $select = mysqli_query($con, "SELECT * FROM request WHERE id = $id");
// $row = mysqli_fetch_assoc($select);
$update = mysqli_query($con, "UPDATE `request` SET `status` = 'true' WHERE `request`.`id` = $id");
if ($update) {
	echo header("location: hod.php");
}

?>