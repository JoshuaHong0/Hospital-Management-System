<!DOCTYPE html>
<?php
    session_start();
   //Connent Database
    require_once('db_setup.php');
    //Fetch Last name
    $email = $_GET['nurse'];
    $sql1 = "SELECT * FROM NURSES N, ACCOUNTS A where A.Id = N.Nurse_id and A.Account = '$email';";
    $result = $conn->query($sql1);
    if(!isset($_SESSION['user'])){
        $conn->close();
        header("LOCATION: Home.php");
    }
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $name = $row['First_name'];
        $id = $row['Nurse_id'];
    }else{
        echo "error!". $conn->error;
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="Nav/style.css">
</head>
<body background="Nav/b2.jpg">
    <div class ="custom-padding">
        <nav>
            <div class="logo"><?php echo "Welcome, ". $name;?></div>
            <ul class="menu-area">
            <li><?php echo "<a href=check_patients.php?id=".$id."&identity=Nurse>Check patient list</a>"?></li>
            <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>

    </div>
    
<?php
$conn->close();
?>  

</body>
</html>