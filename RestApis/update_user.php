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
		echo json_encode(array("message"=>"Only Post Method Allowed","status"=>false));
		die;
	}
	//***End of Request Method*******//

	//**Start of Getting Data*****//
	if(!isset($_POST['id']))
	{

		echo json_encode(array("message"=>"ID is required!","status"=>false));
		die;
	}
	if(!isset($_POST['name']))
	{
		echo json_encode(array("message"=>"Name is required!","status"=>false));
		die;
	}

	if(!isset($_POST['email']))
	{
		echo json_encode(array("message"=>"Email is required!","status"=>false));
		die;
	}

	//**End of Getting Data*****//


	//**Start of Get Users*******//
	extract($_POST);
	$query  = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE `user_id`=".$id;
	$result = $db->executeQuery($query);
	//**End of Get Users******//


	//**Start of Show Result*****//
	if($result)
	{
		echo json_encode(array("message"=>"User Update Successfully!","status"=>true));
	}else
	{
		echo json_encode(array("message"=>"Failed","status"=>false));
	}
	//**End of Show Result*****//


?>