<?php
include "init.php";
if (!isset($_SESSION['role'])){
    header("location: index.php");
}
if (isset($_POST['insert'])) {
    $equipment = $_POST['equipment'];
    $equip = strtolower($equipment);
    $quantity = $_POST['quantity'];
    $status = 'approved';
    $select = mysqli_query($con, "SELECT * FROM equipment WHERE name = '$equip'");
    if (mysqli_num_rows($select) < 1) {
        $insert = mysqli_query($con, "INSERT INTO `equipment` (`id`, `name`, `quantity`, `status`) VALUES (NULL, '$equip', $quantity, '$status')");
        if ($insert) {
            // echo "
            // <script>
            // alert('new equipment registered');
            // </script>
            // ";
            $delete = mysqli_query($con, "DELETE FROM request WHERE name = '$equip'");
            if ($delete) {
                echo "equipment registerd";
            }
        } else {
            //  echo "
            // <script>
            // alert('Error');
            // </script>
            // ";
            echo "Error in insert";
        }
    } else {
        $row = mysqli_fetch_assoc($select);
        $id = $row['id'];
        $dbqua = $row['quantity'];
        $newqua = $dbqua + $quantity;
        $update = mysqli_query($con, "UPDATE `equipment` SET `quantity` = $newqua  WHERE `equipment`.`id` = $id");
        if ($update) {
            $delete = mysqli_query($con, "DELETE FROM request WHERE name = '$equip'");
            if ($delete) {
                echo "equipment registerd";
            }
        } else {
            //  echo "
            // <script>
            // alert('Error');
            // <script/>
            // ";
            echo "Error";
        }
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


    <link rel="stylesheet" type="text/css" href="scss/bootstrap.min.css" />


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />

    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <link href="css/responsive.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="css/style.scss" rel="stylesheet" />
    <link href="scss/style.css" rel="stylesheet" />
  

<body>

    <div class="container">
        <nav class="navbar  navbar-expand-sm bg-light navbar-light w-100 p-3 ">
            <div class="container-fluid justify-content-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="logistic.php" class="nav-link active" aria-current="page">register Equipment</a></li>
                    <li class="nav-item"><a href="password.php?id=<?php echo $_SESSION['user_id']; ?>" class="nav-link">Change Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link link-danger">Logout</a></li>
                </ul>
            </div>

        </nav>
        <div class="container-fluid w-75 p-3">
            <div class="container w-100 p-3">
                <div class="row">
                    <div class="col-sm-9 col-md-6 col-lg-8 bg-secondary-color-rgb">
                        <p><h4>THIS IS THE SECTION OF LOGISTIC OFFICER</h4></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container p-t">
                <form action="" method="post">
                    <table>
                    <div class="mb-3">
                        <tr>
                            <td><label for="" class="form-label">Equipment</label></td>
                            <td><input type="text" name="equipment" id="" class="form-control"></td>
                        </tr>
                    </div>
                        <div class="mb-3">
                        <tr>
                            <td>
                                <LAbel class="form-label">Quantity</LAbel>
                            </td>
                            <td>
                                <input type="number" name="quantity" id="" class="form-control">
                            </td>
                        </tr>
                        </div>
                        <div class="mb-3">
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="insert" class="btn btn-primary">Register</button>
                            </td>
                        </tr>
                        </div>
                    </table>
                </form>
            </div>

            <div id="table">
                <div>
                    <p><i>these are equipment that have to be registered in system</i></p>
                </div>
            <?php
            $i = 1;
            $sel = mysqli_query($con, "SELECT * FROM request ");
            if (mysqli_num_rows($sel) > 0 ) {
            ?>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Equipment</th>
                        <th>Quantity</th>
                    </tr>
                
                <?php
                

                
                    while ($rows = mysqli_fetch_array($sel)) {
                ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows["name"] ?></td>
                            <td><?php echo $rows["quantity"] ?></td>

                        </tr>
                <?php
                    
                }

                ?>
                </table>
                <?php
                    
                } else {
                    echo "<p class='text-danger'>The is no Equipment to be registered</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>