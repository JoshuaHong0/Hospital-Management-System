<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');

// Query:
$id = $_POST['id'];
$medicine = $_POST['med'];
$treatment = $_POST['treatment'];
$dose = $_POST['dose'];

//Check if patient exists
$check_patient = "SELECT * FROM PATIENTS WHERE Patient_id = $id";
$patient_exist = $conn->query($check_patient);
if($patient_exist->num_rows==0){
    echo "Error: Patient does not exist.";
    header( "Refresh:3; MakePlan.php", true, 303);
}
//Get medicine id
$sql1 = "SELECT Medicine_id FROM MEDICINE WHERE MEDICINE.Name = '$medicine'";
$med_id = $conn->query($sql1);

//Check if medicine exists
if($med_id->num_rows==0){
    echo "Error: Input medicine does not exist.";
    $conn->close();
    header( "Refresh:3; MakePlan.php", true, 303);
}
$row1 = $med_id->fetch_assoc();
$medicine_id = $row1['Medicine_id'];

//Update Operation
$check_if_taking = "SELECT * FROM TAKING WHERE P_id = $id";

$check = $conn->query($check_if_taking); 

if($check->num_rows>0){
    $sql3 = "UPDATE TAKING SET M_id = $medicine_id, Dose = '$dose' WHERE P_id = $id";
}else{
    $sql3 = "INSERT INTO TAKING VALUE($id, $medicine_id, '$dose')";
}
$sql2 = "UPDATE PATIENTS SET Treatment = '$treatment' WHERE Patient_id = $id";
$result1 = $conn->query($sql2); 
$result2 = $conn->query($sql3);

if ($result2 === TRUE) {
    echo "record update successfully";
}
?>

<?php
$conn->close();
?>  

</body>
</html>
