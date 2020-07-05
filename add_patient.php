<?php
session_start();
if (!isset($_SESSION['login'])) {        //To prevent login using Back button of browser
    header('location:home.html');  //As session as already been destroyed in logout.php thus it should not be set
}
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
echo "Patient info added Successfully";
header('location:admin-display.html');

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
    
    <style>
    .log{
    background:rgb(255, 132, 0, 0.3);
    border-style: solid;
    border-color:rgb(255, 132, 0);
    color:white;
}

.log:hover{
    background:rgb(255, 132, 0, 0.6);
    border-style: solid;
    border-color:rgb(255, 255, 255);
    color:white;
}

        .click{
    background:rgb(255, 132, 0, 0.6);
    border-style: solid;
    border-color:rgb(255, 255, 255);
    color:white;
}

    </style>
    
	<body style="background-color: black;">
        <div class="container">
      <div class="chart-container" style="position:relative; display:inline-block; height:5vh; width:60vw; margin-left:15vw; margin-top:3vh;">
        <button type="button" class="btn log" onClick="location.href='admin-display.php'" style="float:right; display:inline-block; margin-right:3vw;"  >Home</button> 
        </div>
    </div>
    
        
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
<input type="text" name="patname" pattern="[a-zA-Z\s]+" class="form-control"  placeholder="Enter Patient Name" required="true">
</div>
<div class="form-group">
<label for="fess">
 Patient Contact no
</label>
<input type="text" name="patcontact" class="form-control" pattern="[0-9]{10}" placeholder="Enter Patient Contact no" required="true" >
</div>
<div class="form-group">
<label for="fess">
Patient Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Patient Email id" required="true" >
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
<input type="text" name="patage" class="form-control" pattern = "[0-9]{2}" placeholder="Enter Patient Age" required="true">
</div>
<div class="form-group">
<label for="fess">
 Medical History
</label>
<!-- <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea> -->
<select name="med_history[]" id="med_history" class="form-control" multiple >
    <option value="Diabetes">Diabetes</option>
    <option value="Heart disease">Heart Disease</option>
    <option value="Lung disease">Lung Disease</option>
	<option value="Hypertension">Hypertension</option>
	<option value="Asthma">Asthma</option>
  </select>
</div>	
<div class="form-group">
	<label for="fess">
	 Symptoms
	</label>
	<!-- <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea> -->
	<select name="symp[]" id="symp" class="form-control" multiple>
		<option value="Cough">Cough</option>
		<option value="Fever">Fever</option>
		<option value="Breathlessness">Breathlessness</option>
		<option value="Vomitting">Vomitting</option>
		<option value="Body Ache">Body Ache</option>
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
