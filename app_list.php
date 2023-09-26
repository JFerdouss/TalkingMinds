<?php
session_start();
$psy_name=$_GET['psy_name'];
$contact_number=$_GET['contact_number'];
$psy_email=$_GET['psy_email'];
$hospital=$_GET['hospital'];
$exp_field=$_GET['exp_field'];  
if(isset($_SESSION['fname']) && !empty($_SESSION['fname'])){
    $fname = $_SESSION['fname'];  
}
require 'conn.php';
$query = "SELECT * FROM psychologist where psy_name='$psy_name'";
$query_run = mysqli_query($conn, $query);
$check_psy = mysqli_num_rows($query_run) > 0;

if ($check_psy) {
    while ($row = mysqli_fetch_array($query_run)) {
        if($row['app1av']=="yes")
$app1=$row['app1'];
else
$app1="Booked";
if($row['app2av']=="yes")
$app2=$row['app2'];
else
$app2="Booked";
if($row['app3av']=="yes")
$app3=$row['app3'];
else
$app3="Booked";
    }
}
?>
 <html>

<head>
    <title>View Psychologists</title>
    <link rel="stylesheet" href="view_psy.css">
    <style>
        .banner {
            height: 900px;
        }

        .content {

            background-color: gray;
            margin-left: 15%;
            width: 70%;
            height: 550px;
        }
        #b1, #b2 {

text-align: center;
width: 110%;
padding: 2px;
background: darkslategrey;
color: white;
font-size: 15px;
cursor: pointer;
}

#b2:hover {
background: #259ee4;
}
#abcd{
    font-family:'Times New Roman', Times, serif;
    position: absolute;
    top: 200px;
    right: 1000px;
    width: 250px;
    font-size:xx-large;
   
}
input[type=text] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 5px solid rgb(129, 174, 175);
    border-radius: 20px;
    box-sizing:border-box;
}
input[type=date] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 5px solid rgb(129, 174, 175);
    border-radius: 20px;
    box-sizing:border-box;
}
div.form {  
    margin-left: 40px;
    top: 60px;
    right: 200px;
    width: 500px;
    height:500px
    
}
select{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 5px solid rgb(129, 174, 175);
    border-radius: 20px;
    box-sizing:border-box;

}
#b1{
    margin-left: 120px;
    text-align: center;
    float: left;
    width: 50%;
    padding: 10px;
    background: rgb(129, 174, 175);
    color: white;
    font-size: 17px;
    cursor: pointer;
  }
  #b1:hover {
    background: #259ee4;
  }
      body{
          font-family:'Times New Roman', Times, serif;
      }

  label{
      float: left;
      font-size: large;
  }
    </style>
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
        <div class="content">
        <div class="form">
        <form class=""  method="post" action="app_book.php" >
          
        <label for="triptype">Doctor Name:</label>
        <input type="text" id="person" name="doctor" value="<?php echo $psy_name ?>" >

        <label for="triptype">Hospital:</label>
        <input type="text" id="person" name="hospital" value="<?php echo $hospital ?>" >

        <label for="triptype">Expert Field:</label>
        <input type="text" id="person" name="expert" value="<?php echo $exp_field ?>" >

    
          <label for="sdate">Appointment Date</label>
          <input type="date" id="sdate" name="sdate" >
          
          <label for="time">Appointment Time</label>
          <select id="time" name="time">
          <option value="<?php echo $app1 ?>"><?php echo $app1 ?></option>
          <option value="<?php echo $app2 ?>"><?php echo $app2 ?></option>
          <option value="<?php echo $app3 ?>"><?php echo $app3 ?></option>
          </select>
    
          
        
          <button type="submit" id="b1" name="a" >Book Appointment<br><i class="fa fa-search"></i></button> 
          
        </form>
      </div>
        </div>
    </div>      

</body>

</html>