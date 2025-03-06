<?php

include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
$error = '';	
if (isset($_POST['update'])) {
  $OldPassword = mysqli_real_escape_string($con, $_POST['OPassword']);
  $NewPassword = mysqli_real_escape_string($con, $_POST['NPassword']);
  $ConPassword = mysqli_real_escape_string($con, $_POST['CPassword']);
  $id = $_SESSION['user_id'];
  if (!empty($OldPassword) || !empty($NewPassword) || !empty($ConPassword)) {
  	$select = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
  	$row = mysqli_fetch_assoc($select);
  	$dbPass = $row['password'];

  	if (password_verify($OldPassword, $dbPass)) {
  		if($NewPassword == $ConPassword){
  			$Npass = password_hash($NewPassword, PASSWORD_DEFAULT);
  			$update = mysqli_query($con, "UPDATE `users` SET `password` = '$Npass' WHERE `users`.`id` = $id");
  			if ($update) {
  				echo "<script>alert('Password changed')</script>";
  				session_destroy();
               header("location: index.php");
  			}

  		}else{
  			$error = "Two Password don't match";	
  		}
  		
  	}else{
  	$error = "Your Password not found! try again";	
  	}
  }else{
  	$error = "please fill the fields";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
   <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Inventory Management </title>

  
  <link rel="stylesheet" type="text/css" href="scss/bootstrap.min.css"/>

 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  
  <link href="css/font-awesome.min.css" rel="stylesheet" />
 
  <link href="css/responsive.css" rel="stylesheet" /> 
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="css/style.scss" rel="stylesheet" />
  <link href="scss/style.css" rel="stylesheet" />
</head>
<body>
    <div class="container ">
        <div class="container-fluid mx-auto  w-57" >
            <div class="row mx-auto">
            <div class="col-sm-3 col-md-6 mx-auto">
            <div class=".bg-secondary mx-auto">
            <p><h5>PAGE THAT ALLOWS USER TO MODIFY PASSWORD </h5> </p>
            </div>
	<div>
		<h3>
			<?php echo $error;?>
		</h3>
        </div>
	</div>
    </div>
    </div>
    <hr>
    <div class="container justify-content-center w-50 p-3">
    <div class="row justify-content-center ">
        <fieldset>
            <legend>Update password</legend>
            
<form action="" method="post">
        <table>
        <div class="mb-3 ">
            <tr>
                <td><label for="">Old Password</label></td>
                <td><input type="text" name="OPassword" id="" class="form-control"></td>
            </tr>
        </div><br><br>
            <div class="mb-3"> 
            <tr>
                <td>
                    <LAbel>New Password</LAbel>
                </td>
                <td>
                    <input type="text" name="NPassword" id="" class="form-control">
                </td>
            </tr>
            </div>
            <div class="mb-3 mt-3">
            <tr>
                <td><label for="">Confirm Password</label></td>
                <td><input type="text" name="CPassword" id="" class="form-control"></td>
            </tr>
            </div>
            <div class="mb-3 mt-3">
            <tr>
                <td> <button type="submit" name ="update" class="btn btn-success">Change</button></td>
                <td>
                
                <button type="submit" name ="update" class="btn btn-Secondary"><a href="back.php" class="nav-link">Back</a></button>
                </td>
            </tr>
            </div>
        </table>
    </form>
    </fieldset>
    </div>
    </div>
</body>
</html>