<?php
session_start();
ob_start();


$dbHost  	= "localhost";
$dbName 	= "utku_insaat";
$dbUser 	= "utku_insaat";
$dbPass 	= "48Zfo9a%";

try{
	$db = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";charset=utf8",$dbUser,$dbPass);
	$db->query("SET CHARACTER SET UTF8");
	$db->query("SET NAMES 'utf8'");
}catch(PDOException $e){
	print $e->getMessage();
	die();
}
$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$blokRow = $db->query("SELECT * FROM bloklar")->fetch(PDO::FETCH_ASSOC);
					

define("PATH",realpath("."));


define("URL",$ayar["site_url"]);

define("TEMA_URL",URL."tema/");

define("TEMA_INC","tema/");

define("ADMIN_URL",URL."admin/");

define("SITE",TRUE);

require_once("f.php");
?>
