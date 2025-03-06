<?php
include "init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
if (isset($_POST['request'])) {
    $equipment = $_POST['equipment'];
    $equip = strtolower($equipment);
    $quantity = $_POST['quantity'];
    $query = mysqli_query($con, "INSERT INTO `request` (`id`, `name`, `quantity`, `status`) VALUES (NULL, '$equip', $quantity, 'false')");
    if ($query) {
        echo "Equipment requested";
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
    <link href="css/style.css" rel="stylesheet" />
    <link href="scss/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <nav class="navbar  navbar-expand-sm bg-light navbar-light navbar-light w-100 p-3">
            <div class="container-fluid justify-content-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item"><a href="coordinator.php" class="nav-link ">View Equipment</a></li>
                    <li class="nav-item"><a href="request.php" class="nav-link active" aria-current="page">Request Equipment</a></li>
                    <li class="nav-item"><a href="password.php?id=<?php echo $_SESSION['user_id']; ?>" class="nav-link">Change Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link link-danger">Logout</a></li>
                </ul>
            </div>

        </nav>
        <div class="container-fluid w-75 p-2 ">
            <div class="container w-100 p-3">
                <div class="row">
                    <div class="col-sm-9 col-md-6 col-lg-8 bs-secondary-color-rgb">
                        <p> HERE YOU CAN REQUEST NEW EQUIPMENT AS COORDINATOR</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <form action="" method="post">
                    <table>
                        <div class="mb-3 mt-3">
                            <tr>
                                <td><label for="" class="form-label">Equipment</label></td>
                                <td><input type="text" name="equipment" id="" class="form-control"></td>
                            </tr>
                        </div>
                        <div class="mb-3 mt-3">
                            <tr>
                                <td>
                                    <LAbel class="form-label">Quantity</LAbel>
                                </td>
                                <td>
                                    <input type="number" name="quantity" id="" class="form-control">
                                </td>
                            </tr>
                        </div>
                        <div class="mb-3 mt-3">
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" name="request" class="btn btn-primary">Register</button>
                                </td>
                            </tr>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>