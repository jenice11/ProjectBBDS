<?php
require_once '../../BusinessLayer/controller/manageServiceController.php';

session_start();


$serviceID = $_GET['serviceID'];
$item = new manageServiceController();
$data = $item->viewItem($serviceID);

if(isset($_POST['update'])){
    $item->update();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Good Update</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="ExternalCSS/styles.css" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script>
        var loadFile = function(event){
            var image = document.getElementById('imageOut');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <style>
    td {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .red { color: #FF0000; }
</style>
</head>
<body>
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
                                    <h1 class="m-0">Service Provider Service Update</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
                                        <li class="breadcrumb-item active">Service Update</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid" style="width: 70%">

                            <div class="card shadow-lg border-0 rounded-lg mt-1" >
                                <div class="card-header"><h3 class="text-center font-weight-light my-1">Update Service</h3></div>
                                <div class="card-body" >
                                     <form name="myForm" action="" method="POST" enctype="multipart/form-data">
                                         <?php foreach($data as $row){ ?>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Service Type:</td>
                                                <td colspan="2" >
                                                    <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                                    <select id="servicetype" name="servicetype" class="form-control py-2"> 
                                                        <option disabled >Choose a category</option>
                                                        <option value="Good" <?php if($row['servicetype']==='Good') echo 'selected="selected"';?> >Good</option>
                                                        <option value="Food" <?php if($row['servicetype']==='Food') echo 'selected="selected"';?>>Food</option>
                                                        <option value="Pet" <?php if($row['servicetype']==='Pet') echo 'selected="selected"';?>>Pet</option>
                                                        <option value="Medical" <?php if($row['servicetype']==='Medical') echo 'selected="selected"';?>>Medical</option>
                                                    </select>
                                                </td>
                                                <!-- <td><div style="color: red">&emsp;*Refill</div></td> -->
                                            </tr>
                                            <tr>
                                                <td>Item Name:</td>
                                                <td colspan="2"><input type="text" name="itemname" value="<?=$row['itemname']?>" required class="form-control py-2"></td>
                                            </tr>
                                            <tr>
                                                <td>Unit Price (RM):</td>
                                                <td colspan="2"><input type="text" name="itemprice" value="<?=$row['itemprice']?>" required class="form-control py-2"></td>
                                            </tr>
                                        
                                            <tr>
                                                <td>Item Image</td>
                                                <td><img src="<?=$row['itemimage']?>" width="120px" height="120px" border="1px solid black" style="margin-top: 2px;" ></td>
                                            </tr>
                                            <tr>
                                                    <td></td>
                                                    <td><input type="text" name="imagename" placeholder="Photo.png" size="15">&emsp;&emsp;</td>
                                                    <td></td>
                                                </tr>
                                            <tr>
                                                <td colspan="4" style="text-align: center">
                                                    <button type="submit" name="add" class="btn btn-success" style="width: 20%"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;Update</button>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php } ?>
                                    </form>
                                </div>

                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content -->

                    </div>
                    <!-- /.content-wrapper -->



                </div>
                <!-- ./wrapper -->

            </body>



           
                <?php foreach($data as $row){ ?>
                <table>
                    <tr>
                        <td>Service Type:&emsp;&emsp;</td>
                        <td>
                            <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                            <select id="servicetype" name="servicetype">
                                <option value="" selected></option>
                                <option value="Good">Good</option>
                                <option value="Food">Food</option>
                                <option value="Pet">Pet</option>
                                <option value="Medical">Medical</option>
                            </select>
                        </td>
                        <td><div style="color: red">&emsp;*Refill</div></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Item Name:</td>
                        <td><input type="text" name="itemname" value="<?=$row['itemname']?>" required></td>
                    </tr>
                    <tr>
                        <td>Unit Price (RM):&emsp;</td>
                        <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" required></td>
                    </tr>
                    <tr>
                        <td>Item Image:&emsp;&emsp;</td>
                        <td><img src="<?=$row['itemimage']?>" width="95px" height="95px" border="1px solid black" style="margin-top: 2px;"></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right"><button type="submit" name="update" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Update Service</button></td>
                    </tr>
                </table>
                <?php } ?>
            </div>
        </form>
    </center>  
</body>
</html>