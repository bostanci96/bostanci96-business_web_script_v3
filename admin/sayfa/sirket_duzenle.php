<?php 
echo !defined('ADMIN') ? die('error: 404 !') : null;
if(isset($_GET["id"])){
	$id = g("id");
	$slideControl = $db->prepare("SELECT * FROM fotograflar WHERE fotograf_id=:id");
	$slideControl->execute(array(
		"id"	=> $id
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
		<h2>Düzenleniyor -> <span style="text-decoration:underline"><?php echo $slideRow["fotograf_shortDesc"];?> </strong> düzenleniyor..</span>  </h2>
	</div>
	<ul id="demo5" class="nav nav-tabs nav-simple">
		<li class="active">
			<a href="#demo5-home" data-toggle="tab"><i class="fa fa-home"></i> <b>Referans Düzenle</b></a>
		</li>
		<li class="" >
			<a href="#demo5-resim" data-toggle="tab"><i class="fa fa-photo"></i> <b>Referans Galeri Resimleri</b></a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="demo5-home">
			<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_edit"  enctype="multipart/form-data">
				<input type="hidden" name="fotograf_bolum" value="<?php echo $slideRow["fotograf_bolum"];?>" />
				<input type="hidden" name="fotograf_id" value="<?php echo $slideRow["fotograf_id"];?>" />
				<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_src"];?>" />
				<ul id="demo5" class="nav nav-tabs nav-simple">
					<li class="active">
						<a href="#demo5-turkce" data-toggle="tab"><i class="fa fa-flag"></i> <b>TÜRKÇE</b></a>
					</li>
					<!--<li class="">
						<a href="#demo5-ingilizce" data-toggle="tab"><i class="fa fa-flag"></i> <b>İNGİLİZCE</b></a>
					</li>
					<li class="">
						<a href="#demo5-arapca" data-toggle="tab"><i class="fa fa-flag"></i> <b>ARAPÇA</b></a>
					</li>
					<li class="">
						<a href="#demo5-farsca" data-toggle="tab"><i class="fa fa-flag"></i> <b>FARSÇA</b></a>
					</li>-->
				</ul>
				<div class="tab-content">
					<div class="form-group">
							<label for="input-text" class="col-sm-3 control-label">Firma Site URL</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc2" value="<?php echo $slideRow["fotograf_shortDesc2"];?>" placeholder="http://www.wcmfactory.com.tr/">
							</div>
						</div>
					<div class="tab-pane fade active in" id="demo5-turkce">
						<div class="form-group">
							<label for="input-text" class="col-sm-3 control-label">Türkçe Firma Adı</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc" value="<?php echo $slideRow["fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Türkçe Firma Hakkında Açıklama</label>
							<div class="col-sm-8">
								<textarea class="ckeditor" id="bootstrapck" name="fotograf_longDesc"><?php echo $slideRow["fotograf_longDesc"];?></textarea>
								<?php ckeditor('bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-ingilizce">
						<div class="form-group">
							<label for="input-text" class="col-sm-3 control-label">İngilizce Firma Adı</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="Baslik" name="en_fotograf_shortDesc" value="<?php echo $slideRow["en_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">İngilizce Firma Hakkında Açıklama</label>
							<div class="col-sm-8">
								<textarea class="ckeditor" id="en_bootstrapck" name="en_fotograf_longDesc"><?php echo $slideRow["en_fotograf_longDesc"];?></textarea>
								<?php ckeditor('en_bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-arapca">
						<div class="form-group">
							<label for="input-text" class="col-sm-3 control-label">Arapça Firma Adı</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="Baslik" name="ar_fotograf_shortDesc" value="<?php echo $slideRow["ar_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Arapça Firma Hakkında Açıklama</label>
							<div class="col-sm-8">
								<textarea class="ckeditor" id="ar_bootstrapck" name="ar_fotograf_longDesc"><?php echo $slideRow["ar_fotograf_longDesc"];?></textarea>
								<?php ckeditor('ar_bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-farsca">
						<div class="form-group">
							<label for="input-text" class="col-sm-3 control-label">Farsça Firma Adı</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="Baslik" name="fa_fotograf_shortDesc" value="<?php echo $slideRow["fa_fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Farsça Firma Hakkında Açıklama</label>
							<div class="col-sm-8">
								<textarea class="ckeditor" id="fa_bootstrapck" name="fa_fotograf_longDesc"><?php echo $slideRow["fa_fotograf_longDesc"];?></textarea>
								<?php ckeditor('fa_bootstrapck');?>
							</div>
						</div>
					</div>

				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Firma Galeri Fotoğrafları</label>
					<div class="col-sm-8">
						<input type="file" class="btn btn-default" name="refgaleri[]" id="refgaleri[]" multiple />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Firma Logo</label>
					<div class="col-sm-8">
						<input type="file" class="btn btn-default" name="dosya[]" id="dosya[]" />
					</div>
					<div class="col-sm-4 col-sm-offset-2 control-label"><img src="../images/photos/big/<?php echo $slideRow["fotograf_src"];?>" width="100%" /></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<button class="btn btn-success" type="submit">Şimdi Yayınla </button>
					</div>
				</div>
			</form>

		</div>
		<div class="tab-pane fade " id="demo5-resim">
			<div class="gallery-wrap">
				<?php
				$imgQuery = $db->query("SELECT * FROM referansresim WHERE resim_fotograf_id='$id'");
				if($imgQuery->rowCount()){
					foreach($imgQuery as $imgRow){
						?>
						<div class="column">
							<div class="inner">
								<div class="img-frame danger">
									<a class="zooming" href="<?php echo URL;?>images/photos/thumb/<?php echo $imgRow["resim_src"];?>">
										<div class="img-wrap">
											<img src="<?php echo URL;?>images/photos/thumb/<?php echo $imgRow["resim_src"];?>" class="mfp-fade">
										</div>
										<div class="caption-hover danger">
											<a href="javascript:;" onclick="TekSil(<?php echo $imgRow["resim_id"];?>);">SİL</a>
										</div>
									</a>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>
				
			</div>
		</div>

	</div>

</div>
<script>
function TekSil(catId){
	$.post('ajax.php?p=tek_refresim_sil', {id: catId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Resim başarılı bir şekilde silinmiştir.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="basarisiz"){
			swal("Başarısız","Silinemedi","error");
			return false;
		}
	});
}
$(document).ready(function(event) {
	$('#forms').ajaxForm({
		beforeSerialize: function(form, options) { 
			for (instance in CKEDITOR.instances)
				CKEDITOR.instances[instance].updateElement();
		},
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Referans Güncelleniyor. Lütfen Bekleyiniz",
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
					text 	: "Referans Başarılı Bir Şekilde Güncellendi",
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



