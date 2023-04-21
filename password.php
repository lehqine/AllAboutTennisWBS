<?php

session_start();
include("db.php");

if(isset($_POST['Submit']))
{
 $oldpass=($_POST['opwd']);
 $username=($_POST['user']);;
 $newpassword=($_POST['npwd']);
$sql=mysqli_query($con,"SELECT fld_staff_password FROM tbl_staffs_a180970_pt2 where fld_staff_password='$oldpass' AND fld_staff_email='$username'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"UPDATE tbl_staffs_a180970_pt2 set fld_staff_password='$newpassword' where fld_staff_email='$username'");
 echo "<script>alert('Password Changed Successfully !!');
 window.location.href='index.php'; 
 </script>";      
}
else
{
echo "Current Password not match !!";
		       
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All About Tennis : Reset Password</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style>
  	
  		.button {
  			background-color: blue;
		    border: none;
		    color: black;
		    border-radius: 6px;
		    padding: 15px 32px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 18px;
		    margin: 4px 2px;
		    cursor: pointer;
  		}  		
  	</style>
  	<style>
		.center {
		    display: block;
		    padding-top: 10px;
		    margin-left: auto;
		    margin-right: auto;
		    width: 30%;

		}

	</style>
<style>
label{
	color: black;

	font-size: 18px;
}
</style>
<style>
	body{
		margin:0;
		background-color: #FFFDF2;
		background-image: url("bg3.jpg") ;
        background-size: 100%;

	}
	</style>

<!--<link rel="stylesheet" href="css/style.css" />-->
</head>
<body>
	<?php include_once 'nav_bar.php'; ?>

    <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-2">
      <div class="page-header">

	 <div class="row">	  	
	    <div class="col-xs-10 col-sm-10 ">
	    	<center>
	    	<img src="logo.png" width="30%" class="img-responsive">
</center>
	    <div class="page-header">
	        <h2 style="color:black;"><font face="Algerian">Reset Password</font></h2>
	    </div>

		<form name="chngpwd" method="post" action="" onSubmit="return valid();" class="form-horizontal">
			<div class="form-group">
				<label for = "user"  class="col-sm-3 control-label"><font face="Times New Roman">Username:</font></label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="user" name="user"  value ="<?php echo $_SESSION['username1'];?>" Readonly="true" />
				</div>
			</div>
	    	<div class="form-group">
				<label for = "opwd"  class="col-sm-3 control-label"><font face="Times New Roman">Currect Password:</font></label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="opwd" name="opwd"  placeholder = "Enter Current Password"  autofocus />
				</div>
			</div>
			<div class="form-group">
				<label for = "npwd" class="col-sm-3 control-label"><font face="Times New Roman">New Password:</font></label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="npwd" name="npwd" placeholder ="Enter New Password"  />
				</div>
			</div>
			<div class="form-group">
				<label for = "cpwd" class="col-sm-3 control-label"><font face="Times New Roman">Confirm Password:</font></label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="cpwd" name="cpwd" placeholder ="Enter Confirm Password" />
				</div>
			</div>
			<div class = "form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="button btn-primary" name="Submit" type="submit" value="Submit"><font face="Cooper Black">Reset Password</font></a>					
					
				</div>
			</div>
		</form>
	</div>
</div>	
<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
</body>
</html>