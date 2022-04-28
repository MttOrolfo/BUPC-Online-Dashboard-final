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
$announcement = $conn->query("SELECT * FROM announcement where id =".$_GET['id']);
foreach($announcement->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-announcement">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
 		    <input type="file" class="custom-file-input"  name="upload" id="upload" onchange="displayname(this,$(this))">
		    <label class="custom-file-label" for="upload">Choose file</label>
<div class="form-group">
	
					<label for="status">Data type</label>
			<select name="status" id="status" class="custom-select" >
				<option value="<?php echo isset($meta['status']) ? $meta['status']: '' ?>" selected><?php echo isset($meta['status']) ? $meta['status']: '' ?></option>
				<option value="Picture" <?php echo isset($meta['Picture']) ? $meta['Picture']: '' ?>>Picture</option>
				<option value="Video" <?php echo isset($meta['Video']) ? $meta['Video']: '' ?>>Video</option>
			</select>
	

</div>   
		<div class="form-group">
			<label for="subject">Subject</label>
			<input type="text" name="subject" id="subject" class="form-control" value="<?php echo isset($meta['subject']) ? $meta['subject']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="place">Place</label>
			<input type="text"  name="place" id="place" class="form-control" value="<?php echo isset($meta['place']) ? $meta['place']: '' ?>" required>
		</div>
		<input type="hidden" name="id_no" value="<?php echo $_SESSION['login_id_no'] ?>">
		<div class="form-group">
			<label for="date">Date and time</label>
			<input type="date" name="date" id="date" class="form-control" value="<?php echo isset($meta['date']) ? $meta['date']: '' ?>" required><br>
			<input type="time" name="time" id="time" class="form-control" value="<?php echo isset($meta['time']) ? $meta['time']: '' ?>" required>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-announcement').submit(function(e){
			e.preventDefault()
			start_load();
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_announcement',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(typeof resp != undefined){
					resp = JSON.parse(resp);
					if(resp.status == 1){
						alert_toast("New File successfully added.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
					}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')
						end_load()
					}
				}
			}
		})
		})
	})
	function displayname(input,_this) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();
			        reader.onload = function (e) {
            			_this.siblings('label').html(input.files[0]['name'])
			            
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}
</script>