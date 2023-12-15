<?php
#Logout 
if($_GET["p"]=="logout"){
	session_destroy();
	go(ADMIN_URL."login.php");
}
##Login
if($_GET["p"]=="login"){
	$eposta   = p("username");
	$md5    = md5(p("password"));
	if(!$eposta || $eposta=="username" || !$md5 || $md5=="password"){
		echo '<h4 class="alert_error">Tüm alanların doldurulması zorunludur !!!</h4>';
	}else{
		$query = $db->prepare("SELECT * FROM uyeler WHERE uye_eposta=:eposta && uye_sifre=:sifre");
		$query -> execute(array(
			"eposta"      => $eposta,
			"sifre"     => $md5
			));
		if($query->rowCount()){
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$session = array(
				"login"     => true,
				"uye_id"    => $row["uye_id"],
				"uye_eposta"  => $row["uye_eposta"],
				"uye_adsoyad"	=> $row["uye_ad"]." ".$row["uye_soyad"]
				);
			session_olustur($session);
			echo '<h4 class="alert_success">Başarılı bir şekilde giriş yaptınız.</h4>';
			echo '<script type="text/javascript">window.location.reload();</script>';
		}else{
			echo '<h4 class="alert_error">Girmiş olduğunuz bilgilere ait herhangi bir kulanıcı kayıdı bulunmuyor.</h4>';
		}
	}
}else{
	if(empty($_SESSION["login"])){die("Erisim izniniz yok;");}
}
?>