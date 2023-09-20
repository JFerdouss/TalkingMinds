<!doctype html>
<html lang="en">

<head>
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
<div class="navbar">
                <img src="logo.png" class="logo">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                </div> <!-- navbar end -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search By Psychologist/Their Expert Field</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                           
                              
                                    
                                        <input type="text" name="input_value" class="labels" placeholder="Search">
                                   
                               

                                        <button type="submit" name="filter_btn" class="btn btn-primary">
                                            <a><i class="fa-solid fa-magnifying-glass"></i></a> 
                                        </button>
                                   
                             





                            
                        </form>
                        <!-- <table class="table table-border">
                            <thead>
                                <tr>
                                    <th scope="col">Psychologist Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Expert Field</th>
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Picture</th>

                                </tr>
                            </thead>
                            <tbody> -->
                                <?php
                                    
                                    $connection = mysqli_connect ("localhost", "root","","talkingminds");
                                
                                    if(isset($_POST['filter_btn'])){
                                        $value_filter=$_POST['input_value'];
                                        $query=" SELECT * FROM psychologist WHERE concat(psy_name,exp_field,hospital) LIKE '%$value_filter%'";
                                        $query_run=mysqli_query($connection,$query);
                                        if(mysqli_num_rows($query_run)>0){
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
                                            while ($row =mysqli_fetch_array($query_run) ){
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
            }
                ?>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
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