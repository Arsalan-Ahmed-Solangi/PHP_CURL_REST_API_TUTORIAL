<?php 


	//***Start of CURL********//
	class Curl
	{
		//***Start of Variables*******//	
		private $response;
		private $init;
		private $error;
		//**End of Variables********//

		//**Start of Constructor******//
		public function __construct()
		{
			$this->init = curl_init();
		}
		//**End of Constructor*******//


		//***Start of Get Request*********//
		public function get($url)
		{

			curl_setopt($this->init,CURLOPT_URL ,$url);
			curl_setopt($this->init,CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($this->init, CURLOPT_RETURNTRANSFER,true);
			$this->response =  curl_exec($this->init);

			//**Start of Check Error*****//
			$this->checkError();
			//**End of Check Error******//


			return $this->response;
		}
		//***End of Get Request*********//


		//***Start of Post Request********//
		public function post($url,$data = array(),$headers = array())
		{
			curl_setopt($this->init,CURLOPT_URL ,$url);
			curl_setopt($this->init,CURLOPT_SSL_VERIFYPEER,false);

			//**start of setting post request and its' parameter******//
			curl_setopt($this->init, CURLOPT_POST, 1);
			curl_setopt($this->init, CURLOPT_POSTFIELDS, $data);
			//**end of setting post request and its' parameter******//


			//***Start of Headers******//
			if(!empty($headers))
			{
				curl_setopt($this->init, CURLOPT_HTTPHEADER,$headers);
			}
			//***End of Headers*******//

			curl_setopt($this->init, CURLOPT_RETURNTRANSFER,true);
			$this->response =  curl_exec($this->init);

			//**Start of Check Error*****//
			$this->checkError();
			//**End of Check Error******//

			return $this->response;
		}
		//***End of Post Request********//


		//**Start of checkError******//
		public function checkError()
		{
			curl_setopt($this->init, CURLOPT_FAILONERROR, true);

			if (curl_errno($this->init)) {

			    $this->error = curl_error($this->init);
			}

			if(isset($this->error))
			{
			  print_r($this->error);
			  die;
			}
		}
		//**End of checkError******//

		//***Start of Destructor******//
		public function __destruct()
		{
			curl_close($this->init);
		}
		//***End of Destructor*******//
	}
	//***End of CURL********//

?>