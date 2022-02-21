<!-- Start of Start Session -->
<?php 
    session_start();
    $hostName = str_replace("index.php","","http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]RestApis");
    $_SESSION['url'] = $hostName;
 
?>						
<!-- End of Start Session -->
<!---Start of Header -->
<?php  require 'includes/header.php'; ?>
<!-- End of Header -->

<!-- Start of Show Users  -->
<div class="container mt-5">
	<h2 align="center">REST APIS WITH CURL CRUD</h2>
	<div class="card shadow-sm bg-white">
		<div class="card-header">
			<h5>Create User | <a href="index.php" class="btn btn-dark">View Users</a> </h5>
		</div>
		<div class="card-body">
			<form action="process.php" method="POST">
				
				<div class="form-group m-2">
					<label>Full Name</label>
					<input type="text" name="name" placeholder="Enter your name" required class="form-control">
				</div>

				<div class="form-group m-2">
					<label>Email Address</label>
					<input type="text" name="name" placeholder="Enter your name" required class="form-control">
				</div>

			</form>
		</div>
	</div>
</div>
<!-- End of Show Users -->


<!-- Start of Footer -->
<?php  require 'includes/footer.php' ?>
<!-- End of Footer