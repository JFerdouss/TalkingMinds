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

                <br>
                <br>
                <br>
                <!-- <div class="row mt-2"> -->
                <?php
                require 'conn.php';
                $query = "SELECT * FROM psychologist";
                $query_run = mysqli_query($conn, $query);
                $check_psy = mysqli_num_rows($query_run) > 0;

                if ($check_psy) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Contact No.</th>
                                <th>Email</th>
                                <th>Hospital</th>
                                <th>Expert Field</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 0;
                            while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                                <tr id=<?php echo $number ?>>
                                    <form action="" method="post">
                                        <td class="row-data1"><img src="psy_picture/<?php echo $row['psy_picture']; ?>" width="100px" height="100px" alt="psy_picture"></td>
                                        <td class="row-data1"><?php echo $row['psy_name']; ?> </td>
                                        <td class="row-data1"><?php echo $row['contact_number']; ?> </td>
                                        <td class="row-data1"><?php echo $row['psy_email']; ?> </td>
                                        <td class="row-data1"><?php echo $row['hospital']; ?> </td>
                                        <td class="row-data1"><?php echo $row['exp_field']; ?> </td>
                                        <td class="row-data1"><input type="button" id="b2" value="Book Appointment" onclick="app()" /></td>
                                    </form>
                                </tr>
                                <?php $number = $number + 1 ?>
                        </tbody>




                    <?php
                            }
                    ?>
                    </table>
                <?php
                } else {
                    echo "No psychologist found";
                }

                ?>




            </div>
        </div>
            <script>
                function app() {
                    let rowId2 = event.target.parentNode.parentNode.id;
                    let data = document.getElementById(rowId2).querySelectorAll(".row-data1");

                    let psy_name = data[1].innerHTML;
                    let contact_number = data[2].innerHTML;
                    let psy_email = data[3].innerHTML;
                    let hospital = data[4].innerHTML;
                    let exp_field = data[5].innerHTML;                  
                    alert(psy_name + contact_number +psy_email + exp_field + hospital);
                    location.assign('app_list.php?psy_name='+psy_name+'&contact_number='+contact_number+
                    '&psy_email='+psy_email+'&hospital='+hospital+'&exp_field='+exp_field);
                }
            </script>

</body>

</html>