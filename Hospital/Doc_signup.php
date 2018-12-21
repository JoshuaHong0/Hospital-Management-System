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
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$password = $_POST['pass'];
$speciality = $_POST['speciality'];
//Generate id
$sql1 = "SELECT MAX(Doc_id) AS Doc_id FROM DOCTORS;";
$max_id = $conn->query($sql1);
$row = $max_id->fetch_assoc();
$id = $row['Doc_id'] + 1;
//Insert into Account table
$sql2 = "INSERT INTO ACCOUNTS VALUE ('$email', '$password', 'Doctor', $id);";
$result2 = $conn->query($sql2);
//Feedback
if($result2 === TRUE){
    echo "Congratulation!You successfully signed up. Your ID is ". $id . ".";
}
else{
    echo "Error: This email account already exists!";
    header( "Refresh:3; Doc_signup.html", true, 303);
}
//Insert into Doctors table
$sql3 = "INSERT INTO DOCTORS VALUE ($id, '$first_name', '$last_name');";
$result3 = $conn->query($sql3);
$sql4 = "INSERT INTO SPECIALITY VALUE($id, '$speciality')";
$result4 = $conn->query($sql4);
?>

<?php
$conn->close();
?>  

</body>
</html>
