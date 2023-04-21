<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>All About Tennis : Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg1.jpg);">

<?php
	include("db.php");
	session_start();
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If form submitted, insert values into the database.
    if (isset($_POST['username1'])){
		
		$username = stripslashes($_REQUEST['username1']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password1']);
		$password = mysqli_real_escape_string($con,$password);
		
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `tbl_staffs_a180970_pt2` WHERE fld_staff_email='$username' and fld_staff_password='".($password)."'";
        $query2 = "SELECT * FROM `tbl_staffs_a180970_pt2` WHERE fld_staff_email='$username' and fld_staff_password='".($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
		$level0 = mysqli_fetch_all($result);

		$statement = $conn -> prepare($query2);
        $statement -> execute();
        $result2 = $statement -> fetch();
        if($rows==1){
        	if(!empty($result2)){
			$_SESSION['username1'] = $username;
			$_SESSION['sname'] =$result2["fld_staff_name"];
			//$_SESSION['userlevel'] = $level0[0][5];
			$_SESSION['position1'] =$result2["fld_staff_position"];
			header("Location: index.php"); // Redirect user to index.php
		}
            }else{
            	echo "<script>alert('Email/password is incorrect.');
            	window.location.href='login.php';
            	</script>";            	
				}
    }else{
	?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-5 text-center mb-5">
					<center>
	    			<img src="logo.png" width="30%" class="img-responsive">
	    			</center>
					<h2 class="heading-section" ><font face="Algerian">Welcome To All About Tennis!</font></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	
		     	<form action="login.php" method="post"class="signin-form" name="login">
		      		<div class="form-group">
		      			<input type="text" class="form-control" id="username1" name="username1" placeholder="Email" required autofocus>
		      		</div>
	            	<div class="form-group">
	              		<input type="password" id="password1" name="password1"class="form-control" placeholder="Password" required>
	              		<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            	</div>
	            	<div class="form-group">
	            		<button type="submit" name="submit" class="form-control btn btn-primary submit px-3"><font face="Cooper Black">Log In</font></button>
	            	</div>
	            	<div class="form-group d-md-flex">
	            		<div class="w-50">
		            		<label class="checkbox-wrap checkbox-primary">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="#" style="color: #fff">Forgot Password</a>
						</div>
	            	</div>
	          	</form>
	          	
		    </div>
			</div>
			</div>
		</div>
		</div>
	</section>

<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
<?php } ?>

</body>
</html>
