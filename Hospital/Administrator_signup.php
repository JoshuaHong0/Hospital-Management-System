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
$id = $_POST['id'];
$password = $_POST['pass'];
//Insert into Account table
$sql = "INSERT INTO ACCOUNTS VALUE ('$email', '$password', 'Administrator', NULL);";
$result = $conn->query($sql);
//Feedback
if($result === TRUE){
    echo "Congratulation!You successfully signed up. Your ID is ". $id . ".";
}
else{
    echo "Error: This email account already exists!";
    header( "Refresh:3; Administrator_signup.html", true, 303);
}


?>

<?php
$conn->close();
?>  

</body>
</html>
