<?php

class User {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function login() {
		if(!isset($_POST['username']) || !isset($_POST['password'])){
			return false;

		}
		if($_POST['username']=='' || $_POST['password']==''){
			return false;

		}
		$data = array($_POST['username'],$_POST['password']);
		$postoji = $this->db->rawQuery("select * from user where username=? and password=?",$data);

		if(count($postoji)>0){
				$_SESSION['user'] = $postoji[0];
				return true;
		}

		return false;

	}

	public function registracija() {
		if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['ime'])){
			return false;

		}
		if($_POST['username']=='' || $_POST['password']=='' || $_POST['ime']==''){
			return false;

		}
		$podaci = Array (
				"imePrezime" => trim($_POST['ime']),
				"username" => trim($_POST['username']),
                "password" => trim($_POST['password'])
		);
		$poslatiNaApi = json_encode($podaci);
			$zahtev = curl_init("http://localhost/ad/api/registracija");
			curl_setopt($zahtev, CURLOPT_POST, TRUE);
			curl_setopt($zahtev, CURLOPT_POSTFIELDS, $poslatiNaApi);
			curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, 1);
			$odgovor = curl_exec($zahtev);
			$odg = json_decode($odgovor);
			curl_close($zahtev);
			//var_dump($odgovor);

			if($odg == "OK") {
				return true;
			}
			else {
				return false;
			}
   }
}	

?>
