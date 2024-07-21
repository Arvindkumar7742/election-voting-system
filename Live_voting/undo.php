<?php
    require("../forms/_dbconnect.php");

    $email=$_GET['email'];
         header ("location:live.php?email=$email");
    $rollno=$_GET['cand_id'];
    $sqlU1="update voters set is_voted=0 where email='$email'";
    $resultU1=mysqli_query($conn,$sqlU1);
    $rollno=$_GET['cand_id'];
    $sqlU2="update candidates set votecount=votecount-1 where rollno='$rollno'";
    $resultU2=mysqli_query($conn,$sqlU2);
    echo "hello1";

    echo "hell21";
?>