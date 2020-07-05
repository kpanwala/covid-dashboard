<?php
include_once("include/config.php");
if(!empty($_POST["username"])) {
  $query =  mysqli_query($con,"SELECT * FROM users WHERE email='" . $_POST["username"] . "'");
  $records = mysqli_fetch_assoc($query);
if($records>0) {
      echo "<span class='status-not-available' style='color:Tomato;'> Username Not Available !!!</span>";
  }else{
      echo "<span class='status-available' style='color:MediumSeaGreen;'> Username Available.</span>";
  }
}
?>