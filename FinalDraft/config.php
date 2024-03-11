<?php
    $conn = new mysqli("localhost","root","","kimwellery");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>