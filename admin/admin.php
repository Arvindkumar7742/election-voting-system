<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:../forms/admin-form.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        #wrapper{
            height: 100vh;
            width: 100%;
            padding: 0;
            margin: 0;
            background-image: url(./images/background.jpg);
            background-size: 100% 100%;
        }
        .navbar{
            height: 100px;
            width: 100%;
            position: relative;
            display: flex;
            justify-content: center;
        }
        .heading{
            position: absolute;
            font-size: 3.5rem;
            color: aliceblue;
            font-weight: 700;
            font-family: Arial, Helvetica, sans-serif;
        }
        .logout-icon{
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
        .container{
            margin:10% auto;
            height: 30vh;
            width: 40vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            row-gap: 40px;
        }
        .admin-btn{
    position: absolute;
    right: 48%;
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
    right: 45%;
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
    position: absolute;
    right: 47%;
    top: 44%;
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
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div id="wrapper">
        <div class="navbar">
            <h1 class="heading">Admin Dashboard</h1>
            <a class="logout-icon" href="logout.php"><img src="./images/icons8-logout-50.png" alt="logout"></a>
        </div>
        <div class="container">
            <a href="profile.php"> <div><button class="admin-btn">Your profile        <i class="fa fa-arrow-right"></i></button></div> </a> 
            <a href="host_handle.php"> <div><button class="cand-btn">Host an election <i class="fa fa-arrow-right"></i></button></div> </a> 
         <a href="voter.php"> <div><button class="vote-btn">votersection   <i class="fa fa-arrow-right"></i></button></div> </a>   

        </div>
    </div>
    
</body>

</script>
</html>
