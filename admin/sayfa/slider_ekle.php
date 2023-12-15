<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni </strong>Slayt Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_add"  enctype="multipart/form-data">
		<input type="hidden" name="fotograf_bolum" value="1" />
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Fotoğraf Başlığı</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc" placeholder="Fotoğraf başlığı örnek : Yeni Koleksiyonlar">
			</div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Fotoğraf Alt Başlığı</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc2" placeholder="Fotoğraf başlığı örnek : Yeni Koleksiyonlar">
			</div>
		</div>
	<!--	<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Uzun Açıklama</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Aciklama" name="fotograf_longDesc" placeholder="Fotoğrafa ait en fazla 140 karakterlik açıklama yazısı">
			</div>
		</div>	
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Button Linki</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Aciklama" name="fotograf_href" placeholder="İncele butonunun yönlendirileceği URL. ( Boş Bırakılabilir )">
			</div>
		</div>		-->			  
		<div class="form-group">
			<label class="col-sm-2 control-label">Ön Görsel</label>
			<div class="col-sm-9">
				<input type="file" class="btn btn-default" name="dosya[]" id="dosya[]" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-9">
				<button class="btn btn-success" type="submit">Şimdi Yayınla </button>
			</div>
		</div>
	</form>
</div>
<script>
$(document).ready(function(event) {
	$('#forms').ajaxForm({
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Slayt Yükleniyor. Lütfen Bekleyiniz",
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
					text 	: "Slayt Başarılı Bir Şekilde Eklendi",
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



