<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<link rel="stylesheet" type="text/css" href="assets/css/w3.css">
	<style>
.mySlides {display:none;}
</style>
<div  style="background-image: url(assets/background.jpg);
        background-repeat: no-repeat;
        background-size: 100% 100%;margin: 0px
 "><br><br>

 			<h1 class="text-white w3-left" style="background-color: rgb(0,0,0,0.5);padding: 12px 12px;margin-left: 20px">BUPC Announcement</h1>
<br><br><br><br>
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement  where status = 'Video' order by id desc limit 5 ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>

<div class="w3-content w3-display-container" ><div  class="mySlides1">
  <video loop  height="400px"  style="width:80%" controls>
  	
  	<source  src="assets/uploads/<?php echo $row['upload'] ?>">
  </video>
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-orange">
   <em class="text-white"> <?php echo $row['subject'] ?></em>
  </div>
 
  <button class="w3-button w3-white w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-white w3-display-right"  onclick="plusDivs(1)">&#10095;</button>
</div></div>
	<?php endwhile; ?>
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


<br><br><br>
</div>
<br><br><br>
<table  border="0px" width="80%"  style="background-image: url(assets/img/board.png);background-size: 100% 100%; height: 400px;text-align: center;">
				<?php
 					include 'db_connect.php';
 					$announcement = $conn->query("SELECT * FROM announcement where status = 'Picture' order by id desc limit 5 ");
 					$i = 1;
 					while($row= $announcement->fetch_assoc()):
				 ?>
				 <div class="w3-content w3-section" style="max-width:500px">
				 <tr class="mySlides" >
				 	
				 		<td width="30%" ><center>
				 	<img width="300px" style="margin-top: 50px" height="300px" src="assets/uploads/<?php echo $row['upload'] ?>" >
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
			</div>
		</div>
	</div>

</div>
	<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

<br><br><br>

</center>
</body>
</html>