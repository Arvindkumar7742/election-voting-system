<?php
    session_start();
    if(!isset($_SESSION['username'])){
    header('location:../forms/admin-form.php');
    }
    require("../forms/_dbconnect.php");
    $email=$_SESSION['username'];
    $sql="select * from temphost where sn=1";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if($row==0){
      $sql="INSERT INTO `temphost` (`sn`, `email`, `host`, `time`) VALUES ('1', '$email', '0', '22222222');";
      $result=mysqli_query($conn,$sql);
    }
    else{
      $row1=mysqli_fetch_assoc($result);
      if($row1['email']==$email){
        $sql="select * from tempvoting where sn=1";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if($row==1){
          header('location:election_status.php');
        }
        else{
        header('location:host.php');
        }
      }
      else{
        echo '<script>alert("Alredy there is hosting an election you can not host eletion at the same time.!");window.location = "admin.php"</script>';
      }
    }
?>
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
  </head>
  <body style="background-color: blanchedalmond;">
    <h2 style="margin-left:150px;">Enter IITG creadintial to host an election</h2>
  <form method="post" action="host_handle1.php">
    <div style="margin:50px;">
    <div class="mb-3">
    <label for="ac_id" class="form-label">IITG Community id</label>
    <input type="text" class="form-control" name="ac_id" id="ac_id" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="iitg_password" class="form-label">IITG Password</label>
    <input type="password" class="form-control" name="iitg_password" id="iitg_password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>