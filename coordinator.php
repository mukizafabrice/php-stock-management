<?php
include"init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
	$id = 1;
    $select = mysqli_query($con, "SELECT * FROM equipment WHERE status = 'approved'");
    $num_per_page = 05;
    if (isset($_GET['page'])) {
        $page =  $_GET['page'];
    }else{
        $page = 1;
    }
    $start_from = ($page-1)*05;
    $select = mysqli_query($con, "SELECT * FROM equipment   WHERE status = 'approved' LIMIT $start_from,$num_per_page ");
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
    <div class="container">
    <nav class="navbar  navbar-expand-sm bg-light navbar-light w-100 p-3 ">
    <div class="container-fluid justify-content-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="coordinator.php" class="nav-link active" aria-current="page">View Equipment</a></li>
            <li class="nav-item"><a href="request.php" class="nav-link">Request Equipment</a></li>
            <li class="nav-item"><a href="password.php?id=<?php echo $_SESSION['user_id'];?>" class="nav-link">Change Password</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link link-danger">Logout</a></li>
        </ul>
    </div>

    </nav>
    <div class="container-fluid w-75 p-3">
    <div class="container w-100 p-3">
    <div class="row">
    <div class="col-md-9 col-md-6 col-lg-8 bg-secondary-color-rgb">
      <p class="justify-content-center"><h4>SECTION FOR THE COORDINATOR</h4> </p>
      </div>
    </div>
    </div>
    <hr></hr>


    
    <a href=""></a>
    <div class="container bg-secondary-color-rgb">
        <table class="table">
        	<tr>
        		<th>Id</th>
        		<th>Equipment</th>
        		<th>Quantity</th>
                <th>Action</th>
        	</tr>
         <?php
         while ($row = mysqli_fetch_array($select)) {
         	?>
         	<tr>
         		<td><?php echo $row['id'];?></td>
         		<td><?php echo $row['name'];?></td>
         		<td><?php echo $row['quantity'];?></td>
                <td>
                    <button class="btn btn-danger"><a href=" del.php?id=<?php echo $row['id'];?>" class="nav-link">Delete</a></button>
                </td>
         	</tr>
         	<?php
         }
         ?>
            
        </table>

    <?php
    $sql = mysqli_query($con, "SELECT * FROM equipment WHERE status = 'approved'");
    $total_record = mysqli_num_rows($sql);
    $total_page = ceil(($total_record/$num_per_page)); 
     for($i = 1; $i <= $total_page; $i++){
        echo "<button class ='btn btn-sm btn-primary'><a href='coordinator.php?page=".$i."' class='nav-link'>".$i."</a>";
     }
    ?>
    </div>
    </div>
    </div>
</body>
</html>