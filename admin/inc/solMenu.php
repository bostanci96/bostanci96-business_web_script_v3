<?php echo !defined("ADMIN") ? die('error: 404 !') : null; ?>
<?php
function classActive($par=null,$get=null){
	if($par==$get){
		echo 'active';
	}
}
?>
<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div class="clearfix"></div>
		<!--- Profile -->
		<div class="profile-info">

			<div class="col-xs-12">
				<center>
					<div class="profile-text"><?php echo $_SESSION["uye_adsoyad"];?></div>
					<div class="profile-buttons">
						<a href="ajax.php?p=logout" title="Çıkış Yap"><i class="fa fa-power-off text-red-1"></i></a>
					</div>
				</center>
			</div>
		</div>
		<!--- Divider -->
		<div class="clearfix"></div>
		<hr class="divider" />
		<div class="clearfix"></div>
		<!--- Divider -->
		<div id="sidebar-menu">
			<ul>

				<li class='has_sub'><a href='javascript:void(0);'><i class='icon-book-open-1'></i><span>Sayfalar</span> </a>
					<ul>
						<li><a href='index.php?sayfa=sayfalar' class='<?php classActive('sayfalar',@$_GET['sayfa']);?>'><span>Tüm Sayfalar</span></a></li>
						<li><a href='index.php?sayfa=sayfa_ekle'    class='<?php classActive('sayfa_ekle',@$_GET['sayfa']);?>'><span>Yeni Ekle</span></a></li>
					</ul>
				</li>
				

				
				<li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-picture-o'></i><span>Slayt Gösterisi</span> </a>
					<ul>
						<li><a href='index.php?sayfa=slider'  class='<?php classActive('slider',@$_GET['sayfa']);?>'><span>Tüm Sliderlar</span></a></li>
						<li><a href='index.php?sayfa=slider_ekle'  class='<?php classActive('slider_ekle',@$_GET['sayfa']);?>'><span>Slider Ekle</span></a></li>
					</ul>
				</li>



				<li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-group'></i><span>Proje Yönetimi</span> </a>
					<ul>
						<li><a href='index.php?sayfa=referanslar&bolum=2'  class='<?php classActive('referanslar&bolum=2',@$_GET['sayfa']);?>'><span>Devam Eden Proje</span></a></li>
						<li><a href='index.php?sayfa=referanslar&bolum=5'  class='<?php classActive('referanslar&bolum=5',@$_GET['sayfa']);?>'><span>Biten Proje</span></a></li>
						<li><a href='index.php?sayfa=referans_ekle'  class='<?php classActive('referans_ekle',@$_GET['sayfa']);?>'><span>Yeni Proje Ekle</span></a></li>
					</ul>
				</li>
				<li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-file-photo-o'></i><span>Galeri Yönetimi</span> </a>
					<ul>
						<li><a href='index.php?sayfa=galeri'  class='<?php classActive('galeri',@$_GET['sayfa']);?>'><span>Galeriyi Görüntüle</span></a></li>
						<li><a href='index.php?sayfa=galeri_ekle'  class='<?php classActive('galeri_ekle',@$_GET['sayfa']);?>'><span>Fotoğraf Ekle</span></a></li>
					</ul>
				</li>


				<li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-files-o'></i><span>Menü Yönetimi</span> </a>
					<ul>
						<li><a href='index.php?sayfa=menuler'  class='<?php classActive('menuler',@$_GET['sayfa']);?>'><span>Tüm Menüler</span></a></li>
						<li><a href='index.php?sayfa=menu_ekle'  class='<?php classActive('menu_ekle',@$_GET['sayfa']);?>'><span>Yeni Ekle</span></a></li>
					</ul>
				</li>
				<li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-user'></i><span>Kullanıcılar</span> </a>
					<ul>
						<li><a href='index.php?sayfa=kullanicilar' class='<?php classActive('kullanicilar',@$_GET['sayfa']);?>'><span>Tüm Kullanıcılar</span></a></li>
						<li><a href='index.php?sayfa=kullanici_ekle'    class='<?php classActive('kullanici_ekle',@$_GET['sayfa']);?>'><span>Yeni Ekle</span></a></li>
					</ul>
				</li>

				<li class='has_sub'><a href='javascript:void(0);'><i class='glyphicon glyphicon-wrench'></i><span>Ayarlar</span> </a>
					<ul>
						<li><a href='index.php?sayfa=ayarlar.anasayfa'  class='<?php classActive('ayarlar.anasayfa',@$_GET['sayfa']);?>'><span>Site Yazıları</span></a></li>
						<li><a href='index.php?sayfa=ayarlar.iletisim'  class='<?php classActive('ayarlar.iletisim',@$_GET['sayfa']);?>'><span>İletişim Bilgileri</span></a></li>
						<li><a href='index.php?sayfa=ayarlar.sosyalmedya'  class='<?php classActive('ayarlar.sosyalmedya',@$_GET['sayfa']);?>'><span>Sosyal Medya</span></a></li>
						<li><a href='index.php?sayfa=ayarlar.seo'  class='<?php classActive('ayarlar.seo',@$_GET['sayfa']);?>'><span>Seo Ayarları</span></a></li>
						<li><a href='index.php?sayfa=ayarlar.logo'  class='<?php classActive('ayarlar.logo',@$_GET['sayfa']);?>'><span>Logo</span></a></li>
					</ul>
				</li>
			</ul>                    
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div><br><br><br>
	</div>
	
</div>