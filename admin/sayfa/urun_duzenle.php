<?php
echo !defined('ADMIN') ? die('error: 404 !') : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM urunler WHERE urun_id=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
	}else{
		die('error: 302 !');
	}
}else{
	die('error: 302 !');
}
function Kategori_Select($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1,$selID);
		}
	}
}

?>
<div class="widget">
	<div class="widget-header transparent">
		<h2>Düzenleniyor -> <span style="text-decoration:underline"><?php echo $catRow["urun_adi"];?> </strong> düzenleniyor..</span>  </h2>
		
		
	</div>
	<ul id="demo5" class="nav nav-tabs nav-simple">
		<li class="active">
			<a href="#demo5-home" data-toggle="tab"><i class="fa fa-home"></i> <b>Ürün Düzenle</b></a>
		</li>
		<li class="">
			<a href="#demo5-resim" data-toggle="tab"><i class="fa fa-photo"></i> <b>Resimler</b></a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="demo5-home">
			<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=urun_edit"  enctype="multipart/form-data">
				<ul id="demo5" class="nav nav-tabs nav-simple">
					<li class="active">
						<a href="#demo5-turkce" data-toggle="tab"><i class="fa fa-flag"></i> <b>TÜRKÇE</b></a>
					</li>
				<!--	<li class="">
						<a href="#demo5-ingilizce" data-toggle="tab"><i class="fa fa-flag"></i> <b>İNGİLİZCE</b></a>
					</li>
					<li class="">
						<a href="#demo5-farsca" data-toggle="tab"><i class="fa fa-flag"></i> <b>FARSÇA</b></a>
					</li>
					<li class="">
						<a href="#demo5-arapca" data-toggle="tab"><i class="fa fa-flag"></i> <b>ARAPÇA</b></a>
					</li>-->
				</ul>
				<input type="hidden" name="urun_id" value="<?php echo $catRow["urun_id"];?>" />
				
				<div class="tab-content">
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Ürün Kategori</label>
						<div class="col-sm-9">
							<select name="urun_populer" class="form-control">

								<option value="0" <?php echo $catRow["urun_populer"]==0 ? 'selected' : null; ?> >Popüler Olmasın</option>
								<option value="1" <?php echo $catRow["urun_populer"]==1 ? 'selected' : null; ?> >Popüler Ürün Olsun</option>

							</select>
						</div>
					</div>
					<div class="tab-pane fade active in" id="demo5-turkce">
						<div class="form-group">
							<label for="input-text" class="col-sm-2 control-label">Türkçe Ürün Adı</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Baslik" name="urun_adi" value="<?php echo $catRow["urun_adi"];?>">
							</div>
						</div>
						<div class="form-group">
							<label for="input-text-help" class="col-sm-2 control-label">Türkçe Ürün Desc ( SEO )</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Aciklama" name="urun_desc" value="<?php echo $catRow["urun_icerik"];?>" >

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Türkçe Ürün İçeriği</label>
							<div class="col-sm-9">
								<textarea class="ckeditor" id="bootstrapck" name="urun_icerik"><?php echo $catRow["urun_tam_icerik"];?></textarea>
								<?php ckeditor('bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-ingilizce">
						<div class="form-group">
							<label for="input-text" class="col-sm-2 control-label">İngilizce Ürün Adı</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Baslik" name="en_urun_adi" value="<?php echo $catRow["en_urun_adi"];?>">
							</div>
						</div>
						<div class="form-group">
							<label for="input-text-help" class="col-sm-2 control-label">İngilizce Ürün Desc ( SEO )</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Aciklama" name="en_urun_desc" value="<?php echo $catRow["en_urun_icerik"];?>" >

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"> İngilizce Ürün İçeriği</label>
							<div class="col-sm-9">
								<textarea class="ckeditor" id="en_bootstrapck" name="en_urun_icerik"><?php echo $catRow["en_urun_tam_icerik"];?></textarea>
								<?php ckeditor('en_bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-arapca">
						<div class="form-group">
							<label for="input-text" class="col-sm-2 control-label">Arapça Ürün Adı</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Baslik" name="ar_urun_adi" value="<?php echo $catRow["ar_urun_adi"];?>">
							</div>
						</div>
						<div class="form-group">
							<label for="input-text-help" class="col-sm-2 control-label">Arapça Ürün Desc ( SEO )</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Aciklama" name="ar_urun_desc" value="<?php echo $catRow["ar_urun_icerik"];?>" >

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"> Arapça Ürün İçeriği</label>
							<div class="col-sm-9">
								<textarea class="ckeditor" id="ar_bootstrapck" name="ar_urun_icerik"><?php echo $catRow["ar_urun_tam_icerik"];?></textarea>
								<?php ckeditor('ar_bootstrapck');?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="demo5-farsca">
						<div class="form-group">
							<label for="input-text" class="col-sm-2 control-label">Farsça Ürün Adı</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Baslik" name="fa_urun_adi" value="<?php echo $catRow["fa_urun_adi"];?>">
							</div>
						</div>
						<div class="form-group">
							<label for="input-text-help" class="col-sm-2 control-label">Farsça Ürün Desc ( SEO )</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Aciklama" name="fa_urun_desc" value="<?php echo $catRow["fa_urun_icerik"];?>" >

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"> Farsça Ürün İçeriği</label>
							<div class="col-sm-9">
								<textarea class="ckeditor" id="fa_bootstrapck" name="fa_urun_icerik"><?php echo $catRow["fa_urun_tam_icerik"];?></textarea>
								<?php ckeditor('fa_bootstrapck');?>
							</div>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">Üst Kategori</label>
					<div class="col-sm-9">
						<select name="urun_kategori" class="form-control">

							<option value="0">Ana Kategori Olsun</option>
							<?php Kategori_Select(0,0,$catRow["urun_kategori"]);?>

						</select>
					</div>
				</div>				  
				<div class="form-group">
					<label class="col-sm-2 control-label">Ürün Resmi</label>
					<div class="col-sm-9">
						<input type="file" class="btn btn-default" title="Resim seç !" name="dosya[]" id="dosya[]" />
						<!--<img src="../images/urunler/big/<?php echo $catRow["urun_resim"];?>" />-->
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

		<div class="tab-pane fade" id="demo5-resim">
			<div class="gallery-wrap">
				<?php
				$imgQuery = $db->query("SELECT * FROM urunresim WHERE resim_urun_id='$id'");
				if($imgQuery->rowCount()){
					foreach($imgQuery as $imgRow){
						?>
						<div class="column">
							<div class="inner">
								<div class="img-frame danger">
									<a class="zooming" href="<?php echo URL;?>images/urunler/thumb/<?php echo $imgRow["urun_img"];?>">
										<div class="img-wrap">
											<img src="<?php echo URL;?>images/urunler/thumb/<?php echo $imgRow["urun_img"];?>" class="mfp-fade">
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
		$.post('ajax.php?p=tek_urunresim_sil', {id: catId}, function (data) {
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
					text : "Ürün Güncelleniyor. Lütfen Bekleyiniz",
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
						text 	: "Ürün Başarılı Bir Şekilde Güncellendi",
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



