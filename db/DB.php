<?php 
	class DB{
		private $host = 'localhost';
		private $dbName= 'IS2COMHIS';
		private $username= 'root';
		private $password= '';


		public function __construct()
		{

		}
		public function getConnection()
		{
			$dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
			$conn = new PDO($dsn, $this->username);

			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $conn;
		}
	}
 ?>