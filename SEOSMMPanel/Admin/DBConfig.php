<?php	
	class DBConfig{
		private $host = "localhost";
		private $username = "root";
		private $pass = "";
		private $dbname ="panel";
		protected $con;

		public function __construct(){
			if(!isset($this->con)){
				$this->con = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
				if (!$this->con) {
					echo "Connection Problem";
					exit;
				}
			}
			return $this->con;
		}
	}
?>