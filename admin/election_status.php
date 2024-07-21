<?php
    session_start();
    if(!isset($_SESSION['username'])){
    header('location:../forms/admin-form.php');
    }
    else{
        require("../forms/_dbconnect.php"); 
        $sql="select * from tempvoting where sn=1";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if($row==1){
        }
        else{
        $email=$_SESSION['username'];
        $sql="INSERT INTO `tempvoting` (`sn`, `email`, `voting`, `time`) VALUES ('1', '$email', '0', '22222222');";
        $result=mysqli_query($conn,$sql);
        }
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
    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
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

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    .container{
        margin:10px;
        min-width: 500px;
        background-color:lightblue;
        border-radius: 10px;
        height:300px;
           
    }
    .cards{
        background-color:lightblue;
         margin-left:10px ;
         margin-top: 5px; 
         display: flex; 
         width: 700px;
         min-height: 220px;
        border-radius: 10px;
    }
    .cand{
        text-align: center;
        background-color:lightblue;
        border-radius:10px; 
    }
    .main-head{
        text-align: center;
        background-color: lightblue;
        margin: 0;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .start-voting{
            padding: 12px 22px;
            background-color: rgb(11, 189, 238);
            border: 1px solid grey;
            border-radius: 30px;
            font-size: 20px;
            font-weight: 700;
            outline: none;
            cursor: pointer;
        }
        .End-btn{
            height:250px;
            padding-left: 30%;
            padding-top:20px;
        }
    </style>
</head>

<body style="background-color: blanchedalmond;">
     
    <h1 class="main-head">IITG Elections</h1>
    <div class="main" style="display: flex;">
        <div class="container">
            <div class="End-btn">
                <a href="end_voting_handle.php">   <button class="start-voting">End Voting</button></a>
            <h1 >Live Voting Count:</h1>
            <!-- <h2>40% - voting Completed</h2> -->
            <?php
                $sql1 = "select * from `candidates`";
                $sql2 = "select * from `voters`";
                $voteResult = mysqli_query($conn,$sql1);
                $votersResult = mysqli_query($conn,$sql2);
                $voteCount = 0;
                while($row = mysqli_fetch_assoc($voteResult)){
                    $voteCount = $voteCount+$row['votecount'];
                }
                $totalVoter = mysqli_num_rows($votersResult);
                $percentage = (($voteCount)/($totalVoter))*100;
                
                echo '<h2>'.$percentage.'% - voting Completed.</h2>';
            ?>
            </div>
        </div>
        <div class="card">
            <div class="cand"><h2>List of all candidates</h2></div>
            <?php
            $sql1 = "select * from candidates";
            $Result = mysqli_query($conn,$sql1);
            while($row=mysqli_fetch_assoc($Result)){
                echo ' <div class="cards">
                <img src="profile_icon.jpg" height="200px" width="200px">
                <div class="res" style="font-style:oblique;">
                    <h1 style="text-align: center; ">'.$row['Post'].'</h1>
                    <h3 style="padding-left: 30px;">Name : '.$row['Name'].'</h3>
                    <h3 style="padding-left: 30px;">Dept : '.$row['dept'].'</h3>
                    <h3 style="padding-left: 30px;">Roll NO :'.$row['rollno'].'</h3>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
    </div>
</body>
</html>
