<?php 
	
	//**Start of Session****//
	session_start();
	$hostName = $_SESSION['url'];
	//**End of Session****//

	//***Start of CURL********//
	require 'curl/curl.php';
	$ch = new Curl();
	//***End of CURL********//

	//***Start of Add User********//
	if(isset($_POST['add']))
	{
		extract($_POST);
		$hostName = $_SESSION['url'];

		$post = array(

			'name' => $name;
			'email' => $email;
		);

		$result = $ch->post($hostName.'/insert_user.php',$post);
		//***Start of Check Status*******//
		if($result->status == 1)
		{
			$_SESSION['success'] = $result->message;
			
		}else
		{
			$_SESSION['error'] = $result->message;
			
		}
		//***End of Check Status******//

		header('location:index.php');

	}
	//**End of Add User**********//


	//***Start of Delete User*******//
	if(isset($_GET['id']) && $_GET['delete'] == 'true')
	{
		
		//***Post Parameters*****//
		$post = array( 
			  'id'  => $_GET['id']
			);


		//**Start of Getting Result*****//
		$result = $ch->post($hostName.'/delete_user.php',$post);
		$result = json_decode($result);
		//**End of Getting Result******//
	
		//***Start of Check Status*******//
		if($result->status == 1)
		{
			$_SESSION['success'] = $result->message;
			
		}else
		{
			$_SESSION['error'] = $result->message;
			
		}
		//***End of Check Status******//

		header('location:index.php');
	}
	//***End of Delete User*******//


?>