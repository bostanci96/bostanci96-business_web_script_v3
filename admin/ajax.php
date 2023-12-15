<?php
require_once("host/a.php");
require_once("app/app.login.php");
error_reporting(0);
require_once("app/app.sayfa.php");
require_once("app/app.uyeler.php");
require_once("app/app.kategoriler.php");
require_once("app/app.urunler.php");
require_once("app/app.menuler.php");
require_once("app/app.fotograflar.php");
require_once("app/app.ayarlar.php");

if($_GET["p"]=="urunSiraGuncelle"){
	$urun_id = p("urun_id");
	$sira_no = p("sira_no");
	$update = $db->prepare("UPDATE urunler SET urun_sira_no=:sira_no WHERE urun_id=:id");
	$update -> bindParam("sira_no",$sira_no,PDO::PARAM_INT);
	$update -> bindParam("id",$urun_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
?>