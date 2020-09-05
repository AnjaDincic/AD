<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	die("Prodavnica ski opreme");
});

Flight::register('db', 'Database', array('ad'));


Flight::route('GET /kategorije', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->kategorije();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});


Flight::route('GET /korisnici', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->korisnici();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /registracija', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->ubaciKorisnika($json_data);
	if($db->getResult())
	{
		$response = "OK";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::route('DELETE /kategorije/@id', function($id){
		header ("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		if ($db->delete("kategorija", array("id"),array($id))){
				$odgovor["poruka"] = "Kategorija je uspešno izbrisana";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
		} else {
				$odgovor["poruka"] = "Došlo je do greške prilikom brisanja kategorije";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
		
		}		


});



Flight::start();
?>
