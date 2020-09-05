<?php
include("konekcija.php");
$kategorija = $_GET['id'];
if($kategorija == 0){
  $sql= "select * from clanak c join kategorija k on c.kategorijaID=k.kategorijaID join autor a on c.autor=a.autorID order by datum desc";

}else{
  $sql= "select * from clanak c join kategorija k on c.kategorijaID=k.kategorijaID join autor a on c.autor=a.autorID where k.kategorijaID=".$kategorija." order by datum desc";

}

$podaci = $db->rawQuery($sql);

echo(json_encode($podaci));
 ?>