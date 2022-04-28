<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
</style>
<center><br><br><br>
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement Where status='Video' order by id desc  ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
<div>
   <em class="text-white" style="background-color: orange;padding: 12px 20px;border-radius: 14px;"> <?php echo $row['subject'] ?></em>
  </div><br>
		  <video loop height="200px"  style="width:60%" autoplay controls>
  	
  	<source  src="assets/uploads/<?php echo $row['upload'] ?>">
  </video>
  <hr>
		<?php endwhile; ?>


</center>
</body>
</html>