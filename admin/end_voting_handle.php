<?php
     session_start();
     if(!isset($_SESSION['username'])){
     header('location:../forms/admin-form.php');
     }
     require("../forms/_dbconnect.php");
     $sql="TRUNCATE TABLE `tempvoting`";
     $result=mysqli_query($conn,$sql);
     if($result){
         header('location:result.php');
     }
?>