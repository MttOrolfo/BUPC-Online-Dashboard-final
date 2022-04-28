<?php
	session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 include('./header.php'); 
 // include('./auth.php'); 
 ?>

<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input type="email" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" required>
		</div>
	<?php if($_SESSION['login_type'] == 1): ?>
		<div class="form-group">
			<label for="org">Org. name (ID no. for student)</label>
			<input type="text" name="id_no" id="id_no" class="form-control" value="<?php echo isset($meta['id_no']) ? $meta['id_no']: '' ?>" required>
		</div>

		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? : '' ?>>Admin</option>
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? : '' ?>>User</option>
			</select>
			<label for="position">User Position </label>
			<select name="position" id="position" class="custom-select">
				<option value="Admin" <?php echo isset($meta['position']) && $meta['position'] == 1 ? : '' ?>>Admin</option>
				<option value="Organization" <?php echo isset($meta['position']) && $meta['position'] == 2 ? : '' ?>>Organization</option>
				<option value="Student" <?php echo isset($meta['position']) && $meta['position'] == 4 ? : '' ?>>Student</option>
				<option value="Professor" <?php echo isset($meta['position']) && $meta['position'] == 3 ? : '' ?>>Professor</option>
			</select>
		</div><?php endif; ?>
	<?php if($_SESSION['login_position'] == 'Organization'): ?>
				<div class="form-group">
			<label for="org">Org. name (ID no. for student)</label>
			<input type="text" name="id_no" id="id_no" class="form-control" value="<?php echo $_SESSION['login_id_no'] ?>" required>
		</div>

			<select name="type" id="type" class="custom-select">
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? : '' ?>>User</option>
</select>
		<div class="form-group">
			<label for="position">User Position </label>
			<select name="position" id="position" class="custom-select">
				<option value="Organization" <?php echo isset($meta['position']) && $meta['position'] == 2 ? : '' ?>>Organization</option>
			</select>
		</div><?php endif; ?>
	<?php if($_SESSION['login_position'] == 'Professor'): ?>
<div class="form-group">
			<label for="org">Org. name (ID no. for student)</label>
			<input type="text" name="id_no" id="id_no" class="form-control" value="<?php echo isset($meta['id_no']) ? $meta['id_no']: '' ?>" required>
		</div>

		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? : '' ?>>User</option>
			</select>
					<div class="form-group">
			<label for="position">User Position </label>
			<select name="position" id="position" class="custom-select">
				<option value="Professor" <?php echo isset($meta['position']) && $meta['position'] == 3 ? : '' ?>>Professor</option>
			</select>
		</div><?php endif; ?>
	<?php if($_SESSION['login_position'] == 'Student'): ?>
			<div class="form-group">
			<label for="org">Org. name (ID no. for student)</label>
			<input type="text" name="id_no" id="id_no" class="form-control" value="<?php echo isset($meta['id_no']) ? $meta['id_no']: '' ?>" required>
		</div>

		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? : '' ?>>User</option>
			</select>
					<div class="form-group">
			<label for="position">User Position </label>
			<select name="position" id="position" class="custom-select">
				<option value="Student" <?php echo isset($meta['position']) && $meta['position'] == 4 ? : '' ?>>Student</option>
			</select>
		</div><?php endif; ?>

	</form>
</div>
<script>
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>