<?php
## Logolar 
if($_GET["p"]=="logolar"){
	
	$logo 	= $_FILES["logo"]["tmp_name"][0];
	$footerLogo 	= $_FILES["footer_logo"]["tmp_name"][0];
	if(empty($logo) && empty($footerLogo)){
		echo "bos-deger";
	}else{
		require_once("app-upload/app.upload.php");
		if(strlen($logo)>3){
			require_once("app-upload/logo_edit.php");
		}
		if(strlen($footerLogo)>3){
			require_once("app-upload/footer_logo_edit.php");
		}
		if($updateSuccess || $updateSuccess2){
			echo "basarili";
		}else{
			echo "basarisiz";
		}
	}
}
if($_GET["p"]=="seo_ayarlari"){
	$ayar_id 		= p("ayar_id");
	$site_url 		= p("site_url");
	$site_title 	= p("site_title");
	$site_desc 		= p("site_desc");
	$site_keyw 		= p("site_keyw");
	$main_tablo 	= p("main_tablo");
	if(!$ayar_id || !$site_url || !$site_title || !$site_desc || !$site_keyw){
		echo 'bos-deger';
	}else{

		$updateSeo = $db->query("UPDATE ayarlar SET 
			site_url 	= '$site_url',
			site_title	= '$site_title',
			site_desc 	= '$site_desc',
			main_tablo  = '$main_tablo',
			site_keyw 	= '$site_keyw' WHERE ayar_id='$ayar_id'");

		if($updateSeo->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}
if($_GET["p"]=="anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="en_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar_en SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="ar_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar_ar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="fa_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$update = $db->query("UPDATE bloklar_fa SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="iletisim_bilgileri"){
	$ayar_id 		= p("ayar_id");
	$email 			= p("email");
	$telefon 		= p("telefon");
	$email2 			= p("email2");
	$telefon2 		= p("telefon2");
	$email3 			= p("email3");
	$telefon3 		= p("telefon3");
	$gsm 			= p("gsm");
	$faks 			= p("faks");
	$adres 			= p("adres");
	$adres2 			= p("adres2");
	$adres3 			= p("adres3");
	$google_maps 	= p("google_maps");
	if(!$ayar_id || !$email || !$telefon || !$gsm || !$faks || !$adres){
		echo 'bos-deger';
	}else{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'gecersiz-eposta';
		}else{
			$updateContact = $db->query("UPDATE ayarlar SET 
				email 		= '$email',
				telefon 	= '$telefon',
				email2 		= '$email2',
				telefon2 	= '$telefon2',
				email3 		= '$email3',
				telefon3 	= '$telefon3',
				gsm 		= '$gsm',
				google_maps = '$google_maps',
				faks 		= '$faks',
				adres 		= '$adres',
				adres2 		= '$adres2',
				adres3 		= '$adres3' WHERE ayar_id='$ayar_id'");
			if($updateContact->rowCount()){
				echo 'basarili';
			}else{
				echo 'degisiklik-yok';
			}
		}
	}
}
if($_GET["p"]=="sosyal_medya"){
	$ayar_id 		= p("ayar_id");
	$facebook_url 	= p("facebook_url");
	$twitter_url 	= p("twitter_url");
	$instagram_url 	= p("instagram_url");
	$google_url 	= p("google_url");
	$linkedin_url 	= p("linkedin_url");
	if(!$ayar_id || !$facebook_url || !$twitter_url || !$instagram_url || !$google_url || !$linkedin_url){
		echo 'bos-deger';
	}else{
		$updateSocial = $db->query("UPDATE ayarlar SET 
			facebook_url 	= '$facebook_url',
			twitter_url 	= '$twitter_url',
			instagram_url 	= '$instagram_url',
			google_url 		= '$google_url',
			linkedin_url 	= '$linkedin_url'
			WHERE ayar_id='$ayar_id'");
		if($updateSocial->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}

?>