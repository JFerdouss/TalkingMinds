<?php
error_reporting(0);
session_start();
if(isset($_SESSION['psy_name']) && !empty($_SESSION['psy_name'])){
    $psy_name = $_SESSION['psy_name'];    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Talking Minds</title>
    <link rel="stylesheet" href="pat_wel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div> <!-- navbar end -->

        <div class="sidebar">
            <center>
                <h2><?php echo "$psy_name"; ?> </h2>
            </center>
            <a href="psy_profile.php"><i class="fa-solid fa-user"></i><span>Profile</span></a>

            <a href="psy_view_app.php"><i class="fa-solid fa-stethoscope"></i><span>See Your Appointments</span></a>

            <a href="p_logout.php"><i class="fa-light fa-circle-xmark"></i><span> Logout</span></a>


        </div> <!-- sidebar end -->
        <div class="content">

        </div>
    </div> <!-- banner end-->

</body>

</html>