<?php
require_once '../../BusinessLayer/controller/manageUserProfileController.php';

$spID = $_GET['spID'];

$user = new manageUserProfileController();
$data = $user->viewSP($spID); 

if(isset($_POST['update'])){
    $user->updateSP();
}

if(isset($_POST['delete'])){
    $user->deleteSP($spID);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Profile</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="ExternalCSS/styles.css" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
    
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

      <?php include("../sidebar.php") ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
              </ol>
          </div><!-- /.col -->
      </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid" style="width: 50%">

     <div class="card shadow-lg border-0 rounded-lg mt-1">
        <div class="card-header"><h3 class="text-center font-weight-light my-1">Service Provider Profile</h3></div>
        <div class="card-body" >
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                    $_SESSION['spID']=$row['spID'];
                    ?>
                    
                    <table class="table table-borderless table-sm" >
                        <tr>
                            <td>Username:</td>
                            <td><input class="form-control" type="text" name="spusername" value="<?=$row['spusername']?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><input class="form-control" type="text" name="sphpnumber" value="<?=$row['sphpnumber']?>"required></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input class="form-control" type="text" name="spemail" value="<?=$row['spemail']?>"required></td>
                        </tr>
                        <tr>
                            <td>Company Name:</td>
                            <td><input class="form-control" type="text" name="spcompanyname" value="<?=$row['spcompanyname']?>"required></td>
                        </tr>
                        <tr>
                            <td>Address Line 1:</td>
                            <td><input class="form-control" type="text" name="spaddress1" value="<?=$row['spaddress1']?>"required></td>
                        </tr>
                        <tr>
                            <td>Address Line 2:</td>
                            <td><input class="form-control" type="text" name="spaddress2" value="<?=$row['spaddress2']?>"required></td>
                        </tr>
                        <tr>
                            <td>Address Line 3:</td>
                            <td><input class="form-control" type="text" name="spaddress3" value="<?=$row['spaddress3']?>"required></td>
                        </tr>
                        <tr>
                            <td>Address Line 4:</td>
                            <td><input class="form-control" type="text" name="spaddress4" value="<?=$row['spaddress4']?>"required></td>
                        </tr>
                        <tr>
                            <td>Bank Type:</td>
                            <td><input class="form-control" type="text" name="spbanktype" value="<?=$row['spbanktype']?>"required></td>
                        </tr>
                        <tr>
                            <td>Bank Account Number:</td>
                            <td><input class="form-control" type="text" name="spbankaccountnumber" value="<?=$row['spbankaccountnumber']?>"required></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2">
                                <br>
                                <button class=" btn btn-danger" type="submit" name="delete">Delete Profile</button>&emsp;
                                
                                <button class="btn btn-primary"  type="submit" name="update">Update Profile</button>
                            </td>
                        </tr>
                    </table>
                    <?php } ?>
                    
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
</center>
</body>
</html>
<!-- jQuery -->
<script src="ExternalCSS/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="ExternalCSS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ExternalCSS/adminlte.min.js"></script>