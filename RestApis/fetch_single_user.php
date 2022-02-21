<?php 


	//***start of headers*******//
	header('Content-Type: application/json');
	header('Allow-Control-Access-Origin: *');
	//***end of headers********//


	//***Start of Database*******//
	require_once 'database.php';
	$db = new Database();
	//***End of Database*******//


	//**Start of Get User ID*****//
	if(!isset($_GET['id']))
	{
		echo json_encode(array("message"=>"User ID is required!","status"=>false));
		die;
	}
	//**End of Get User ID*****//


	//**Start of Get Users*******//
	$id = $_GET['id'];
	$query  = "SELECT * FROM `users` WHERE `user_id`=".$id;
	$result = $db->executeQuery($query);
	//**End of Get Users******//


	//**Start of Show Result*****//
	if(mysqli_num_rows($result) > 0)
	{
		echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
	}else
	{
		echo json_encode(array("message"=>"No User Found","status"=>false));
	}
	//**End of Show Result*****//


?>