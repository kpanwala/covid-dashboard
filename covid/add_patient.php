<?php
// session_start();
// error_reporting(0);
include_once("include/config.php");

if(isset($_POST['submit']))
{	
	// $docid=$_SESSION['id'];
	$patname=$_POST['patname'];
	$patcontact=$_POST['patcontact'];
	$patemail=$_POST['patemail'];
	$gender=$_POST['gender'];
	$pataddress=$_POST['pataddress'];
	$patage=$_POST['patage'];
	$medhis= implode(', ', $_POST['med_history']);
	$symp = implode(', ', $_POST['symp']);
	$tra_his = $_POST['tra_his'];

	// echo $patname ;
	// echo $patcontact;
	// echo $patemail ;
	// echo $gender ;
	// echo $pataddress;
	// echo $patage ;
	// echo $medhis ;
	// echo $symp ;
	// echo $tra_his;
$sql=mysqli_query($con,"insert into patient(name,contact,email,gender,age,med_history,symptoms,tra_history,address) values('$patname','$patcontact','$patemail','$gender','$patage','$medhis','$symp','$tra_his','$pataddress')");
if($sql)
{
echo "<script>alert('Patient info added Successfully');</script>";
header('location:abc1.html');

}
else{
	echo "Error in database entry.";
}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Add Patient Details</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	</head>
	<body style="background-color: black;">
		<div id="app">		
<div class="app-content" style = "margin-left:350px;">
						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle" style="color: red;">Add Patient Details</h1>
</div>
</div>
</section>
<div class="container-fluid container-full">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<!-- <h5 class="panel-title">Add Patient</h5> -->
</div>
<div class="panel-body">
<form role="form" name="" method="post">

<div class="form-group">
<label for="doctorname">
Patient Name
</label>
<input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" required="true">
</div>
<div class="form-group">
<label for="fess">
 Patient Contact no
</label>
<input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
</div>
<div class="form-group">
<label for="fess">
Patient Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-female" name="gender" value="female" >
<label for="rg-female">
Female
</label>
<input type="radio" id="rg-male" name="gender" value="male">
<label for="rg-male">
Male
</label>
</div>
</div>
<div class="form-group">
<label for="address">
Patient Address
</label>
<textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
</div>
<div class="form-group">
<label for="fess">
 Patient Age
</label>
<input type="text" name="patage" class="form-control"  placeholder="Enter Patient Age" required="true">
</div>
<div class="form-group">
<label for="fess">
 Medical History
</label>
<!-- <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea> -->
<select name="med_history[]" id="med_history" class="form-control" multiple >
    <option value="diabetes">Diabetes</option>
    <option value="heart disease">Heart Disease</option>
    <option value="lung disease">Lung Disease</option>
	<option value="hypertension">Hypertension</option>
	<option value="asthma">Asthma</option>
  </select>
</div>	
<div class="form-group">
	<label for="fess">
	 Symptoms
	</label>
	<!-- <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea> -->
	<select name="symp[]" id="symp" class="form-control" multiple>
		<option value="cough">Cough</option>
		<option value="fever">Fever</option>
		<option value="breathlessness">Breathlessness</option>
		<option value="vomitting">Vomitting</option>
		<option value="body ache">Body Ache</option>
	  </select>
	</div>	
	
<div class="form-group">
	<label for="fess">
	 Travel History
	</label>
	<textarea type="text" name="tra_his" class="form-control"  placeholder="Enter Patient Travel History(if any in past 14 days)" required="true"></textarea>
	</div>	
	

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Add
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<!-- <div class="panel panel-white">
</div> -->
</div>
</div>
</div>
</div>
</div>				
</div>
</div>

		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
	
	</body>
</html>
