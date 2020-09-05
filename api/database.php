<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "ad";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

		function ubaciKorisnika($data) {
			$mysqli = new mysqli("localhost", "root", "", "ad");

			$imeIPrezime = mysqli_real_escape_string($mysqli,$data['imePrezime']);
			$korisnickoIme = mysqli_real_escape_string($mysqli,$data['username']);
			$lozinka = mysqli_real_escape_string($mysqli,$data['password']);


			$values = "('".$imeIPrezime."','".$korisnickoIme."','".$lozinka."')";

			$query = 'INSERT into user (imePrezime, username, password) VALUES '.$values;

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}


	function kategorije() {
		$mysqli = new mysqli("localhost", "root", "", "ad");
		$mysqli->set_charset("utf8");
		$q = 'SELECT * FROM kategorija ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function redakcija() {
		$mysqli = new mysqli("localhost", "root", "", "ad");
		$mysqli->set_charset("utf8");
		$q = 'SELECT * FROM redakcija ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	
	function korisnici() {
		$mysqli = new mysqli("localhost", "root", "", "ad");
		$mysqli->set_charset("utf8");
		$q = 'select * from user';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}


	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
