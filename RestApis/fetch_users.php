<?php 


	//**Start of Headers*****//
	header('Content-Type: application/json');
	header('Allow-Control-Access-Origin: *');
	//**End of Headers******//

	//***Start of Database ********//
	require 'database.php';
	$db = new Database();
	//**End of Dataabse*********//


	//***Start of Query*********//
	$sql = "SELECT * FROM `users`";
	$result = $db->executeQuery($sql);
	//***End of Query**********//


	//***Start of Fetch Result********//
	if(mysqli_num_rows($result) > 0)
	{
		echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
	}else{
		echo json_encode(array('messsage'=>'No Users Found','status'=>'false'));
	}
	//***End of Fetch Result********//

?>