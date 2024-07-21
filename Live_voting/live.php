<?php
    session_start();
    if(!isset($_SESSION['voter'])){
        header('location:../forms/vote-now-form.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
 <style>
    body{
        padding: 0;
        margin: 0; 

    }
   .button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
 </style>
</head>
<body style="background-color: blanchedalmond;">

   <h1 style="text-align: center; background-color: lightblue;">IITG Elections</h1>
   <div class="main" style="display: flex;">
        <div class="voter-profile" style="padding-left: 25px;">
            <img src="profile_icon.jpg" style="width: 250px; height: 200px;" alt="">
            <h2 style="text-align: center;">Voter Info</h2>
            <div>
             <?php
                require("../forms/_dbconnect.php");
                $email=$_GET['email'];
                $sql="select * from voters where email='$email'";
                $result=mysqli_query($conn,$sql);
                if($row=mysqli_fetch_assoc($result)){
                    echo '<h4>Name   : '.$row['name'].'</h4>';
                    echo '<h4>Dept : '.$row['dept'].'</h4>';
                    echo '<h4>Roll No   : '.$row['rollno'].'</h4>';
                    echo '<h4>Age   : '.$row['age'].'</h4>';
                    echo '<h4>Email  : '.$row['email'].'</h4>';
                }
            ?> 
            </div>
        </div>
        <div class="cards" >
            <p style="padding-left: 8px;border-radius: 5px; margin-left:90px;background-color: rgb(233, 193, 134); border: 1px solid rgb(180, 143, 87); line-height: 30px;font-size: 20px; line-break: loose;">
                <span style="color: red; font-size: 25px;" >Important!</span> Welcome to IITG election.For voting you tap for your candidate which you want to vote.</p>
         <?php
            $sql="SELECT * FROM `candidates`";
            $result=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
                $post=$row['Post'];
                $name=$row['Name'];
                $dept=$row['dept'];
                $rollno=$row['rollno'];
                echo '<div class="card1" style="background-color:lightblue; margin-left:90px ;margin-top: 5px; display: flex; width: 700px;min-height: 290px; border-radius: 10px;">
                <img src="profile_icon.jpg" height="200px" width="200px">
                <div class="res" style="font-style:oblique;" >
                    <h1 style="text-align: center; ">'.$post.'</h1>
                    <h3 style="padding-left: 30px;" >Name : '.$name.'</h3>
                    <h3 style="padding-left: 30px;">Dept : '.$dept.'</h3>
                    <h3 style="padding-left: 30px;">Roll No  :'.$rollno.'</h3>
                   <a href="live_vote_help.php?email='.$email.'&cand_id='.$rollno.'"><button style="margin-left: 340px;" class="button">Vote</button></a>
                </div>
            </div>';
            }
        ?>     
        </div>
   </div>
</body>
</html>