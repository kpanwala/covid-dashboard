<?php
session_start();
if (!isset($_SESSION['login'])) {        //To prevent login using Back button of browser
  header('location:home.html');  //As session as already been destroyed in logout.php thus it should not be set
}
include_once("include/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="http://momentjs.com/downloads/moment.js"></script>
    <title>Document</title>

    <!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
  var dataTable = $('#empTable').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    //'searching': false, // Remove default Search Control
    'ajax': {
       'url':'ajaxfile.php',
       'data': function(data){
          // Read values
          var gender = $('#searchByGender').val();
          var name = $('#searchByName').val();

          // Append to data
          data.searchByGender = gender;
          data.searchByName = name;
       }
    },
    'columns': [
       { data: 'name' },
       { data: 'contact' }, 
       { data: 'email' },
       { data: 'gender' },
       { data: 'age' },
       { data: 'med_history' },
       { data: 'symptoms' },
       { data: 'tra_history' },
       { data: 'address' },
    ]
    
  });

  $('#searchByName').keyup(function(){
    dataTable.draw();
  });

  $('#searchByGender').change(function(){
    dataTable.draw();
  });
});
</script>

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

    .log11,.log12,.log13{
    background:black;
    border-style: solid;
    border-color:rgb(245, 122, 225);
    color:white;
}

.log11:hover,.log12:hover,.log13:hover{
    background:rgb(245, 49, 213, 0.6);
    border-style: solid;
    border-color:rgb(245, 122, 225);
    color:white;
}
        .click{
    background:rgb(255, 132, 0, 0.6);
    border-style: solid;
    border-color:rgb(255, 255, 255);
    color:white;
}

    </style>    

<body>

<div >
<div class="container">
      <div class="chart-container" style="position:relative; display:inline-block; height:5vh; width:60vw; margin-left:15vw; margin-top:3vh;">
          <button type="button" class="btn log11" onClick="location.href='admin-display.php'" style="float:right; display:inline-block; margin-right:-200px;"  >Home</button> 
      </div>
    </div>
    <br>
    <br>
   <!-- Custom Filter -->
   <table style = "background-color:black;display:none;" >
     <tr>
       <td>
         <input type='text' id='searchByName' placeholder='Enter name'>
       </td>
       <td>
         <select id='searchByGender'>
           <option value=''>-- Select Gender--</option>
           <option value='male'>Male</option>
           <option value='female'>Female</option>
         </select>
       </td>
     </tr>
   </table>
   <!-- Table -->
   <table id='empTable' class='display dataTable' style = "background-color:black;" >
     <thead style = "color:white;">
       <tr>
         <th>Patient Name</th>
         <th>Contact</th>
         <th>Email</th>
         <th>Gender</th>
         <th>Age</th>
         <th>Medical History</th>
         <th>Symptoms</th>
         <th>Travel History</th>
         <th>Address</th>
       </tr>
     </thead>

   </table>
</div>
</body>
</html>
