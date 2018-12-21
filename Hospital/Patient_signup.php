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
//Connent Database
require_once('db_setup.php');
//Get passed values
$email = $_POST['email'];
$phone = $_POST['phone'];
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$diagnosis = $_POST['diagnosis'];
$password = $_POST['pass'];
//Generate id
$sql1 = "SELECT MAX(Patient_id) AS Patient_id FROM PATIENTS;";
$max_id = $conn->query($sql1);
$row = $max_id->fetch_assoc();
$id = $row['Patient_id'] + 1;
//Insert into Account table
$sql2 = "INSERT INTO ACCOUNTS VALUE ('$email', '$password', 'Patient', $id);";
$result2 = $conn->query($sql2);
//Feedback
if($result2 === TRUE){
    echo "Congratulation!You successfully signed up. Your ID is ". $id . ".";
}
else{
    echo "Error: This email account already exists!";
    header( "Refresh:3; Patient_signup.html", true, 303);
}
//Insert into Patients table
$sql3 = "INSERT INTO PATIENTS VALUE ($id, '$first_name', '$last_name', '$diagnosis', '$phone', NULL);";
$result3 = $conn->query($sql3);
?>

<?php
$conn->close();
?>  

</body>
</html>
