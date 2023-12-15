<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni </strong>Sayfa Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=sayfa_ekle"  enctype="multipart/form-data">
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Başlık</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Baslik" name="sayfa_adi" >
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Açıklama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Aciklama" name="sayfa_desc" >
				
			</div>
		</div>						  
		
		<div class="form-group">
			<label class="col-sm-2 control-label">İçerik</label>
			<div class="col-sm-10">
				<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"></textarea>
				<?php ckeditor('bootstrapck');?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Ön Görsel</label>
			<div class="col-sm-10">
				<input type="file" class="btn btn-default" title="Resim seç !" name="dosya[]" id="dosya[]" />
			</div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Sayfa Seçenekleri</label>
			<div class="col-sm-9">
				<select name="secenekHaber" class="form-control">
					<option value="0">Normal Sayfa Olsun</option>
					<option value="1">Haberlere Ekle</option>
				<!--	<option value="2">Hizmetlere Ekle</option>
					<option value="3">Anasayfada Kurumsal Alana Ekle</option>-->
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<button class="btn btn-success" type="submit">Şimdi Yayınla </button>
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
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Sayfa Fotoğrafları Yükleniyor. Lütfen Bekleyiniz",
				type : "info",
				closeOnConfirm : false,
				showLoaderOnConfirm:true,
			});
		},
		success: function(data) {
			if(data=="bos-deger"){
				sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
				return false;
			}else if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Sayfa Başarılı Bir Şekilde Eklendi",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else{
				sweetAlert(data,"Bir hata oluştu !","error");
				return false;
			}
		}
	});

});
</script>



