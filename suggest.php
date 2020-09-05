<?php
if (!isset ($_GET["unos"])){
echo "Parametar unos nije prosleđen!";
} else {
$pomocna=$_GET["unos"];
include "konekcija2.php";
$sql="SELECT username FROM user WHERE username LIKE '$pomocna%'ORDER BY username";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows==0){
echo "U bazi ne postoji user koja počinje na " . $pomocna;
} else {
while($red = $rezultat->fetch_object()){
?>
<a href="#" onclick="place(this)"><?php  echo $red->username;?> </a>
<br/>
<?php
}
}
$mysqli->close();
}
?>
