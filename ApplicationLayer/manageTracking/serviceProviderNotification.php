<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $notification = new manageTrackingController();
    $data = $notification->viewSP();

    if(isset($_POST['accept'])){
        $notification->acceptSP();
    }
    if(isset($_POST['reject'])){
        $notification->rejectSP();
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Notification</title>
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

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }
        </style>
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
                    <h1 class="m-0">Service Provider Incoming Order Notification</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
                      <li class="breadcrumb-item active">Incoming Order</li>
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
        <div class="card-header"><h3 class="text-center font-weight-light my-1">  Incoming Order </h3></div>
        <div class="card-body">

                <table class="table table-bordered table-striped table-sm" id="tableList">
                    <thead>
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th><b>Item Name</b></center></td>
                        <th><b>Unit Price (RM)</b></center></td>
                        <th><b>Quantity</b></center></td>
                        <th><b>Action</b></center></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 0;
                    foreach($data as $row){ 
                        $count++ ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemprice']?></td>
                        <td><?=$row['itemquantity']?></td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                &nbsp;<button class="btn btn-success" type="submit" name="accept" onclick="return confirm('Are you sure to accept?');"><i class="fa fa-check" aria-hidden="true"></i></button>&nbsp;
                                &nbsp;<button class="btn btn-danger" type="submit" name="reject" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;
                            </td>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->

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