<?php
include_once("include/config.php");

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByGender = $_POST['searchByGender'];

## Search 
$searchQuery = " ";
if($searchByName != ''){
   $searchQuery .= " and (name like '%".$searchByName."%' ) ";
}
if($searchByGender != ''){
   $searchQuery .= " and (gender='".$searchByGender."') ";
}
if($searchValue != ''){
   $searchQuery .= " and (name like '%".$searchValue."%' or 
      email like '%".$searchValue."%' or 
      contact like'%".$searchValue."%' or
      med_history like'%".$searchValue."%' or
      symptoms like'%".$searchValue."%' or
      tra_history like'%".$searchValue."%' or
      address like'%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from patient");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from patient WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from patient WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array(
     "name"=>$row['name'],
     "contact"=>$row['contact'],
     "email"=>$row['email'],
     "gender"=>$row['gender'],
     "age"=>$row['age'],
     "med_history"=>$row['med_history'],
     "symptoms"=>$row['symptoms'],
     "tra_history"=>$row['tra_history'],
     "address"=>$row['address'],
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
?>
