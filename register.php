<?php
include "init.php";
$sms = "";
if (isset($_POST['send'])) {

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$role = mysqli_real_escape_string($con, $_POST['role']);

	if (!empty($username) && !empty($password) && !empty($cpassword) && !empty($role)) {

		if ($password == $cpassword) {
			$hashpassword = password_hash($password, PASSWORD_DEFAULT);
			$insert = mysqli_query($con, "INSERT INTO users (id,username,password,role) VALUES (NULL, '$username', '$hashpassword','$role')");
			if ($insert) {

				echo " Record inserted...";
			} else {
				$sms = "Not inserted";
			}
		} else {
			$sms = "Two passowrd don't match";
		}
	} else {
		$sms = "Fields must not be empty";
	}
}


?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link rel="shortcut icon" href="images/favicon.png" type="">

	<title> Inventory Management </title>

	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  
  <link href="css/font-awesome.min.css" rel="stylesheet" />-->


	<!-- <link href="css/style.css" rel="stylesheet" />  -->

	<!-- <link href="css/responsive.css" rel="stylesheet" />  -->
	<link href="scss/style.css" rel="stylesheet" />

</head>

<body>
	<div class="container-sm">
		<div class="head">
			<h2>REGISTER NOW</h2>
			<p>

				<?php
				echo $sms;

				?>
			</p>
		</div>


		<form method="POST">
			<div class="input-group">
				<input type="text" name="username" class="form-control" placeholder="Enter your username">
			</div>

			<div class="input-group">
				<input type="text" name="password" class="form-control" placeholder="Enter new your Password">
			</div>

			<div class="input-group">
				<input type="text" name="cpassword" class="form-control" placeholder="Confirm your Password">
			</div>
			<div class="input-group">

				<select name="role" class="form-select" aria-label="Default select example">
					<option selected>Select a User</option>
					<option value="coordinator">Coordinator</option>
					<option value="logistic">Logistic</option>
					<option value="Hod">Hod</option>
				</select>
			</div>

			<div class="input-group">
				<button type="submit" name="send" value="REGISTER" class="btn btn-primary">Register now</button>
			</div>

			<div class="input-group">
				<p>already have an account? <a href="index.php">Login now</a></p>
			</div>



		</form>
	</div>
</body>

</html>