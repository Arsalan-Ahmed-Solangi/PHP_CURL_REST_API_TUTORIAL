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
			<h5>View Users | <a href="create.php" class="btn btn-dark">Add User</a> </h5>
		</div>
		<div class="card-body">

			<!-- Start of Show Messages -->
			<?php  require 'includes/messages.php'  ?>
			<!-- End of Show Messages -->

			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr class="text-center">
						<th>SR</th>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>ACTION</th>
					</tr>
				</thead>

				<tbody>
					<!-- Start of Get Users -->
					<?php

						//***Start of Creating Curl Class Object******//
						require 'curl/curl.php';
						$ch = new Curl();
						//***End of Creating Curl Class Object*******/

						//**Start of Getting Output From Rest Api Folder******//
						$result = $ch->get($hostName.'/fetch_users.php');

						//**End of Getting Output From Rest Api Folder******//
							
						//**Start of Decoding JSON*******//	
						$result = json_decode($result);

						//**End of Deconding JSON*******//

						//**Start of Show Records*******//
						if(count($result) > 0)
						{


							//***Start of Looping ********//
							$sr = 1;
							foreach ($result ?? array() as $key => $value) {
								
								?>
								<tr>
									<td><?= $sr++ ?></td>
									<td><?= $value->name ?></td>
									<td><?= $value->email ?></td>
									<td>
										<!-- <a class="btn btn-dark" href="process.php?id=<?=$value->user_id?>&edit=true">Edit</a> -->

										<a class="btn btn-danger" href="process.php?id=<?=$value->user_id?>&delete=true">Delete</a>
									</td>
								</tr>
								<?php

							}
							//***End of Looping*********//

						}else
						{
							?>
							<tr class="text-center">
								<th colspan="4">No Users Found</th>
							</tr>
							<?php
						}
						//**End of Show Records*******//
					?>
					<!-- End of Get Users -->
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- End of Show Users -->


<!-- Start of Footer -->
<?php  require 'includes/footer.php' ?>
<!-- End of Footer