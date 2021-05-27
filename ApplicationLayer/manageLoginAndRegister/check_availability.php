<?php
require_once("DBController.php");
$db_handle = new manageLoginAndRegisterController();


if(!empty($_POST["custusername"])) {
  $query = "SELECT * FROM customer WHERE custusername='" . $_POST["custusername"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
  if(!empty($_POST["runnerusername"])) {
  $query = "SELECT * FROM runner WHERE runnerusername='" . $_POST["runnerusername"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

 if(!empty($_POST["spusername"])) {
  $query = "SELECT * FROM serviceprovider WHERE spusername='" . $_POST["spusername"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
 }
}

?>