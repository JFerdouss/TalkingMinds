<?php
error_reporting(0);
session_start();
include_once 'conn.php';
if(isset($_SESSION['psy_name']) && !empty($_SESSION['psy_name'])){
    $psy_name = $_SESSION['psy_name'];    
}
?>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="filt.css">
    <style>
 
    </style>
</head>

<body>
<div class="navbar">
                <img src="logo.png" class="logo">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                </div> <!-- navbar end -->
               
    <div class="container">
        <?php
        $query1= "SELECT * FROM psychologist where psy_name='$psy_name';";
        $query_run=(mysqli_query($conn,$query1));
        if($query_run->num_rows>0){
          while($row=$query_run->fetch_assoc()){
                echo "Full name : ".$row['psy_name'];
                ?><br><?php
                echo "Number : ".$row['contact_number'];
                ?><br><?php
                echo "Email : ".$row['psy_email'];
                ?><br><?php
                echo "Expert Field : ".$row['exp_field'];
                ?><br><?php
                echo "Hospital : ".$row['hospital'];
                ?><br><?php
                echo "Email : ".$row['psy_email'];
                ?><br><?php
                echo "Gender : ".$row['psy_gender'];
                
}
}
?>
    </div>
</div>
</body>
</html>