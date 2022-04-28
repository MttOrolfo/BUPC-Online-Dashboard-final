<br><br><div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-success float-right btn-md" id="Add_announcement"><i class="fa fa-plus"></i>Add Announcement</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped col-md-12" border="0px">

			<thead>
				 <tr><td>
<table style="height: 100%;margin-top: 0px">
				<tr>
					<th class="text-center" style="width:20%">Images</th>
					<th class="text-center" style="width:20%">Announcement</th>
					<th class="text-center" style="width:20%">Place</th>
					<th class="text-center" style="width:20%">Date and Time</th>
					<th class="text-center" style="width:20%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$user = $conn->query("SELECT * FROM announcement where id_no = '".$_SESSION['login_id_no']."' and status='Picture' order by id desc");
 					while($row= $user->fetch_assoc()):
				 ?>
				 <tr>
				 	<td  class="text-center">
				 		<img width="100px" height="100px" src="assets/uploads/<?php echo $row['upload'] ?>">
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['subject'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['place'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['date'] ?>|
				 		<?php echo $row['time'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-success">Action</button>
								  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Update</a>

								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
		</table>
</td><td>
	
<table>
				<tr>
					<th class="text-center">Videos</th>
					<th class="text-center">Announcement</th>
					<th class="text-center">Place</th>
					<th class="text-center">Date and Time</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$user = $conn->query("SELECT * FROM announcement where id_no = '".$_SESSION['login_id_no']."' and status='Video' order by id desc");
 					while($row= $user->fetch_assoc()):
				 ?>
				 <tr>
				 	<td  class="text-center">
				 	<video loop  height="100px"  width="100px"  controls>
  	
  	<source  src="assets/uploads/<?php echo $row['upload'] ?>">
  </video>
  
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['subject'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['place'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['date'] ?>|
				 		<?php echo $row['time'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-success">Action</button>
								  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Update</a>

								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
		</table>
</td></tr>
		</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#Add_announcement').click(function(){
	uni_modal('Add Announcement','manage_announcement.php')
})
$('.edit_user').click(function(){
	uni_modal('Update','manage_announcement.php?id='+$(this).attr('data-id'))
})

</script>