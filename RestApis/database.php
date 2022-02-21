<?php 

	//***start of class******//
	class Database
	{
		//***start of variables*****//
		private $db_host = "localhost";
		private $db_user = "root";
		private $db_pass = "";
		private $db_name = "php_curl_tutorial";
		private $connection_status = null;
		private $result = null;
		private $query = null;
		//***end of variables******//

		//***start of Constructor*******//
		public function __construct()
		{
			$this->connection_status  = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

			if(mysqli_connect_errno()){
				echo "Database Failed to connect".mysqli_connect_error();
			}
		}
		//***end of constructor********//


		//**start of ExecuteQuery****//
		public function executeQuery($query)
		{
			$this->query = $query;
			$this->result=  mysqli_query($this->connection_status,$this->query);
			return $this->result;
		}
		//**end of ExectueQuery*****//

		//***start of Last Id*****//
		public function getLastId()
		{
			return mysqli_insert_id($this->connection_status);
		}
		//***end of Last Id******//


		//***start of Destructor********//
		public function __destruct()
		{
			mysqli_close($this->connection_status);
		}
		//***End of Destructor********//
	}
	//***end of class*******//

?>