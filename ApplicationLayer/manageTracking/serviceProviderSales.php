

<?php
require_once '../../BusinessLayer/controller/manageTrackingController.php';

session_start();

$spID = $_SESSION['spID'];
$notification = new manageTrackingController();
$data = $notification->viewSPP($spID);

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'sdw';



$connn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");

?>
<!DOCTYPE html>
<html>
<head>
    <?php

//here start
    
//COUNT function and UPDATE function
    for($i = 0; $i<10 ; $i++){

        $count = "SELECT COUNT(itemname) AS count1 FROM order1 WHERE serviceID='$i'";
        $cResult = mysqli_query($connn, $count);
        while($row = mysqli_fetch_assoc($cResult)){

            $cOutput = $row['count1'];
        }
        $cUpdate = "UPDATE sales SET totalsold = '".$cOutput."' WHERE serviceID='$i'";
        $cUpdateResult = mysqli_query($connn, $cUpdate);

//here end
        ?>
        <?php

    }

    ?>

    <title>Service Provider Sales Report</title>
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
        padding-top: 15px;
    }

    .logout {
        position: fixed;
        right: 0;
        margin-right: 5px;
        margin-top: 5px;
    }

    .gotoreport {
        position: fixed;
        right: 25px;
        bottom: 15px;
        border-radius: 50%;
    }
</style>
</head>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['itemname', 'totalsold'],
          <?php
          $chartsql = "SELECT * FROM sales";
          $chartQuery = mysqli_query($connn,$chartsql);
          while ($chartresult = mysqli_fetch_assoc($chartQuery)) {
            echo"['".$chartresult['itemname']."',".$chartresult['totalsold']."],";
        }

        ?>
        ]);

        var options = {
          title: 'Total Sales'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
  }
</script>


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
            <h1 class="m-0">Service Provider Sales</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>">Home</a></li>
              <li class="breadcrumb-item active">Service Sales Dashboard</li>
          </ol>
      </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
     <div class="card shadow-lg border-0 rounded-lg mt-1" >
        <div class="card-header"><h3 class="text-center font-weight-light my-1">Dashboard</h3></div>
        <div class="card-body" ><center>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div></center>
    </div>
    <div class="card shadow-lg border-0 rounded-lg mt-1">
        <div class="card-header"><h3 class="text-center font-weight-light my-1">Service Provider Sales</h3></div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm" id="tableList" >
                <thead>
                    <tr style="text-align: center;">
                        <th><b>Service ID</b></center></th>
                        <th><b>Item Name</b></center></th>
                        <th><b>Unit Price (RM)</b></center></th>
                        <th><b>Quantity</b></center></th>
                        <th><b>Subtotal (RM)</b></center></th> 
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalprice=0;
                    foreach($data as $row){ 
                        $subtotal = $row["itemquantity"]*$row["itemprice"]; 
                        ?>
                        <tr>
                            <td><?=$row['serviceID']?></td>
                            <td><?=$row['itemname']?></td>
                            <td><?=$row['itemprice']?></td>
                            <td><?=$row['itemquantity']?></td>
                            <td><?php echo "$subtotal"; ?></td>
                            <?php $totalprice = $totalprice + $subtotal; ?>
                        </tr>
                        <?php } ?>
                        </tbody>
                         <tfoot>
                            
                            <td colspan="4"><b>TOTAL PROFIT</b></td>
                            <td><?php echo "$totalprice"; ?></td>
                        </tfoot>
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