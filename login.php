<?php
include 'conn.php';
session_start();

// if(isset($_SESSION['fname'])) {
// 	header ("Location: welcome.php");
// }

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST ['password'];

	$sql = "SELECT * FROM patient WHERE email= '$email' AND passwords = '$password'";
	$result = mysqli_query ($conn, $sql);
	
	if($result-> num_rows >0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['fname'] = $row ['fname'];
		header ("Location: pat_wel.php");
	}else{
		echo "<script>alert ('Email or Password is wrong!!!')</script>";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title> Login </title>
	<link rel="stylesheet" href="signup.css">
</head>

<body>
	<br><br><br><br><br><br><br><br><br><br>
	<div class="regform">
		<h1>Login Here</h1>
	</div> <!-- regform end -->
	<div class="main">
		<!-- main start-->
		<form action="" method="POST">
			<div id=" name">
				<!-- name start-->

				<h2 class="name">Email:</h2>
				<input class="labels" type="email" name="email" placeholder="Enter Your Email" required>


				<h2 class="name">Passsword:</h2>
				<input class="labels" type="password" name="password" placeholder="Enter Your Password" required>


				<button name="submit" type="submit" class="btn btn-primary"><span></span> Login </button>
			</div>
			<!--name end-->
		</form>
	</div> <!-- main end -->
</body>

</html>