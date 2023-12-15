<?php 
echo !defined('ADMIN') ? die('error: 404 !') : null;
if(isset($_GET["id"])){
	$id = g("id");
	$slideControl = $db->prepare("SELECT * FROM fotograflar WHERE fotograf_id=:id && fotograf_bolum=:bolum");
	$slideControl->execute(array(
		"id"	=> $id,
		"bolum"	=>3
		));
	if($slideControl->rowCount()){
		$slideRow = $slideControl->fetch(PDO::FETCH_ASSOC);
	}else{
		die('error: 302 !');
	}
}else{
	die('error:302 !');
}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Galeri Fotoğrafı Düzenleniyor</strong></h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_edit"  enctype="multipart/form-data">
		<input type="hidden" name="fotograf_bolum" value="3" />
		<input type="hidden" name="fotograf_id" value="<?php echo $slideRow["fotograf_id"];?>" />
		<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_src"];?>" />
		<ul id="demo5" class="nav nav-tabs nav-simple">
			<li class="active">
				<a href="#demo5-turkce" data-toggle="tab"><i class="fa fa-flag"></i> <b>TÜRKÇE</b></a>
			</li>
		<!--	<li class="">
				<a href="#demo5-ingilizce" data-toggle="tab"><i class="fa fa-flag"></i> <b>İNGİLİZCE</b></a>
			</li>
			<li class="">
				<a href="#demo5-arapca" data-toggle="tab"><i class="fa fa-flag"></i> <b>ARAPÇA</b></a>
			</li>
			<li class="">
				<a href="#demo5-farsca" data-toggle="tab"><i class="fa fa-flag"></i> <b>RUSÇA</b></a>
			</li>-->
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="demo5-turkce">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">Türkçe Fotoğraf Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc" value="<?php echo $slideRow["fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-ingilizce">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">İngilizce Fotoğraf Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="en_fotograf_shortDesc" value="<?php echo $slideRow["en_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-arapca">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">Arapça Fotoğraf Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="ar_fotograf_shortDesc" value="<?php echo $slideRow["ar_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-farsca">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">Farsça Fotoğraf Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="fa_fotograf_shortDesc" value="<?php echo $slideRow["fa_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Galeri Fotoğrafı</label>
			<div class="col-sm-9">
				<input type="file" class="btn btn-default" name="dosya[]" id="dosya[]" />
			</div>
			<div class="col-sm-4 col-sm-offset-2 control-label"><img src="../images/photos/big/<?php echo $slideRow["fotograf_src"];?>" width="100%" /></div>
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
				text : "Fotoğraf Güncelleniyor. Lütfen Bekleyiniz",
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
					text 	: "Fotoğraf Başarılı Bir Şekilde Güncellendi",
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



