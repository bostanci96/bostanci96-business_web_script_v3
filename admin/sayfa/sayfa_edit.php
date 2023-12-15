<?php
	echo !defined('ADMIN') ? die('error : 404 !') : null;
	if(isset($_GET["id"])){
		$id = g("id");
		$pageControl = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_id=:id");
		$pageControl->execute(array("id"=>$id));
		if($pageControl->rowCount()){
			$pageRow = $pageControl->fetch(PDO::FETCH_ASSOC);
		}else{
			//
		}
	}else{
		go(ADMIN_URL);
		die('error : 404 ! ');
	}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong><?php echo $pageRow["sayfa_adi"];?> </strong> adlı sayfanız düzenleniyor..</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=sayfa_edit"  enctype="multipart/form-data">
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
				<a href="#demo5-rusca" data-toggle="tab"><i class="fa fa-flag"></i> <b>RUSÇA</b></a>
			</li>-->
		</ul>
		<input type="hidden" value="<?php echo $pageRow["sayfa_id"];?>" name="sayfa_id" />
		<div class="tab-content">
			<div class="tab-pane fade active in" id="demo5-turkce">
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Başlık</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Baslik" name="sayfa_adi" value="<?php echo $pageRow["sayfa_adi"];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Açıklama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Aciklama" name="sayfa_desc" value="<?php echo $pageRow["sayfa_desc"];?>" />
				
			</div>
		</div>						  
		
		<div class="form-group">
			<label class="col-sm-2 control-label">İçerik</label>
			<div class="col-sm-10">
				<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"><?php echo $pageRow["sayfa_icerik"];?></textarea>
				<?php ckeditor('bootstrapck');?>
			</div>
		</div>
		</div>
		<div class="tab-pane fade" id="demo5-ingilizce">
			<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Başlık (EN)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Baslik" name="en_sayfa_adi" value="<?php echo $pageRow["en_sayfa_adi"];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Açıklama (EN)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Aciklama" name="en_sayfa_desc" value="<?php echo $pageRow["en_sayfa_desc"];?>" />
				
			</div>
		</div>						  
		
		<div class="form-group">
			<label class="col-sm-2 control-label">İçerik (EN)</label>
			<div class="col-sm-10">
				<textarea class="ckeditor" id="bootstrapck2" name="en_sayfa_icerik"><?php echo $pageRow["en_sayfa_icerik"];?></textarea>
				<?php ckeditor('bootstrapck2');?>
			</div>
		</div>
		</div>

		<div class="tab-pane fade" id="demo5-arapca">
			<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Başlık (AR)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Baslik" name="ar_sayfa_adi" value="<?php echo $pageRow["ar_sayfa_adi"];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Açıklama (AR)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Aciklama" name="ar_sayfa_desc" value="<?php echo $pageRow["ar_sayfa_desc"];?>" />
				
			</div>
		</div>						  
		<div class="form-group">
			<label class="col-sm-2 control-label">İçerik (AR)</label>
			<div class="col-sm-10">
				<textarea class="ckeditor" id="bootstrapck3" name="ar_sayfa_icerik"><?php echo $pageRow["ar_sayfa_icerik"];?></textarea>
				<?php ckeditor('bootstrapck3');?>
			</div>
		</div>
		</div>


		<div class="tab-pane fade" id="demo5-rusca">
			<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Başlık (RU)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Baslik" name="fa_sayfa_adi" value="<?php echo $pageRow["fa_sayfa_adi"];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Açıklama (RU)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="Aciklama" name="fa_sayfa_desc" value="<?php echo $pageRow["fa_sayfa_desc"];?>" />
				
			</div>
		</div>						  
		<div class="form-group">
			<label class="col-sm-2 control-label">İçerik (RU)</label>
			<div class="col-sm-10">
				<textarea class="ckeditor" id="bootstrapck4" name="fa_sayfa_icerik"><?php echo $pageRow["fa_sayfa_icerik"];?></textarea>
				<?php ckeditor('bootstrapck4');?>
			</div>
		</div>
		</div>


		<div class="form-group">
			<label class="col-sm-2 control-label">Ön Görsel</label>
			<div class="col-sm-10">
				<input type="file" class="btn btn-default" title="Resim seç !" name="dosya[]" id="dosya[]" />
			</div>
			<div class="col-sm-10 col-sm-offset-2"><img src="../images/sayfalar/thumb/<?php echo $pageRow["sayfa_resim"];?>" / ></div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Sayfa Seçenekleri</label>
			<div class="col-sm-9">
				<select name="secenekHaber" class="form-control">
					<option value="0" <?php echo $pageRow["secenekHaber"]==0 ? 'selected' : null; ?>>Normal Sayfa Olsun</option>
					<option value="1" <?php echo $pageRow["secenekHaber"]==1 ? 'selected' : null; ?>>Haberlere Ekle</option>
					<!--<option value="2" <?php echo $pageRow["secenekHaber"]==2 ? 'selected' : null; ?>>Hizmetlere Ekle</option>
					<option value="3" <?php echo $pageRow["secenekHaber"]==3 ? 'selected' : null; ?>>Anasayfada Kurumsal Alana Ekle</option>-->
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<button class="btn btn-success" type="submit">Güncelle</button>
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
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Fotoğraflar Yükleniyor. Lütfen Bekleyiniz",
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
					text 	: "Sayfa Başarılı Bir Şekilde Güncellendi",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else{
				sweetAlert(data,"Bir Hata Oluştu !","error");
				return false;
			}
		}
	});
});
</script>



