<?php

class Clanak {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function unesiClanak() {
		if(!isset($_POST['naslov']) || !isset($_POST['tekst']) || !isset($_POST['slika']) || !isset($_POST['datum']) || !isset($_POST['kategorijaID']) || !isset($_POST['autor'])){
			return false;
		}

		
		if($_POST['naslov']=='' || $_POST['tekst']=='' || $_POST['slika']=='' || $_POST['datum']=='' || $_POST['kategorijaID']=='' || $_POST['autor']==''){
			return false;

		}


			$data = Array (
					
					"naslov" => trim($_POST['naslov']),
					"tekst" => trim($_POST['tekst']),
					"slika" => trim($_POST['slika']),
					"datum" => trim($_POST['datum']),
					"kategorijaID" => trim($_POST['kategorijaID']),
					"autor" => trim($_POST['autor'])
			);

			$sacuvano = $this->db->insert('clanak', $data);

			if($sacuvano) {
			return true;

			}
			else {
				return false;
			}



	}
	
	public function izmeniClanak($id) {
		
			$data = Array (
					
					"naslov" => trim($_POST['naslov']),
					"tekst" => trim($_POST['tekst']),
					"slika" => trim($_POST['slika']),
					"datum" => trim($_POST['datum']),
					"kategorijaID" => trim($_POST['kategorijaID']),
					"autor" => trim($_POST['autor']),
					trim($id)
					
			);
			$izmenjeno = $this->db->rawQuery("Update clanak set naslov = ?, tekst = ?, slika = ?, datum = ?,kategorijaID = ?,autor = ? where clanakID=?",$data);

			
			return true;

			}
		
	

}

?>
