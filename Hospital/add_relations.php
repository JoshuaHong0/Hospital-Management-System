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
$pid = $_POST['pid'];
$appointment_time = $_POST['appointment'];
$selection = $_POST['selection'];
//convert appointment time into proper format
$appointment = date("Y-m-d H:i:s",strtotime($appointment_time));
//Check if patient exists
$check_patient = "SELECT * FROM PATIENTS WHERE Patient_id = $pid";
$patient_exist = $conn->query($check_patient);
if($patient_exist->num_rows==0){
    echo "Error: Patient id does not exist.";
    header( "Refresh:3; assign_form.html", true, 303);
}else{
    if($selection=='doctor'){
        //Check if doctor exists
        $check_doc = "SELECT * FROM DOCTORS WHERE Doc_id = $id";
        $doc_exist = $conn->query($check_doc);
        if($doc_exist->num_rows==0){
            echo "Error: Doctor id does not exist.";
            header( "Refresh:3; assign_form.html", true, 303);
        }else{
            $sql = "INSERT INTO DOCTOR_ATTEND_PATIENT values ($id, $pid, '$appointment');";
            $result = $conn->query($sql);
        }
    }else{
        //Check if nurse exists
        $check_nurse = "SELECT * FROM NURSES WHERE Nurse_id = $id";
        $Nurse_exist = $conn->query($check_nurse);
        if($Nurse_exist->num_rows==0){
            echo "Error: Nurse id does not exist.";
            header( "Refresh:3; assign_form.html", true, 303);
        }else{
            $sql = "INSERT INTO NURSE_ASSIGNED_TO_PATIENT values ($id, $pid);";
            $result = $conn->query($sql);
        }
    }
}
if ($result === TRUE) {
    echo "New record created successfully";
}else{
    echo "ERROR" . mysqli_error($result);
}
?>

<?php
$conn->close();
?>  

</body>
</html>
