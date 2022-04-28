<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
</style>
<center><br><br><br>
<table  border="0px" width="60%" >
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement Where status='Picture' order by id desc  ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
				 <tr style="background-image: url(assets/img/board.png);background-size: 100% 90%;background-repeat: no-repeat; height: 400px;text-align: center;margin-bottom: 20px">
				 	
				 		<td width="30%" ><center>
				 	<img width="200px" height="200px" src="assets/uploads/<?php echo $row['upload'] ?>" >
				 	</center></td>
				 	<td width="15%"><h3 class="text-white">What?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['subject'] ?></u><hr class="bg-white">
				 	<h3 class="text-white">Who?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['id_no'] ?></u>

				 	</td>
				 	<td width="15%"><h3 class="text-white">When?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['date'] ?>|<?php echo $row['time'] ?></u><hr class="bg-white">
				 <h3 class="text-white">Where?</h3>
				 		<u class="text-white" style="font-family: Comic Sans MS"><?php echo $row['place'] ?></u>
				 	</td><td width="10%"></td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>


</center>
</body>
</html>