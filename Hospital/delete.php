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
$selection = $_POST['selection'];

if($selection=='doctor'){
    //Check if doctor exists
    $check_id = "SELECT * FROM DOCTORS WHERE Doc_id = $id";
    $id_exist = $conn->query($check_id);
    if($id_exist->num_rows==0){
        echo "Error: Doctor does not exist.";
        header( "Refresh:3; delete_form.html", true, 303);
    }else{
        //Delete operations
        $sql1 = "DELETE FROM ACCOUNTS where Id = $id;";
        $sql2 = "DELETE FROM DOCTORS where Doc_id = $id;";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        //feedback
        if ($result1 === TRUE && $result2 === TRUE) {
            echo "record deleted successfully";
        }
    }
}elseif($selection=='nurse'){
    //Check if nurse exists
    $check_id = "SELECT * FROM NURSES WHERE Nurse_id = $id";
    $id_exist = $conn->query($check_id);
    if($id_exist->num_rows==0){
        echo "Error: Nurse does not exist.";
        header( "Refresh:3; delete_form.html", true, 303);
    }else{
        //Delete operations
        $sql1 = "DELETE FROM ACCOUNTS where Id = $id;";
        $sql2 = "DELETE FROM NURSES where Nurse_id = $id;";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        //feedback
        if ($result1 === TRUE && $result2 === TRUE) {
            echo "record deleted successfully";
        }
    }
}elseif($selection=='patient'){
    //Check if patient exists
    $check_id = "SELECT * FROM PATIENTS WHERE Patient_id = $id";
    $id_exist = $conn->query($check_id);
    if($id_exist->num_rows==0){
        echo "Error: Patient does not exist.";
        header( "Refresh:3; delete_form.html", true, 303);
    }else{
        //Delete operations
        $sql1 = "DELETE FROM ACCOUNTS where Id = $id;";
        $sql2 = "DELETE FROM PATIENTS where Patient_id = $id;";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        //feedback
        if ($result1 === TRUE && $result2 === TRUE) {
            echo "record deleted successfully";
        }
    }
 
}elseif($selection=='medicine'){
    //Check if medicine exists
    $check_id = "SELECT * FROM MEDICINE WHERE Medicine_id = $id";
    $id_exist = $conn->query($check_id);
    if($id_exist->num_rows==0){
        echo "Error: Medicine does not exist.";
        header( "Refresh:3; delete_form.html", true, 303);
    }else{
        //Delete operations
        $sql = "DELETE FROM MEDICINE where Medicine_id = $id;";
        $result = $conn->query($sql);
        //feedback
        if ($result === TRUE) {
            echo "record deleted successfully";
        }
    }
}
?>

<?php
$conn->close();
?>  

</body>
</html>
