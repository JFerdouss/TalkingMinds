<?php
session_start();
if(isset($_SESSION['fname']) && !empty($_SESSION['fname'])){
    $fname = $_SESSION['fname'];  
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
            width: 40%;
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
            <div class="container py-5">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h1> </h1>
                    </div>
                </div>

                <!-- <div class="row mt-2"> -->
                <?php
                require 'conn.php';
                $query = "SELECT * FROM appointment where fname='$fname'";
                $query_run = mysqli_query($conn, $query);
                $check_psy = mysqli_num_rows($query_run) > 0;

                if ($check_psy) {
                ?>
                    <table class="table" border="1">
                        <thead>
                            <tr>
                                <th>Psychologist Name</th>
                                <th>Patient Name</th>
                                <th>Hospital</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                            while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                              
                                    <form action="" method="post">
                                       
                                        <td class="row-data1"><?php echo $row['psy_name']; ?> </td>
                                        <td class="row-data1"><?php echo $row['fname']; ?> </td>
                                        <td class="row-data1"><?php echo $row['hospital']; ?> </td>
                                        <td class="row-data1"><?php echo $row['Date']; ?> </td>
                                        <td class="row-data1"><?php echo $row['Time']; ?> </td>
                                    </form>
                                </tr>
                              
                        </tbody>




                    <?php
                            }
                    ?>
                    </table>
                <?php
                } else {
                    echo "No appointment found";
                }

                ?>




            </div>
        </div>
           

</body>

</html>