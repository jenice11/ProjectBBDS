<?php
require_once '../../BusinessLayer/controller/manageServiceController.php';
require_once '../../BusinessLayer/controller/manageTrackingController.php';

session_start();

$item = new manageServiceController();
$data = $item->viewAll();

if(isset($_POST['delete'])){
    $item->delete();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Service View</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="ExternalCSS/styles.css" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <style>
    td {
        text-align: center;
    }


</style>
</head>
<body>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

          <?php include("sidebar.php") ?>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">Service Provider Service View</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
                      <li class="breadcrumb-item active">Service View</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
      <div class="container-fluid">

       <div class="card shadow-lg border-0 rounded-lg mt-1">
        <div class="card-header"><h3 class="text-center font-weight-light my-1">List of Services</h3></div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm" id="tableList" >
                <thead>
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Unit Price (RM)</th>
                        <th>Service Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 0;
                    foreach($data as $row){ 
                        $count++ ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><img src="<?=$row['itemimage']?>" width="80" height="80" ></td>
                            <td><?=$row['itemname']?></td>
                            <td><?=$row['itemprice']?></td>
                            <td><?=$row['servicetype']?></td>
                            <form action="" method="POST">
                                <td style="text-align: center;">
                                    &nbsp;<button type="button" class="btn btn-outline-info"  onclick="location.href='./serviceProviderServiceUpdate.php?serviceID=<?=$row['serviceID']?>'"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size: large;" data-toggle="tooltip" data-placement="top" title="Edit Service Detail"></i></button>
                                    <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                    &nbsp;<button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete Service" name="delete" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash" aria-hidden="true" style="font-size: large; color: red;"></i></button>&nbsp;
                                </td>
                            </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <button class="btn btn-primary btn-block" type="submit" name="add" onclick="location.href='./serviceProviderServiceAdd.php?spID=<?=$_SESSION['spID']?>'">Add New Service</button>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->






</body>

</html>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tableList').DataTable(({
            tableList : 5,
            lengthMenu: [[5, 10, 20, 100], [5, 10, 20, 100]]

        }));
    } );

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })


</script>

<!-- jQuery -->
<script src="ExternalCSS/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="ExternalCSS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ExternalCSS/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.jss"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>





