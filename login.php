<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BUPC ONLINE DASHBOARD</title>
 	
<link rel="icon" href="assets/bupc.gif" type="image/x-icon">
	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<link rel="stylesheet" type="text/css" href="assets/css/w3.css">

<style>
	body{
		width: 100%;
	    height: calc(100%);

	} 
	main#main{
		width:100%;
		height: calc(100%);
}
	#login-right{
		position:absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position:absolute;
		left:0;
		width:60%;
		height: calc(100%);
		    	background-image: url(assets/background.jpg);
		display: flex;
		align-items: center;
	    	background-repeat: no-repeat;
	    	background-size: 100% 100%

	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    padding: .5em 0.8em;
    color: #000000b3;
}

.link{
	margin-left: 10px;
	color: white;
	padding: 10px 20px;
	text-decoration: none;
	background-color: darkblue

}

.link:hover{
	color: white;
background-color:darkorange

}
</style>

<body>
	<?php include 'topbar.php' ?>


  <main id="main" class=" alert-info">
  	<br><br>	<div id="login-left">

  			<div class="logo">
		<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement order by id desc limit 3 ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
<div class="w3-content w3-display-container" ><div  class="mySlides1">
  <video loop autoplay muted  height="400px" width="600px" >
  	
  	<source  src="assets/uploads/<?php echo $row['upload'] ?>">
  </video>

 <!--  <img src="assets/uploads/<?php echo $row['upload'] ?>" alt="Img Announcement"> -->

  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-orange">
   <em class="text-white"> <?php echo $row['subject'] ?></em>
  </div>
 
</div></div>
	<?php endwhile; ?>
</div></div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
  		<div id="login-right">
  			<div class="w-100">
  				<h4 class="text-blue text-center"><b>Please Login to Continue</b></h4>
  				<br>
  			
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label text-dark">Email</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label text-dark">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-success">Login</button></center>
  					Don't have an account? <a href="Registration.php">Register!</a>
  					</form>
  				</div>
  			</div>
  		</div>
   		</div>

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.reload('index.php?page=home');
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>