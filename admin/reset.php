<?php
  session_start();
  session_destroy();
    require("../forms/_dbconnect.php");
    $sql="TRUNCATE TABLE `candidates`";
    $result=mysqli_query($conn,$sql);
    $sql="TRUNCATE TABLE `temphost`";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:../index.php');
    }
?>