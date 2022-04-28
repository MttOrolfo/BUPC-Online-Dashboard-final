<!DOCTYPE html>
<html>
<head>
  <title>BUPC ONLINE DASHBOARD</title>
 	
<link rel="icon" href="assets/bupc.gif" type="image/x-icon">
</head>
<body>
<?php include('./header.php'); ?>
<style>
	
	body{
    background: #80808045;	
}
.form{
	background-color: white;
	width: 30%;
	align-items: center;
	border-radius: 14px;
	margin-bottom: 20px;
	margin-top: 20px
}
.input{
	padding: 10px 10px;
	width:60%;
	text-align: center
}
.login{
	padding: 10px 10px;
}
.title{
	padding: 20px
}
.submit{
	background-color: green;
	color: white;
	padding: 10px 20px;
	border-radius:14px;
	text-decoration: none;
	border: none;

}
.submit:hover{
background-color: blue
}
</style>
<?php include 'topbar.php' ?>
<center>

<br><br><br><br>
<div class="form" >
<form action="reg.php" method="Post">
	<h1 class="title">Registration</h1>
	<div class="login">
	<input class="input" type="text" name="name" placeholder="Full Name" required="">
	</div>
	<div class="login">
	<input class="input" type="text" name="id_no" placeholder="Student ID no." required="">
	</div>

	<div class="login">
	<input class="input" type="email" name="username" placeholder="Email Address" required="">
	</div>
	<div class="login">
	<input class="input" type="password" name="password" placeholder="Password" required="">
	</div>
	<input class="input" type="hidden" name="type" value="2" required="">
	<input class="input" type="hidden" name="position" value="Student"  required="">
	<div class="login">
	<input class="submit" type="submit" name="submit" value="Register">
	</div>
		<div class="login">Already have an account?
<a href="index.php"><u>Login!</u></a>	</div>
</form>
</div></center>
</body>
</html>