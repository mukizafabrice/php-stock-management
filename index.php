<?php
include"init.php";
$sms = '';
if (isset($_POST['login'])) {
	$username=mysqli_real_escape_string($con, $_POST['username']);
	$password=mysqli_real_escape_string($con, $_POST['password']);
	$role=mysqli_real_escape_string($con, $_POST['role']);
	$select=mysqli_query($con, "SELECT * FROM users where username='$username'and role='$role'");
	if (mysqli_num_rows($select) > 0) {
		$row=mysqli_fetch_assoc($select);
		$dbpass=$row['password'];
		$id = $row['id'];
		// $hp=password_hash($password, PASSWORD_BCRYPT);
		if (password_verify($password, $dbpass)) {
			$_SESSION['is-logged']= true;
			$_SESSION['role']=$role;
			$_SESSION['username']=$username;
			$_SESSION['user_id']=$id;
			header("location:home.php");
		}
		else
		{
			$sms =  "incorrect password!!!";
		}

}
else
{
	$sms = "user not found...";
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
  <!-- <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Inventory Management </title>

  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  
  
 
  <link href="css/responsive.css" rel="stylesheet" /> -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="scss/style.css" rel="stylesheet" />
</head>
<body>
<div class="container-sm">
		<div class="head">
			<h2>LOGIN NOW</h2>
			<p>
				
		<?php
 echo $sms;

	?>
	</p>
		</div>
<form method="POST">
<div class="input-group">
		<input type="text" name="username" class="form-control" placeholder="Enter username">
		</div>

		<div class="input-group">
		<input type="text" name="password" class="form-control" placeholder="Enter Password">
		</div>

	    <div class="input-group">
		<select name="role" class="form-select" aria-label="Default select example">
		<option selected>Select a User</option>
			<option value="coordinator">Coordinator</option>
			<option value="logistic">Logistic</option>
			<option value="hod">Hod</option>
		</select>
		</div>

		<div class="input-group">
	<button type="submit" name="login" class="btn btn-primary">Login now</button>
</div>

	<div class="input-group">
		<p>don't have an account? <a href="register.php">register now</a></p>
	</div>

</form>
</div>
</body>
</html>