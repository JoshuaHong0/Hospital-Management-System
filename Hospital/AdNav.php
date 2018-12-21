<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("LOCATION: Home.php");
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="Nav/style.css">
</head>
<body background="Nav/b1.jpg">
    <div class ="custom-padding">
        <nav>
            <div class="logo">Welcome, hospital manager</div>
            <ul class="menu-area">
                <li><a href="check_doctors.php">Doctor list</a></li>
                <li><a href="check_patients.php">Patient list</a></li>
                <li><a href="check_nurses.php">Nurse list</a></li>
                <li><a href="select_medicine.php">Medicine list</a></li>
                <li><a href="check_relations.php?target=dpl">Doctor-Patient list</a></li>
                <li><a href="check_relations.php?target=npl">Nurse-Patient list</a></li>
                <li><a href="check_relations.php?target=pml">Patient-medicine list</a></li>
                <li><a href="assign_form.html">Make an assignment</a></li>
                <li><a href="delete_form.html">Delete account</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>

    </div>
    
</body>
</html>