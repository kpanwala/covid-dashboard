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
    $sql="UPDATE self_ass SET status = '$status' WHERE id = '$id'";
}
else
{
    $sql="INSERT INTO self_ass(id,status)values('$id','$status')";
}
if ($con->query($sql) === TRUE) {
    header("location:../user-display.html");
}
else
echo "Some Error occured";
$con->close();       
?>