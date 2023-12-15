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
		<h2><strong>Seo Ayarlarınız</strong> düzenleniyor.</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=seo_ayarlari"  enctype="multipart/form-data">
		<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Site URL</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="site_url" value="<?php echo $ayarRow["site_url"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Site Title</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="site_title" value="<?php echo $ayarRow["site_title"];?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Site Description</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="site_desc" ><?php echo $ayarRow["site_desc"];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Site Keywords</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="site_keyw" ><?php echo $ayarRow["site_keyw"];?></textarea>
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">H1 H2 H3 Etiketleri</label>
			<div class="col-sm-9">
				<textarea class="ckeditor" id="bootstrapck" name="main_tablo"><?php echo $ayarRow["main_tablo"];?></textarea>
				<?php ckeditor('bootstrapck');?>
			</div>
		</div>	
			
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Seo Ayarlarını Güncelle !" name="btn_Check">
				</div>
			</div>
		</div>
	</form>
</div>
<script>
$(document).ready(function(event) {
	$('#forms').ajaxForm({
		beforeSerialize: function(form, options) { 
			for (instance in CKEDITOR.instances)
				CKEDITOR.instances[instance].updateElement();
		},
		success: function(data) {
			if(data=="bos-deger"){
				sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
				return false;
			}else if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Seo Ayarlarınız Güncellendi !",
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
				console.log(data);
				return false;
			}
		}
	});

});
</script>



