<?php
	$showalert=false;
	$showerror=false;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
		if($_POST["ac_id"]!="IITG123"&&$_POST['iitg_password']!="123456"){
			echo '<script>alert("IITG comunutity id and password is not matched! Please contact to the authorithity.");	window.location = "registration.php"</script>';
			return ;
		}
        include("_dbconnect.php");
        $fullname=$_POST['full_name'];
		$adress=$_POST['address'];
		$city=$_POST['city'];
		$email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['password_again'];
        $mysql="SELECT * FROM `admin` WHERE email='$email';";
        $result=mysqli_query($conn,$mysql);
        $existrow=mysqli_num_rows($result);
        if($existrow>0){
			echo '<script>alert("Email already exist!");</script>';
        }
        else{
        if($password==$cpassword){
            $sql="INSERT INTO `admin` (`fullname`, `adress`, `city`, `email`, `password`, `time`) VALUES ( '$fullname', '$adress', '$city', '$email', '$password', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showalert=true;
            }
        }
        else{
            echo '<script>alert("Password is not matched to the original password. Try again!");window.location = "registration.php"</script>';
        }
      }
    }

?>

<!DOCTYPE html>
<html lang="en">

	<head>
	<title>IITG ELECTIONS</title>
    <link rel="icon" type="image/x-icon" href="./IITG_logo.png">
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>

	<body class="login" style="background-image: url(iitg1.jpg); background-repeat: no-repeat; background-size: 100% 140%; ">
	<?php
        if($showalert){
	echo '<script>alert("Regestration done you can log in now!");window.location = "admin-form.php"</script>';
}
    ?>
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<!-- start: REGISTER BOX -->
				<div class="box-register">
				<div class="logo margin-top-10">
				<a href="../index.html"><h2 style="font-weight: bolder;">IITG |Admin Registration</h2></a>
				</div>
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" required>
							</div>
							<p>
								Enter IITG credential to register into the portal:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="ac_id" id="ac_id" onBlur="userAvailability()"  placeholder="IITG Community id" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="iitg_password" name="iitg_password" placeholder="IITG password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="./admin-form.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

				</div>

			</div>
		</div>
	</body>
	<!-- end: BODY -->
</html>