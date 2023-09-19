<?php
error_reporting(0);
include 'conn.php';

if(isset($_POST['add_new'])){
	$psy_name = $_POST['psy_name'];
	$contact_number = $_POST['contact_number'];
	$psy_email = $_POST['psy_email'];
	$exp_field = $_POST['exp_field'];
    $hospital = $_POST['hospital'];
	$psy_gender = $_POST['psy_gender'];
    $psy_pass = $_POST['psy_pass'];
    $psy_picture=$_POST['psy_picture'];

	$conn= mysqli_connect("localhost","root",""); 

	$database= mysqli_select_db($conn,'talkingminds');

	$sql="INSERT INTO psychologist (psy_name,contact_number,psy_email,exp_field,hospital,psy_gender,psy_pass, psy_picture)
    VALUES ('$psy_name','$contact_number','$psy_email','$exp_field','$hospital','$psy_gender', '$psy_pass', '$psy_picture')";

	$query_run=(mysqli_query($conn,$sql));

}if ($query_run) {
    echo "<script>alert('Sign up complete')</script>";
    header ("Location: psy_wel.php");
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
                <input class="labels" type="text" name="psy_name" placeholder="Enter Your Full Name"> <br>

                <h2 class="name">Contact Number:</h2>
                <input class="labels" type="int" name="contact_number" placeholder="Enter Your Contact Number">

                <h2 class="name">Email:</h2>
                <input class="labels" type="email" name="psy_email" placeholder="Enter Your Valid Email">

                <h2 class="name">Expert Field:</h2>
                <input class="labels" type="text" name="exp_field" placeholder="What are your expert fields?">

                <h2 class="name">Hospital:</h2>
                <input class="labels" type="text" name="hospital" placeholder="Where are you working now?">

                <h2 class="name"> Gender: </h2>
                <select class="option" name="psy_gender">
                    <option disabled="disabled" selected="selected">Select Your Gender</option>
                    <option value="F">Female</option>
                    <option value="M">Male</option>
                    <option value="Others">Others</option>
                </select>

                <h2 class="name"> Passsword: </h2>
                <input class="labels" type="password" name="psy_pass" placeholder="Select A Password">

                
                <h2 class="name">Profile Picture:</h2>
                <input class="labels" type="file" name="psy_picture" onchange = "readURL(this)" accept="Image/*" placeholder="Upload your picture">

                

                <button name="add_new" type="submit" class="btn btn-primary"><span></span> Sign Up </button>
            </div>
            <!--name end-->
        </form>
    </div> <!-- main end -->

</body>

</html>