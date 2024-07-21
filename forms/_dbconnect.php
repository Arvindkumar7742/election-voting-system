<?php
    $server="localhost";
    $username='id21472565_root';
    $password='Arvindkumar@123';
    $database='id21472565_iitgelection';
    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn){
        die ( mysqli_connect_error());
    }
    else{
        // echo "database connection established<br>";
    }
?>