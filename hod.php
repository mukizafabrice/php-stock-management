<?php
include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
	$id = 1;
    $select = mysqli_query($con, "SELECT * FROM request WHERE status = 'false'");
      
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

  
  <link rel="stylesheet" type="text/css" href="scss/bootstrap.min.css" />

 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  
  <link href="css/font-awesome.min.css" rel="stylesheet" />
 
  <link href="css/responsive.css" rel="stylesheet" /> 
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="css/style.scss" rel="stylesheet" />
  <link href="scss/style.css" rel="stylesheet" />
</head>
<body>
<div class="container">
<nav class="navbar  navbar-expand-sm bg-light navbar-light w-100 p-3 ">
    <div class="container-fluid justify-content-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="hod.php" class="nav-link active" aria-current="page">View Request</a></li>
            <li class="nav-item"><a href="password.php?id=<?php echo $_SESSION['user_id'];?>" class="nav-link">Change Password</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link link-danger">Logout</a></li>
        </ul>
    </div>

    </nav>
    <div class="container-fluid w-50 p-3">
    <div class="container w-100 p-3">
    <div class="row">
    <div class="col-sm-9 col-md-6 col-lg-8 bg-secondary-color-rgb">
      <p><h4>THIS IS THE SECTION OF HOD</h4></p>
      </div>
    </div>
    </div>
    <hr>
        <div class="container">
        <?php
         if(mysqli_num_rows($select) > 0){
            ?>
        <table class="table">
        	<tr>
        		<th>Id</th>
        		<th>Equipment</th>
        		<th>Quantity</th>
        		<th colspan="2">Action</th>
        	</tr>
         <?php
         if(mysqli_num_rows($select) > 0){
         while ($row = mysqli_fetch_array($select)) {
         	$dbid = $row['id'];
         	?>
         	<tr>
         		<td><?php echo $id++;?></td>
         		<td><?php echo $row['name'];?></td>
         		<td><?php echo $row['quantity'];?></td>
         		<td>
         		<button class="btn btn-success"><a href="approve.php?id=<?php echo $dbid?>" class="nav-link">Approve</a></button>
         		<button class="btn btn-danger"><a href="delete.php?id=<?php echo $dbid?>" class="nav-link">Remove</a></button>	
         		</td>
         	</tr>
         	<?php
         }
         }
         ?>
            
        </table>
        <?php
        }else{
            echo "<p class='text-denger'>There is no request to be approved</p>";
        }
            ?>
        </div>
    </>
</div>
   
    
</body>
</html>