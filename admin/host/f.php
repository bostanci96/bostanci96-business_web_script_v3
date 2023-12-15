<?php 

function p($par,$st=false){
	return str_replace(array("'", "\""), array("&#39;", "&quot;"), trim($_POST[$par]));
	if($st){
		return str_replace(array("'", "\""), array("&#39;", "&quot;"), addslashes(htmlspecialchars($_POST[$par])));
	}else{
		return str_replace(array("'", "\""), array("&#39;", "&quot;"), addslashes(trim($_POST[$par])));
	}
}
function etiket_url_donustur($post){
	$parcala = str_word_count($post,1," ıİüÜöÖğĞçÇşŞ1234567890");
	$dizi = '';
	foreach($parcala as $etiket){
		$etiket = sef_link($etiket);
		$dizi.=$etiket.",";
	}
	$dizi = rtrim($dizi,",");
	return $dizi;
}
function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		if (strstr($ip, ',')) {
			$tmp = explode (',', $ip);
			$ip = trim($tmp[0]);
		}
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}
function alert($string){
	echo '<h4 class="alert_error">'.$string.'</h4>';
}

function success($string){
	echo '<h4 class="alert_success">'.$string.'</h4>';
}
function g($par){
	return strip_tags(trim(addslashes($_GET[$par])));
}

function kisalt($par,$uzunluk=600){
	if(strlen($par)>$uzunluk){
		$par = mb_substr($par, 0 , $uzunluk,"UTF-8")."...";
	}
	return $par;
}

function go($par,$time=0){
	if($time==0){
		header("Location:{$par}");
	}else{
		header("Refresh:$time; url={$par}");
	}
}

function session($par){
	if($_SESSION[$par]){
		return $_SESSION[$par];
	}else{
		return false;
	}
}

function cookie($par)
{
	if(isset($_COOKIE[$par]))
	{
		return $_COOKIE[$par];
	}
	else
	{
		return false;
	}
}

function ss($par){
	return stripslashes($par);
}

function session_olustur($par){
	foreach($par as $anahtar => $deger){
		$_SESSION[$anahtar] = $deger;
	}
}

function sef_link($string)
{
	$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
	$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
	$string = strtolower(str_replace($find, $replace, $string));
	$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
	$string = trim(preg_replace('/\s+/', ' ', $string));
	$string = str_replace(' ', '-', $string);
	$string = str_replace('.', '',$string);
	return $string;
}


function tarih($par){
	$ay			= substr($par,5,2);
	$eski_ay  = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$yeni_ay  = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
	return substr($par,8,2).' '.str_replace($eski_ay,$yeni_ay,$ay).' '.substr($par,0,4);
}

function ckeditor($editorName="editor1"){
	
	echo "<script type='text/javascript' language='javascript'>
	CKEDITOR.replace('".$editorName."',{
		filebrowserWindowWidth : '900',
		filebrowserWindowHeight : '500',
		filebrowserBrowseUrl : '".ADMIN_URL."assets/libs/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '".ADMIN_URL."assets/libs/ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '".ADMIN_URL."assets/libs/ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '".ADMIN_URL."assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '".ADMIN_URL."assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '".ADMIN_URL."assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',	
	});
</script>";
}
?>