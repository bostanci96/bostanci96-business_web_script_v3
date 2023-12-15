<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni </strong>Kullanıcı Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=uye_add"  enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Adınız</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Baslik" name="uye_ad" placeholder="Örn: Ahmet">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Soyadınız</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Baslik" name="uye_soyad" placeholder="Örn: Karaca" >
				</div>
			</div>
			

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Şifre</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="Baslik" name="uye_sifre" placeholder="********">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Şifre Tekrar</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="Baslik" name="uye_sifre_tekrar" placeholder="********">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">E-Posta</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Baslik" name="uye_eposta" placeholder="Örn: user@domain.com">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Cep Tel:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Baslik" name="uye_telefon" placeholder="Örn: 5531025467">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Sabit Tel:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Baslik" name="uye_sabit" placeholder="Örn: 2124445577">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Üyeyi Kaydet !" name="sayfa_adi">
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(event) {
	$('#forms').ajaxForm({
		
		success: function(data) {
			if(data=="bos-deger"){
				sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
				return false;
			}else if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Üye Başarılı Bir Şekilde Eklendi",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else if(data=="sifreler-uyusmuyor"){
				sweetAlert("Hata","Şifreler Uyuşmuyor","warning");
				return false;
			}else if(data=="kullanici-var"){
				sweetAlert("Hata","Bu Kullanıcı Adı Alınmış","warning");
				return false;
			}
			else if(data=="eposta-alinmis"){
				sweetAlert("Hata","Bu Mail Adresi Alınmış","warning");
				return false;
			}else if(data=="gecersiz-eposta"){
				sweetAlert("Hata","Geçerli Bir Eposta Girin","warning");
				return false;
			}else{
				sweetAlert(data,"Bir Hata Oluştu !","error");
				return false;
			}
		}
	});

});
</script>



