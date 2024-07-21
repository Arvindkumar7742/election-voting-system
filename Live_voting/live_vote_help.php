<?php
    session_start();
    if(!isset($_SESSION['voter'])){
        header('location:../forms/vote-now-form.php');
    }
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <style>
    * {
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

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .btn {
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

    .fnt {
        font-size: 1.5rem;
    }
    </style>
     <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
</head>
<body style="background-color: blanchedalmond;">
    <div class="container">
        <?php
            require("../forms/_dbconnect.php");
            $email=$_GET['email'];
            $sql="select * from voters where email='$email'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $is_voted=$row['is_voted'];
            if($is_voted==1){
                $namevoter=$row['name'];
                $rollno=$_GET['cand_id'];
                $sql2="SELECT * FROM candidates where rollno='$rollno'";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                $namecand=$row2['Name'];
                echo '   <div class="jumbotron bg-dark bg-body-secondary mt-4 rounded-4" style="padding: 28px;">
                <h1 class="display-4 alert-success">Already Voted!</h1>
                <p class="lead fnt">Dear Voter <b style="font-size:2.1rem;">'.$namevoter.'</b> you have already been voted suceessfully to the candidate <b style="font-size:2.1rem;">'.$namecand.'.</b></p>
                <p class="lead fnt"> <a href="../index.php"><button class="btn">Log out</button></a> If you voted
                    successfully for your selected candidate.</p>
                <hr class="my-4">
                <p class="fnt"><b>If you inadvertently press the vote butten for candidate <b style="font-size:2.1rem;">'.$namecand.'</b> then you can undo it from
                        below.</b></p>
                <a href="undo.php?email='.$email.'&cand_id='.$rollno.'"><button class="button">Undo</button></a>
    
            </div>';
            }
            else{
                $sqlU1="update voters set is_voted=1 where email='$email'";
                $resultU1=mysqli_query($conn,$sqlU1);
                $rollno=$_GET['cand_id'];
                $sqlU2="update candidates set votecount=votecount+1 where rollno='$rollno'";
                $resultU2=mysqli_query($conn,$sqlU2);
                $namevoter=$row['name'];
                $sql2="SELECT * FROM candidates where rollno='$rollno'";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                $namecand=$row2['Name'];
                echo '<div class="jumbotron bg-dark bg-body-secondary mt-4 rounded-4" style="padding: 28px;">
                <h1 class="display-4 alert-success">Voted successfully !</h1>
                <p class="lead fnt">Dear Voter <b style="font-size:2.1rem;">'.$namevoter.'</b> you have been voted suceessfully to the candidate <b style="font-size:2.1rem;">'.$namecand.'</b>.</p>
                <p class="lead fnt"> <a href="../admin/logout.php"><button class="btn">Log out</button></a> If you voted
                    successfully for your selected candidate.</p>
                <hr class="my-4">
                <p class="fnt"><b>If you inadvertently press the vote butten for candidate <b>'.$namecand.'</b> then you can undo it from
                        below.</b></p>
                <a href="undo.php?email='.$email.'&cand_id='.$rollno.'"><button class="button">Undo</button></a>
    
            </div>';
            }

        ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>