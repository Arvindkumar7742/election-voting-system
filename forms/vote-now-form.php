<?php
session_start();
  include("_dbconnect.php");
      $sql="select * from tempvoting where sn=1";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_num_rows($result);
      if($row==1){
      }
      else{
      header('location:index.php');
      }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $_SESSION['voter']=$email;
            $sql="select * from voters where email='$email' and password='$password'";
            $result=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($result);
            if($total>0){
                $row=mysqli_fetch_assoc($result);
                $is_voted=$row['is_voted'];
                if($is_voted==0){
                header("location:/Live_voting/live.php?email=$email");
                }
                else{
                    echo '<script>alert("YOU ALREADY VOTED! YOU CANNOT VOTE AGAIN!");</script>';
                }
            }
        else{
			echo '<script>alert("Invalid credintial!");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
    <style>
      *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url('bg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 170%;
    
}
img{
    opacity: 0.3;
}
.wrapper{
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: space-around;
}
#live{
    width: 100px;
    height: 100px;
}
.wrapper img{
    margin-top: 40px;
    width: 200px;
    height: 200px;
    padding: 20px;
    border-radius: 20px;
}
.wrapper form{
    padding: 10px;
    border: 1px solid black;
    border-radius: 10px;
    margin: 50px;
}
    </style>
</head>
<body>
  <div class="wrapper">
  
    <div class="container" >
        <form method="post">
          <h2>Welcome to IITG ELECTION <span style="color: red;">LIVE</span> voting</h2>
          <p>Please log in to vote your candidate</p>
            <div class="mb-3">
              <label for="exampleInputEmail1"  class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password"  id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
  </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>