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
		<h2><strong>Sosyal Medya Hesaplarınız</strong> düzenleniyor.</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=sosyal_medya"  enctype="multipart/form-data">
		<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Facebook Url</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="facebook_url" value="<?php echo $ayarRow["facebook_url"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Twitter Url</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="twitter_url" value="<?php echo $ayarRow["twitter_url"];?>">
				</div>
			</div>
 
			<div class="form-group" style="display: none;">
				<label for="input-text" class="col-sm-2 control-label">Instagram Url</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="instagram_url" value="<?php echo $ayarRow["instagram_url"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Youtube Url</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="google_url" value="<?php echo $ayarRow["google_url"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Linkedin Url</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="linkedin_url" ><?php echo $ayarRow["linkedin_url"];?></textarea>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Sosyal Medya Bilgilerini Güncelle !" name="btn_Check">
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
					text 	: "Sosyal Medya Bilgileriniz Güncellendi !",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else if(data=="degisiklik-yok"){
				sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
				return false;
			}else{
				sweetAlert(data,"Bir Hata Oluştu !","error");
				return false;
			}
		}
	});

});
</script>



