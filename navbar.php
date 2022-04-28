<style>
	
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
<br><br><br>
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Dashboard</a>
				<?php if($_SESSION['login_position'] == 'Organization'): ?>
				<a href="index.php?page=announcement" class="nav-item nav-announcement"><span class='icon-field'><i class="fa fa-flag"></i></span> Announcement</a>
							<?php endif; ?>
			 						<a href="index.php?page=infoboard" class="nav-item nav-infoboard"><span class='icon-field'><i class="fa fa-book"></i></span> Information Board</a>

				<?php if($_SESSION['login_type'] == 1): ?>

			 										<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
			<?php endif; ?>
				<?php if($_SESSION['login_position'] == 'Organization'): ?>

			 										<a href="index.php?page=user" class="nav-item nav-user"><span class='icon-field'><i class="fa fa-user"></i></span> My Account</a>
			<?php endif; ?>
	<?php if($_SESSION['login_position'] == 'Professor'): ?>

			 										<a href="index.php?page=account" class="nav-item nav-account"><span class='icon-field'><i class="fa fa-user"></i></span> My Account</a>
			<?php endif; ?>
	<?php if($_SESSION['login_position'] == 'Student'): ?>

			 										<a href="index.php?page=account" class="nav-item nav-account"><span class='icon-field'><i class="fa fa-user"></i></span> My Account</a>
			<?php endif; ?>

			 						<a href="index.php?page=about" class="nav-item nav-about"><span class='icon-field'><i class="fa fa-question"></i></span> About</a>
	<hr><a class="nav-item nav-users text-danger" href="ajax.php?action=logout" ><span class='icon-field'><i class="fa fa-power-off"></i></span> Log out<br><?php echo $_SESSION['login_name'] ?></a>
			 	
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>