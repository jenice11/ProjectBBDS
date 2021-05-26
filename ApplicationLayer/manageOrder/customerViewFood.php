<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';

    session_start();
    
    $service = new manageOrderController();
    $data = $service->viewFood();

    if(isset($_POST['addtocart'])){
        $service->addCart();
    }
?>
<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "sdw";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM product";
if( isset($_G['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT servicetype,itemname,itemprice FROM product WHERE itemname ='%search%'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Search form using mysqli</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<label>Search</label>
<form action="" method="">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>List of students</h2>
<table class="table table-striped table-responsive">
<tr>
<th>Service Type</th>
<th>Item name</th>
<th>Item Price</th>

</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['servicetype']; ?></td>
    <td><?php echo $row['itemname']; ?></td>
    <td><?php echo $row['itemprice']; ?></td>
   
    </tr>
    <?php
}
?>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['servicetype']; ?></td>
    <td><?php echo $row['itemname']; ?></td>
    <td><?php echo $row['itemprice']; ?></td>
   
    </tr>
    <?php
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer View Food</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotocart {
                position: fixed;
                right: 25px;
                bottom: 15px;
                background-color: red;
                border-radius: 50%;
            }

            input {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Customer View Food Service</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="1">
                    <tr>
                        <td><center><b>Item Image</b></center></td>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="100"><center><b>Quantity</b></center></td>
                        <td width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                        <td><img src="<?=$row['itemimage']?>" width="150px" height="150px" style="margin-top: 4px; margin-left: 4px; margin-bottom: 4px; margin-right: 4px;"></td>
                        <td><input type="text" name="itemname" value="<?=$row['itemname']?>" class="noborder"></td>
                        <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="noborder"></td>
                        <td><input type="number" name="itemquantity" value="1" style="width: 3em;"></td>
                        <td style="text-align: center;">
                            <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                            &nbsp;<button type="submit" name="addtocart" onclick="return confirm('Confirm add to cart?');"><img src="Image/addtocarticon.png" alt="addtocarticon" width="40px" height="40px"></button>
                        </td>
                    </form>
                    <?php } ?>
                    </tr>
                </table>
                <div class="gotocart">
                    <a href="./customerViewCart.php?custID=<?=$_SESSION['custID']?>"><img src="Image/gotocarticon.png" alt="gotocart" width="70px" height="70px"></a>
                </div>
            </div>
    </center> 
    </body>
</html>