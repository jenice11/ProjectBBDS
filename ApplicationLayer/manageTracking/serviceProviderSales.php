

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
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
    <body>


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


        <div class="topnav">
            <a href="../../ApplicationLayer/manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Sales</h3>
        <br><br>

        <div id="piechart" style="width: 900px; height: 500px;"></div>
            <div style="margin-left: 1.5em;">

                <table>
                    <tr>
                        <td width="130"><center><b>Servie ID</b></center></td>
                        <td width="250"><center><b>Item Name</b></center></td>
                        <td width="200"><center><b>Unit Price (RM)</b></center></td>
                        <td width="230"><center><b>Quantity</b></center></td>
                        <td width="100"><center><b>Subtotal (RM)</b></center></td> 
                    </tr>
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
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>TOTAL PROFIT</b></td>
                        <td><?php echo "$totalprice"; ?></td>
                    </tr>


                    
                </table>
            </div>
            
            </center>
    </body>
</html>