<?php 


	//***start of headers*******//
	header('Content-Type: application/json');
	header('Allow-Control-Access-Origin: *');
	//***end of headers********//


	//***Start of Database*******//
	require_once 'database.php';
	$db = new Database();
	//***End of Database*******//

	//***Start of Request Method********//
	if($_SERVER['REQUEST_METHOD'] != "POST")
	{
		echo json_encode(array("message"=>"Only POST Method Allowed","status"=>false));
		die;
	}
	//***End of Request Method*******//

	//**Start of Get User ID*****//
	if(!isset($_POST['id']))
	{
		echo json_encode(array("message"=>"User ID is required!","status"=>false));
		die;
	}
	//**End of Get User ID*****//


	//**Start of Get Users*******//
	$id = $_POST['id'];
	$query  = "DELETE  FROM `users` WHERE `user_id`=".$id;
	$result = $db->executeQuery($query);
	//**End of Get Users******//


	//**Start of Show Result*****//
	if($result)
	{
		echo json_encode(array("message"=>"User Deleted Successfully!","status"=>true));
	}else
	{
		echo json_encode(array("message"=>"Failed to delete","status"=>false));
	}
	//**End of Show Result*****//


?>