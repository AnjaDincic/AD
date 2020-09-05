<?php
session_start();
if(!isset($_SESSION['user'])){
  $_SESSION['user'] = '';
}
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "ad";
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");
?>
