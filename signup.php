<?php
error_reporting(0);
include 'conn.php';

if(isset($_POST['add_new'])){
	$fname = $_POST['fname'];
	$cont_num = $_POST['cont_num'];
	$email = $_POST['email'];
	$illness = $_POST['illness'];
    $gender = $_POST['gender'];
	$passwords = $_POST['passwords'];

	$conn= mysqli_connect("localhost","root",""); 

	$database= mysqli_select_db($conn,'talkingminds');

	$sql="INSERT INTO patient (fname, cont_num, email, illness, gender, passwords)
        VALUES ('$fname','$cont_num','$email','$illness','$gender','$passwords')";
	$query_run=(mysqli_query($conn,$sql));
}if ($query_run) {
    echo "<script>alert('Sign up complete')</script>";
    header ("Location: pat_wel.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>

    <link rel="stylesheet" href="signup.css">

    </style>
</head>

<body>
    <br><br>
    <div class="regform">
        <h1>Sign Up Here</h1>
    </div> <!-- regform end -->
    <div class="main">
        <!-- main start-->
        <form action="" method="post">
            <div id=" name">
                <!-- name start-->
                <h2 class="name">Name:</h2>
                <input class="labels" type="text" name="fname" placeholder="Enter Your Full Name"> <br>

                <h2 class="name">Contact Number:</h2>
                <input class="labels" type="int" name="cont_num" placeholder="Enter Your Contact Number">

                <h2 class="name">Email:</h2>
                <input class="labels" type="email" name="email" placeholder="Enter Your Valid Email">


                <h2 class="name">Illness:</h2>
                <input class="labels" type="text" name="illness" placeholder="What Problems Are You Facing?">

                <h2 class="name"> Gender </h2>
                <select class="option" name="gender">
                    <option disabled="disabled" selected="selected">Select Your Gender</option>
                    <option value="F">Female</option>
                    <option value="M">Male</option>
                    <option value="Others">Others</option>
                </select>

                <h2 class="name">Passsword:</h2>
                <input class="labels" type="password" name="passwords" placeholder="Select A Password">

                <button name="add_new" type="submit" class="btn btn-primary"><span></span> Sign Up </button>
            </div>
            <!--name end-->
        </form>
    </div> <!-- main end -->

</body>

</html>