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
$target = $_GET['target'];
// Query:

if($target=='dpl'){
      $sql = "SELECT * FROM DOCTOR_ATTEND_PATIENT";
}elseif($target=='npl'){
      $sql = "SELECT * FROM NURSE_ASSIGNED_TO_PATIENT";
}elseif($target=='pml'){
      $sql = "SELECT * FROM TAKING";
}

$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
      <?php if($target=='dpl'){echo "<th>Doctor_id</th><th>Patient_id</th>";}?>
      <?php if($target=='npl'){echo "<th>Nurse_id</th><th>Patient_id</th>";}?>
      <?php if($target=='pml'){echo "<th>Patient_id</th><th>Medicine_id</th><th>Dose</th>";}?>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
            <?php if($target=='dpl'){echo "<td>". $row['D_id']."</td><td>". $row['P_id']."</td>";}?>
            <?php if($target=='npl'){echo "<td>". $row['N_id']."</td><td>". $row['P_id']."</td>";}?>
            <?php if($target=='pml'){echo "<td>". $row['P_id']."</td><td>". $row['M_id']."</td><td>". $row['Dose']."</td>";}?>
      </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>  

</body>
</html>
