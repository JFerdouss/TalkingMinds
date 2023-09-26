<?php
session_start();
if(isset($_SESSION['fname']) && !empty($_SESSION['fname'])){
    $fname = $_SESSION['fname'];  
}
require 'conn.php';
if(isset($_POST['a'])){
$psy_name=$_POST['doctor'];
$date=$_POST['sdate'];
$time=$_POST['time'];
$hospital=$_POST['hospital'];
}
$sql = "INSERT INTO `appointment`(`psy_name`, `fname`, `Date`, `Time`, `hospital`) VALUES ('$psy_name','$fname','$date','$time','$hospital')";
$query_run=(mysqli_query($conn,$sql));
if ($query_run) {
    header ("Location: pat_view_app.php");
}
?>