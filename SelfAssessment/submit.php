<?php
session_start();
error_reporting(0);
include("../include/config.php");
$id=$_SESSION['id'];
$status=$_POST["End"];
$ret=mysqli_query($con,"SELECT * FROM self_ass WHERE id = '$id'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    $date=date("Y-m-d");
    $sql="UPDATE self_ass SET status = '$status', date='$date' WHERE id = '$id'";
}
else
{
    $date=date("Y-m-d");
    $sql="INSERT INTO self_ass(id,date,status)values('$id','$date','$status')";
}
if ($con->query($sql) === TRUE) {
    header("location:../user-display.php");
}
else
echo "Some Error occured";
$con->close();       
?>