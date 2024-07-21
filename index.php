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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:100% 100%;
    /* background-size: cover; */
}
.wrapper{
    position: relative;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
}
.heading{
    user-select: none;
    font-size: 40px;
    margin: 10px;

    color: rgb(41, 53, 74);
    text-align: center;
    /* text-shadow: 1px 1px beige; */
}
.admin-btn{
    position: absolute;
    right: 5%;
    top: 15%;
    user-select: none;
  background-color: #fff;
  border: 0 solid #e2e8f0;
  border-radius: 1.5rem;
  box-sizing: border-box;
  color: #0d172a;
  cursor: pointer;
  display: inline-block;
  font-family: "Basier circle",-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
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

.admin-btn:hover {
  background-color: #1e293b;
  color: #fff;
}

@media (min-width: 768px) {
  .admin-btn {
    font-size: 1.125rem;
    padding: 1rem 2rem;
  }
}

.cand-btn {
  user-select: none;
    position: absolute;
    right: 5.5%;
    top: 30%;
  background-color: #fff;
  border: 0 solid #e2e8f0;
  border-radius: 1.5rem;
  box-sizing: border-box;
  color: #0d172a;
  cursor: pointer;
  display: inline-block;
  font-family: "Basier circle",-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
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

.cand-btn:hover {
  background-color: #1e293b;
  color: #fff;
}

@media (min-width: 768px) {
  .cand-btn {
    font-size: 1.125rem;
    padding: 1rem 2rem;
  }
}
.vote-btn {
  user-select: none;
  background-color: #fff;
  border: 0 solid #e2e8f0;
  border-radius: 1.5rem;
  box-sizing: border-box;
  color: #0d172a;
  cursor: pointer;
  display: inline-block;
  font-family: "Basier circle",-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
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

.vote-btn:hover {
  background-color: #1e293b;
  color: #fff;
}

@media (min-width: 768px) {
  .vote-btn {
    font-size: 1.125rem;
    padding: 1rem 2rem;
  }
}
.vote-start{
  user-select: none;
    position: absolute;
    left: 25px;
    bottom: 30px;
    /* display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; */
    gap: 5px;
}
.vote-start div{
  user-select: none;
    display: inline;
    color: red;
    font-style: italic;
    font-size: 30px;
    margin-right: 10px;
    text-align: center;
}
    </style>
</head>
<body>
    <!-- this is starting -->
    <div class="wrapper">
        <h2 class="heading">Welcome to IITG Elections</h2>
            <a href="./forms/admin-form.php"><button class="admin-btn">Admin Log in <i class="fa fa-arrow-right"></i></button></a> 
        <a href="./forms/voter-form.php"><button class="cand-btn">Voter Log in <i class="fa fa-arrow-right"></i></button></a>
        <?php
  include("./forms/_dbconnect.php");
  $sql="select * from tempvoting where sn=1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  if($row==1){
    echo '<div class="vote-start"><div>Voting is Ongoing</div><a href="forms/vote-now-form.php"><button class="vote-btn">Vote Now <i class="fa fa-arrow-right"></i></a></button></div>';
  }
        ?>
</div>
</body>
</html>