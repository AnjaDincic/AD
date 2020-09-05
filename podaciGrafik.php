<?php
include 'konekcija.php';

	$array['cols'][] = array('label' => 'Autor','type' => 'string');
    $array['cols'][] = array('label' => 'Broj', 'type' => 'number');

		$sql="select count(c.clanakID) as broj,a.ImePrezimeAutor as autor from clanak c join autor a on c.autor=a.autorID group by c.autor";

		$n = $db->rawQuery($sql);
		foreach($n as $vrednost){
		 $array['rows'][] = array('c' => array( array('v'=>$vrednost['autor']),array('v'=>(int)$vrednost['broj']))) ;

		}

		$niz_json = json_encode ($array);
		print ($niz_json);




?>
