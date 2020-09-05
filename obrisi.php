<?php
include('konekcija.php');
$id = $_GET['id'];
$db-> where("clanakID",$id);
$db -> delete('clanak');
header("Location: izmenaBrisanje.php");
 ?>