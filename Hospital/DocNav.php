<!DOCTYPE html>
<?php
    session_start();
   //Connent Database
    require_once('db_setup.php');
    //Fetch Last name
    $email = $_GET['doc'];
    $sql1 = "SELECT * FROM DOCTORS D, ACCOUNTS A where A.Id = D.Doc_id and A.Account = '$email';";
    $result = $conn->query($sql1);
    if(!isset($_SESSION['user'])){
        $conn->close();
        header("LOCATION: Home.php");
    }
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $name = $row['Last_name'];
        $id = $row['Doc_id'];
    }else{
        echo "Error:". $conn->error;
    }
    
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Doctor Navigation</title>
    <link rel="stylesheet" href="Nav/style.css">
</head>
<body background="Nav/b4.jpg">
    <div class ="custom-padding">
        <nav>
            <div class="logo"><?php echo "Welcome, Dr. ". $name;?></div>
            <ul class="menu-area">
                <li><?php echo "<a href=check_patients.php?id=".$id."&identity=Doctor>Check patient list</a>"?></li>
                <li><a href="MakePlan.php">Make Treatment plan</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>

    </div>

<?php
$conn->close();
?>  
    
</body>
</html>