<?php
echo !defined('ADMIN') ? die('error: 404 !') : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	die('error: 302 !');
}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>İletişim Bilgileriniz</strong> düzenleniyor.</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=iletisim_bilgileri"  enctype="multipart/form-data">
		<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">E-Posta Adresi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email" value="<?php echo $ayarRow["email"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Sabit Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="telefon" value="<?php echo $ayarRow["telefon"];?>">
				</div>
			</div>

			<div class="form-group" style="display: none;">
				<label for="input-text" class="col-sm-2 control-label">Cep Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="gsm" value="<?php echo $ayarRow["gsm"];?>">
				</div>
			</div>

			<div class="form-group" style="display: none;">
				<label for="input-text" class="col-sm-2 control-label">Faks No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="faks" value="<?php echo $ayarRow["faks"];?>">
				</div>
			</div>

			<div class="form-group" style="display: none;">
				<label for="input-text" class="col-sm-2 control-label">Harita (koordinat veya iframe)</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="google_maps" value="<?php echo $ayarRow["google_maps"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Firma Adres</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="adres" ><?php echo $ayarRow["adres"];?></textarea>
				</div>
			</div>


			<!--<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 1 Adres</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="adres2" ><?php// echo $ayarRow["adres2"];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 1 Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="telefon2" value="<?php //echo $ayarRow["telefon2"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 2 E-Posta Adresi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email2" value="<?php// echo $ayarRow["email2"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 2 Adres</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="adres3" ><?php// echo $ayarRow["adres3"];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 3 Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="telefon3" value="<?php// echo $ayarRow["telefon3"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 3 E-Posta Adresi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email3" value="<?php// echo $ayarRow["email3"];?>">
				</div>
			</div>-->
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="İletişim Bilgilerini Güncelle !" name="btn_Check">
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
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","warning");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "İletişim Bilgileriniz Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="degisiklik-yok"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else if(data=="gecersiz-eposta"){
					sweetAlert("Uyarı","Geçerli bir e-Posta adresi giriniz !","warning");
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



