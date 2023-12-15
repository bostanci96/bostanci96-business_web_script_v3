<?php
echo !defined('ADMIN') ? die('error: 404 !') : null;
$ayarControl = $db->query("SELECT * FROM bloklar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	die('error: 302 !');
}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Anasayfa Ayarlarınız</strong> düzenleniyor.</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
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
			<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=anasayfa_ayarlari"  enctype="multipart/form-data">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 1</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 1</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 2</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 2</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
						</div>
					</div>
					<!--<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 3</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 4</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
						</div>
					</div>-->
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 3</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 4</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
						</div>
					</div>

				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Site Yazılarını Güncelle !" name="btn_Check">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
		echo !defined('ADMIN') ? die('error: 404 !') : null;
		$ayarControl = $db->query("SELECT * FROM bloklar_en");
		if($ayarControl->rowCount()){
			$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
		}else{
			die('error: 302 !');
		}
		?>
		<div class="tab-pane fade" id="demo5-ingilizce">
			<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=en_anasayfa_ayarlari"  enctype="multipart/form-data">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 1</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 1</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 2</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 2</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 3</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 4</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 5</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 5</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 6</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 6</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
						</div>
					</div>

				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Anasayfa Ayarlarını Güncelle !" name="btn_Check">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
		echo !defined('ADMIN') ? die('error: 404 !') : null;
		$ayarControl = $db->query("SELECT * FROM bloklar_ar");
		if($ayarControl->rowCount()){
			$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
		}else{
			die('error: 302 !');
		}
		?>
		<div class="tab-pane fade" id="demo5-arapca">
			<form role="form" class="form-horizontal"  id="forms3" method="POST" action="ajax.php?p=ar_anasayfa_ayarlari"  enctype="multipart/form-data">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 1</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 1</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 2</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 2</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 3</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 4</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 5</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 5</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 6</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 6</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
						</div>
					</div>

				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Anasayfa Ayarlarını Güncelle !" name="btn_Check">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
		echo !defined('ADMIN') ? die('error: 404 !') : null;
		$ayarControl = $db->query("SELECT * FROM bloklar_fa");
		if($ayarControl->rowCount()){
			$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
		}else{
			die('error: 302 !');
		}
		?>
		<div class="tab-pane fade" id="demo5-farsca">
			<form role="form" class="form-horizontal"  id="forms4" method="POST" action="ajax.php?p=fa_anasayfa_ayarlari"  enctype="multipart/form-data">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 1</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 1</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 2</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 2</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 3</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 4</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 5</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 5</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Başlık 6</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="input-text" class="col-sm-2 control-label">Açıklama 6</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
						</div>
					</div>

				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Anasayfa Ayarlarını Güncelle !" name="btn_Check">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
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
					text 	: "Ayarlarınız Güncellendi !",
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
	$('#forms2').ajaxForm({
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
					text 	: "Ayarlarınız Güncellendi !",
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
	$('#forms3').ajaxForm({
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
					text 	: "Ayarlarınız Güncellendi !",
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
	$('#forms4').ajaxForm({
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
					text 	: "Ayarlarınız Güncellendi !",
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



