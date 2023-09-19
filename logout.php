<?php

session_start();
if(
    isset($_SESSION['fname'])
   
){
    unset($_SESSION['fname']);
 
    
    ?>
        <script>alert("logged out successfully!");</script>
        <script>location.assign("first.html");</script>
    <?php 
    
}
else{
    ?>
        <script>location.assign("first.html");</script>
    <?php 
}

?>