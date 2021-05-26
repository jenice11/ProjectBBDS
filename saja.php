<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "sdw");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO product (servicetype, itemname, itemprice)  VALUES ('Food', 'Laksa', 3 ),
('Food', 'Mee Kuah', 5),
('Food', 'Rendang', 6),
('Food', 'Bihun Goreng', 2)
('Food', 'Macaroon', 5);";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>