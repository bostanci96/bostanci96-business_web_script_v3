<?php
## Sayfa Ekle
if($_GET["p"]=="sayfa_ekle"){
	
	$sayfa_adi 			= p("sayfa_adi");
	$sayfa_url 			= sef_link($sayfa_adi);
	$sayfa_desc 		= p("sayfa_desc");
	$sayfa_icerik 		= p("sayfa_icerik");
	$secenekHaber 		= p("secenekHaber");
	@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$sayfa_adi){
		echo 'bos-deger';
	}else{
		
		$insert =$db->query("INSERT INTO sayfalar SET 
			sayfa_adi 		= '$sayfa_adi',
			sayfa_url 		= '$sayfa_url',
			sayfa_desc 		= '$sayfa_desc',
			sayfa_icerik 	= '$sayfa_icerik',
			secenekHaber 	= '$secenekHaber',
			sayfa_durum 	= 1");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/sayfa_resim_add.php");
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Sayfa Düzenle
if($_GET["p"]=="sayfa_edit"){
	$sayfa_id 			= p("sayfa_id");
	$sayfa_adi 			= p("sayfa_adi");
	$sayfa_url 			= sef_link($sayfa_adi);
	$sayfa_desc 		= p("sayfa_desc");
	$sayfa_icerik 		= p("sayfa_icerik");

	$en_sayfa_adi 			= p("en_sayfa_adi");
	$en_sayfa_desc 			= p("en_sayfa_desc");
	$en_sayfa_icerik 		= p("en_sayfa_icerik");

	$ar_sayfa_adi 			= p("ar_sayfa_adi");
	$ar_sayfa_desc 			= p("ar_sayfa_desc");
	$ar_sayfa_icerik 		= p("ar_sayfa_icerik");

	$fa_sayfa_adi 			= p("fa_sayfa_adi");
	$fa_sayfa_desc 			= p("fa_sayfa_desc");
	$fa_sayfa_icerik 		= p("fa_sayfa_icerik");

	$secenekHaber 		= p("secenekHaber");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];

	if(!$sayfa_adi){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE sayfalar SET 
			sayfa_adi 		= '$sayfa_adi',
			sayfa_url 		= '$sayfa_url',
			sayfa_desc 		= '$sayfa_desc',
			secenekHaber 	= '$secenekHaber',
			en_sayfa_adi    = '$en_sayfa_adi',
			fa_sayfa_adi    = '$fa_sayfa_adi',
			ar_sayfa_adi    = '$ar_sayfa_adi',
			en_sayfa_desc    = '$en_sayfa_desc',
			fa_sayfa_desc    = '$fa_sayfa_desc',
			ar_sayfa_desc    = '$ar_sayfa_desc',
			ar_sayfa_icerik    = '$ar_sayfa_icerik',
			fa_sayfa_icerik    = '$fa_sayfa_icerik',
			en_sayfa_icerik    = '$en_sayfa_icerik',
			sayfa_icerik 	= '$sayfa_icerik' WHERE sayfa_id='$sayfa_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/sayfa_resim_edit.php");
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}

	}
}

#Sayfa Fotoğrafı Sil

if($_GET["p"]=="sayfa_foto_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM pageimages WHERE resim_id='$id'");
	if($kontrol->rowCount()){
		foreach($kontrol as $imgGetir){
			$buyukResim = "../images/sayfalar/big/".$imgGetir["img"];
			$kucukResim = "../images/sayfalar/thumb/".$imgGetir["img"];
			if(is_file($buyukResim)){unlink($buyukResim);}
			if(is_file($kucukResim)){unlink($kucukResim);}
		}
		$delete = $db->query("DELETE FROM pageimages WHERE resim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Toplu Sayfa Sil

if($_GET["p"]=="toplu_sayfa_sil"){
	@$sayfaPost = $_POST["id"];
	if(!$sayfaPost){
		echo 'bos-deger';
	}else{
		foreach($sayfaPost as $sayfaID){
			$kontrol = $db->query("SELECT * FROM sayfalar WHERE sayfa_id='$sayfaID'");
			if($kontrol->rowCount()){
				$imgKontrol = $db->query("SELECT * FROM pageimages WHERE pageId='$sayfaID'");
				if($imgKontrol->rowCount()){
					foreach($imgKontrol as $imgGetir){
						$imgID = $imgGetir["resim_id"];
						$buyukResim = "../images/sayfalar/big/".$imgGetir["img"];
						$kucukResim = "../images/sayfalar/thumb/".$imgGetir["img"];
						if(is_file($buyukResim)){unlink($buyukResim);}
						if(is_file($kucukResim)){unlink($kucukResim);}
						$deleteImg = $db->query("DELETE FROM pageimages WHERE resim_id='$imgID'");
					}
				}else{
					//
				}
				$delete = $db->query("DELETE FROM sayfalar WHERE sayfa_id='$sayfaID'");
			}else{

			}
		}
		echo 'basarili';
	}

}
#Tek Sayfa Sil 

if($_GET["p"]=="tek_sayfa_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM sayfalar WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/sayfalar/big/".$kontrolRow["sayfa_resim"];
		$kucukResim = "../images/sayfalar/thumb/".$kontrolRow["sayfa_resim"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM sayfalar WHERE sayfa_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

?>