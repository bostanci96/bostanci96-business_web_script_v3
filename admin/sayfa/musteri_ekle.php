<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni Müşteri Yorumu</strong> Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_add"  enctype="multipart/form-data">
		<input type="hidden" name="fotograf_bolum" value="6" />
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Müşteri Adı</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc" placeholder="Ahmet X">
			</div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Müşteri Yorumu</label>
			<div class="col-sm-9">
				<textarea type="text" class="form-control" id="Baslik" name="fotograf_longDesc" placeholder="Hizmetinizden memnun kaldım vb."></textarea>
			</div>
		</div>						  
		<div class="form-group">
			<label class="col-sm-2 control-label">Fotoğraf ( 100x100 )</label>
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
				text : "Fotoğraf Yükleniyor. Lütfen Bekleyiniz",
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
					text 	: "Yorum Başarılı Bir Şekilde Eklendi",
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



