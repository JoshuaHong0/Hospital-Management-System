<!DOCTYPE html>
<?php
    session_start();
   //Connent Database
    require_once('db_setup.php');
    //Fetch Last name
    $email = $_GET['patient'];
    $sql1 = "SELECT * FROM PATIENTS P, ACCOUNTS A where A.Id = P.Patient_id and A.Account = '$email';";
    $result = $conn->query($sql1);
    if(!isset($_SESSION['user'])){
        $conn->close();
        header("LOCATION: Home.php");
    }
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $name = $row['First_name'];
        $id = $row['Patient_id'];
    }else{
        echo "error!". $conn->error;
    }
    
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Patient Navigation</title>
    <link rel="stylesheet" href="Nav/style.css">
</head>
<body background="Nav/b3.jpg">
    <div class ="custom-padding">
        <nav>
            <div class="logo"><?php echo "Welcome, ".$name;?></div>
            <ul class="menu-area">
                <li><?php echo "<a href=check_doctors.php?id=".$id."&identity=Patient>My doctors</a>"?></li>
                <li><?php echo "<a href=check_nurses.php?id=".$id."&identity=Patient>My nurses</a>"?></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>

    </div>
    
<?php
$conn->close();
?>  
    

</body>
</html>