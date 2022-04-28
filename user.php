<br><br><br><div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-success float-right btn-md" id="new_user"><i class="fa fa-plus"></i>Add Users</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Org. Name</th>
					<th class="text-center">User Type</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM users where id = '".$_SESSION['login_id']."' order by id desc");
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td class="text-center">
				 		<?php echo $row['username'] ?>
				 	</td><td class="text-center">
				 		<?php echo $row['id_no'] ?>
				 	</td>
				 	<td class="text-center">
				 		<?php echo $row['position'] ?>
				 	</td>
				 	<td>
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
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script>
	
$('#new_user').click(function(){
	uni_modal('Add user','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Update','manage_user.php?id='+$(this).attr('data-id'))
})

</script>