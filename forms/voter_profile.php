<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
    <style>
        .btn {
            margin-left: 200px;
        user-select: none;
        background-color: #fff;
        border: 0 solid #e2e8f0;
        border-radius: 1.5rem;
        box-sizing: border-box;
        color: #0d172a;
        cursor: pointer;
        display: inline-block;
        font-family: "Basier circle", -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1.1rem;
        font-weight: 600;
        line-height: 1;
        padding: 1rem 1.6rem;
        text-align: center;
        text-decoration: none #0d172a solid;
        text-decoration-thickness: auto;
        transition: all .1s cubic-bezier(.4, 0, .2, 1);
        box-shadow: 0px 1px 2px rgba(166, 175, 195, 0.25);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .btn:hover {
        background-color: #1e293b;
        color: #fff;
    }

    @media (min-width: 768px) {
        .btn {
            font-size: 1.125rem;
            padding: 1rem 2rem;
        }
    }
    </style>
</head>
<body style="background-image:url('iitg_b.jpg');background-repeat: no-repeat; background-size: 100% 140%;">
    <div class="container" style="background-color: lightblue;height: 300px;display: flex; flex-direction: row;width: 700px; border: 1px solid black; margin: 0 auto; margin-top: 10%; border-radius: 5px;">
        <img src="profile_icon.jpg" alt="" width="40%"  height="100%">
        <div class="info" style="margin-left: 5px; width: 60%;">
            <h2 style="text-align: center;">Personal Info</h2>
            <div class="in" style="margin-left:20px;">
            <?php
                require("_dbconnect.php");
                $email=$_SESSION['email_candidate'];
                $sql="select * from voters where email='$email'";

                $result=mysqli_query($conn,$sql);
                if($row=mysqli_fetch_assoc($result)){
                    echo '<h4>Name   : '.$row['name'].'</h4>';
                    echo '<h4>Roll No : '.$row['rollno'].'</h4>';
                    echo '<h4>Dept   : '.$row['dept'].'</h4>';
                    echo '<h4>Age   : '.$row['age'].'</h4>';
                    echo '<h4>Email   : '.$row['email'].'</h4>';
                }
                echo ' <a href="../index.php"><button class="btn">Log out</button></a>';
            ?>
            </div>
        </div>

    </div>
</body>
</html>