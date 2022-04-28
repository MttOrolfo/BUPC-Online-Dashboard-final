<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><br><br><br><br>
<center><style>
.mySlides {display:none;}
</style>
				 <div class="w3-content w3-section" style="max-width:500px">
				 <img width="600px" height="400px" src="assets/img/Quality .jpg" class="mySlides" ><img width="600px" height="400px" src="assets/img/MissionVision.jpg" class="mySlides" >
				 	</div><br><br>
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
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</center>
</body>
</html>