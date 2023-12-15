<?php 
if(isset($_GET["url"])){
	$urlSef = $_GET["url"];
	$sayfaControl = $db->prepare("SELECT * FROM fotograflar WHERE fotograf_id=:id AND fotograf_durum=:durum");
	$sayfaControl ->bindParam("id",$urlSef,PDO::PARAM_STR,50);
	$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
	$sayfaControl -> execute();
	if($sayfaControl->rowCount()){
		$sirketRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
	}else{
		echo " 404 sayfa Bulunamadı Anasayfaya Yönlendiriliyorsunuz.";
		header("Refresh: 3; url=".URL."");exit();
	}
}else{
	echo " 404 sayfa Bulunamadı Anasayfaya Yönlendiriliyorsunuz.";
		header("Refresh: 3; url=".URL."");exit();
}
?>
<!DOCTYPE html>
<html class="scheme_original" lang="tr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<title><?php echo $sirketRow[$lehce."fotograf_shortDesc"]." - ".$ayar["site_title"];?></title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<meta name="description" itemprop="description" content="<?php echo $sayfaRow["sayfa_desc"];?>" />
	<meta name="keywords" itemprop="keywords" content="<?php echo $ayar["site_keyw"];?>" />
	<meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
	<meta name="classification" content="<?php echo $sirketRow[$lehce."fotograf_shortDesc"]." - ".$ayar["site_title"];?>" />
	<meta http-equiv="content-language" content="tr" />
	<meta name="distribution" content="Global" />
	<meta name="robots" content="all" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />
	<meta name="country" content="Türkiye" />
	<link rel="canonical" href="<?php echo URL;?>" />
	<meta property="og:title" content="<?php echo $sirketRow[$lehce."fotograf_shortDesc"]." - ".$ayar["site_title"];?>" />
	<meta property="og:locale" content="tr_TR" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php echo $sayfaRow["sayfa_desc"];?>" />
	<meta property="og:url" content="<?php echo URL;?>" />
	<meta property="og:site_name" content="<?php echo $sirketRow[$lehce."fotograf_shortDesc"]." - ".$ayar["site_title"];?>" />
	<meta content="telephone=no" name="format-detection">
	<link href="http://fonts.googleapis.com/css?family=Poppins:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic%7CLora:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic&amp;subset=latin,latin-ext&amp;" media="all" property="stylesheet" rel="stylesheet" type="text/css">
	<link href='<?php echo TEMA_URL;?>ast/css/fontello/css/fontello.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/instagram/sb-instagram.min.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/essgrid/ess-grid.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/revslider/rev-slider.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/woocommerce/woocommerce.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/style.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/colors.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/woocommerce/woocommerce-layout.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/woocommerce/plugin.woocommerce.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/animation.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/shortcodes.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/messages.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/magnific-popup/magnific-popup.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/js/vendor/swiper/swiper.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<link href='<?php echo TEMA_URL;?>ast/css/responsive.css' media='all' property="stylesheet" rel='stylesheet' type='text/css'>
	<style type="text/css">
		.alignright {
    float: left;
}
	</style>
</head>
<body class="body_style_wide body_filled scheme_original top_panel_show top_panel_over sidebar_hide sidebar_outer_show sidebar_outer_yes top_panel_fixed">
	<div id="page_preloader"></div>
	<div class="body_wrap">
		<div class="page_wrap">
			<?php require_once(TEMA_INC.'inc/head.php');?>
			<!--başlangıç-->
			

			<section class="top_panel_image top_panel_image_1">
				<div class="top_panel_image_hover"></div>
				<div class="top_panel_image_header">
					<h1 class="top_panel_image_title"><?php echo $sirketRow[$lehce."fotograf_shortDesc"];?></h1>
					<div class="breadcrumbs">
						<a class="breadcrumbs_item home" href="<?php echo URL;?>">Anasayfa</a> <span class="breadcrumbs_delimiter"></span> <a class="breadcrumbs_item home" href="<?php echo URL.$sayfaRow[$lehce."sayfa_url"]?>"><?php echo $sirketRow[$lehce."fotograf_shortDesc"];?></a>   
					</div>
				</div>
			</section>
		
<div class="body_wrap">
    <div class="page_wrap">
        <div class="top_panel_fixed_wrap" style="height: 183px;"></div>

        <div class="site-overlay"></div>

        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_excerpt">
                        <div class="post_featured">

                            <img style="width:800px;" class="hover_icon hover_icon_link" src="<?php echo URL; ?>/images/photos/big/<?php echo $sirketRow["fotograf_src"];?>" />
                        </div>
                        <div class="post_content">
                            <h3 class="post_title"><?php echo $sirketRow[$lehce."fotograf_shortDesc"];?></h3>

                            <div class="p ost_descr">
	<?php echo $sirketRow[$lehce."fotograf_longDesc"];?>
                                <div class="content_wrap">

                                    <div class="sc_section margin_bottom_large">
                                        <div class="sc_section_inner">
                                            <div class="sc_section_content_wrap" style="text-align: center;">
                                                <h3 class="sc_title sc_title_regular">Resim Galerisi</h3>


	<?php
		$urunID = $sirketRow["fotograf_id"];
				$imgQuery = $db->query("SELECT * FROM referansresim WHERE resim_fotograf_id='$urunID'");
				if($imgQuery->rowCount()){
					foreach($imgQuery as $imgRow){
						?>
                                                <figure class="sc_image image_size_1 alignright margin_top_tiny margin_bottom_tiny">
                                                    <a href="<?php echo URL;?>images/photos/big/<?php echo $imgRow["resim_src"];?>"><img alt="<?php echo $urunRow["fotograf_shortDesc"];?>" src="<?php echo URL;?>images/photos/big/<?php echo $imgRow["resim_src"];?>"></a>
                                                </figure>
									<?php
					}
				}
				?>





                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
</div>
</div>
</div>
                </div>
			<?php require_once(TEMA_INC.'inc/footer.php');?>
		</div>
	</div>
	<div class="popup_wrap_bg"></div>
	<a class="scroll_to_top icon-up" href="#" title="Scroll to top"></a>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/jquery.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/jquery-migrate.min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/essgrid/jquery.themepunch.tools.min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/essgrid/jquery.themepunch.essential.min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/revslider/jquery.themepunch.revolution.min.js' type='text/javascript'></script>
	<script src="<?php echo TEMA_URL;?>ast/js/vendor/revslider/revolution.extension.slideanims.min.js" type="text/javascript"></script>
	<script src="<?php echo TEMA_URL;?>ast/js/vendor/revslider/revolution.extension.layeranimation.min.js" type="text/javascript"></script>
	<script src="<?php echo TEMA_URL;?>ast/js/vendor/revslider/revolution.extension.navigation.min.js" type="text/javascript"></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/instagram/sb-instagram.min.js' type='text/javascript'></script>
	<script src="<?php echo TEMA_URL;?>ast/js/custom/custom.js" type="text/javascript"></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/superfish.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_utils.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_init.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_debug.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_googlemap.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/template.init.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/mediaelement/mediaelement-and-player.min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_shortcodes.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/custom/_messages.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/magnific-popup/jquery.magnific-popup.min.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/js/vendor/swiper/swiper.js' type='text/javascript'></script>
	<script src='<?php echo TEMA_URL;?>ast/http://maps.google.com/maps/api/js?key=' type='text/javascript'></script>
</body>
</html>
