<?php
echo !defined("SITE") ? die("error !") : null; 
$sayfaurl = $_SERVER['REQUEST_URI'];
$new = substr($sayfaurl,0,4);
if($new=="/ru/" || $new=="/en/" || $new=="/ar/"){
	$newdil = substr($new,1,2);
	$_SESSION["dil"] = $newdil;	
}else{$newdil='';}
$dil = $newdil;
if(!$dil || $dil=="" || $dil==" " || !$_SESSION["dil"] || $_SESSION["dil"]=="" || $_SESSION["dil"]==" " || $dil=="tr"){
	$lehce='';
	$blokLehce ='';
	define("LURL",URL);
	require_once(TEMA_INC.'lang/tr.php');
}else{
	$lehce=$dil.'_';
	$blokLehce='_'.$dil;
	define("LURL",URL.$dil."/");
	require_once(TEMA_INC.'lang/'.$dil.'.php');
}
if($lehce == "ru_"){
	$lehce = "fa_";
	$blokLehce='_fa';
}
if(isset($_GET["do"])){
	$do = g("do");
	$file = TEMA_INC.'sayfa/'.$do.'.php';
	if(file_exists($file)){
		require_once($file);
	}else{
		require_once(TEMA_INC."sayfa/default.php");
	}
}else{
	require_once(TEMA_INC."sayfa/default.php");
}
?> 