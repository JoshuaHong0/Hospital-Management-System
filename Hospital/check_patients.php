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
$id = $_GET['id'];
$identity = $_GET['identity'];
if($identity=='Doctor'){
      $sql = "SELECT * FROM PATIENTS p, DOCTOR_ATTEND_PATIENT d WHERE d.P_id = p.Patient_id and d.D_id = $id";
}
elseif($identity=='Nurse'){
      $sql = "SELECT * FROM PATIENTS p, NURSE_ASSIGNED_TO_PATIENT n WHERE n.P_id = p.Patient_id and n.N_id = $id";
}
else{
      $sql = "SELECT * FROM PATIENTS";
}
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>Patient_id</th>
         <th>First_name</th>
         <th>Last_name</th>
   	   <th>Diagnosis</th>
         <th>Phone_number</th>
         <th>Treatment</th>
         <?php if($identity=='Doctor') {echo "<th>Appointment_time</th>";}?>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['Patient_id']?></td>
          <td><?php echo $row['First_name']?></td>
          <td><?php echo $row['Last_name']?></td>
	    <td><?php echo $row['Diagnosis']?></td>
          <td><?php echo $row['Phone_number']?></td>
          <td><?php echo $row['Treatment']?></td>
          <td><?php if($identity=='Doctor') {echo $row['Appointment_time'];}?></td>
      </tr>

<?php
}
}
else {
echo "Nothing to display: ";
}
?>

    </table>

<?php
$conn->close();
?>  

</body>
</html>
