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
			<a href="#demo5-home" data-toggle="tab"><i class="fa fa-home"></i> <b>Proje Düzenle</b></a>
		</li>
		<li class="">
			<a href="#demo5-resim" data-toggle="tab"><i class="fa fa-photo"></i> <b>Proje Galeri Resimleri</b></a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="demo5-home">
			<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_edit"  enctype="multipart/form-data">
			
				<input type="hidden" name="fotograf_id" value="<?php echo $slideRow["fotograf_id"];?>" />
				<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_src"];?>" />

		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Bölüm Seçiniz</label>
			<div class="col-sm-9">
				<select name="fotograf_bolum" class="form-control">
					<option value="2" <?php echo $slideRow["fotograf_bolum"]==2 ? 'selected' : null; ?>>Devam Eden Proje Olsun</option>
					<option value="5" <?php echo $slideRow["fotograf_bolum"]==5 ? 'selected' : null; ?>>Biten Proje Olsun</option>
				</select>
			</div>
		</div>
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">Proje Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="fotograf_shortDesc" value="<?php echo $slideRow["fotograf_shortDesc"];?>" placeholder="Firma Adı Ltd. Şti. Vs">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"> Hakkında Açıklama</label>
					<div class="col-sm-10">
						<textarea class="ckeditor" id="bootstrapck" name="fotograf_longDesc"><?php echo $slideRow["fotograf_longDesc"];?></textarea>
						<?php ckeditor('bootstrapck');?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2 control-label">Proje Galeri Fotoğrafları</label>
					<div class="col-sm-9">
						<input type="file" class="btn btn-default" name="refgaleri[]" id="refgaleri[]" multiple />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"> Ana Görsel</label>
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
				text : "Proje Güncelleniyor. Lütfen Bekleyiniz",
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
					text 	: "Proje Başarılı Bir Şekilde Güncellendi",
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



