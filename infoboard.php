<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<style type="text/css">
	
	.org{
margin-top: 100px;
margin-bottom: 100px;
	width: 60%;
	height: 350px

	}
	.text{
		font-family: Comic Sans MS;
		font-size: 18px;
		color: white;font-size: 24px;background-color: blue;padding: 12px 16px;

	}
	.text:hover{
		background-color: orange;
		color: white
	}
</style>
<center>
	
<div class="org">
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement order by id desc limit 1  ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
<video controls=""  width="700" height="300" >
		<source src="assets/uploads/<?php echo $row['upload'] ?>" ></video>
<br><br>
	<a href ="index.php?page=orginfo" class="text"><b>Continue to Info Board</b></a>
</div>	<?php endwhile; ?>

<div class="org">
	
	<a href ="index.php?page=org"><img src="assets/img/org.png"></a>
</div>	


</center>
</body>
</html>