<?php
echo !defined('ADMIN') ? die('error: 404 !') : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
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
		<h2><strong><?php echo $catRow["kategori_adi"];?> </strong> düzenleniyor..</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=kategori_edit"  enctype="multipart/form-data">
		<input type="hidden" name="kategori_id" value="<?php echo $catRow["kategori_id"];?>" />
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
				<a href="#demo5-farsca" data-toggle="tab"><i class="fa fa-flag"></i> <b>FARSÇA</b></a>
			</li>-->
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="demo5-turkce">
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">Türkçe Kategori Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="kategori_adi" value="<?php echo $catRow["kategori_adi"];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input-text-help" class="col-sm-2 control-label">Türkçe Kategori Desc ( SEO )</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Aciklama" name="kategori_desc" value="<?php echo $catRow["kategori_desc"];?>" >

					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-ingilizce">
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">İngilizce Kategori Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="en_kategori_adi" value="<?php echo $catRow["en_kategori_adi"];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input-text-help" class="col-sm-2 control-label">İngilizce Kategori Desc ( SEO )</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Aciklama" name="en_kategori_desc" value="<?php echo $catRow["en_kategori_desc"];?>" >

					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-arapca">
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">Arapça Kategori Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="ar_kategori_adi" value="<?php echo $catRow["ar_kategori_adi"];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input-text-help" class="col-sm-2 control-label">Arapça Kategori Desc ( SEO )</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Aciklama" name="ar_kategori_desc" value="<?php echo $catRow["ar_kategori_desc"];?>" >

					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="demo5-farsca">
				<div class="form-group">
					<label for="input-text" class="col-sm-2 control-label">Farsça Kategori Adı</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Baslik" name="fa_kategori_adi" value="<?php echo $catRow["fa_kategori_adi"];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input-text-help" class="col-sm-2 control-label">Farsça Kategori Desc ( SEO )</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="Aciklama" name="fa_kategori_desc" value="<?php echo $catRow["fa_kategori_desc"];?>" >

					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Üst Kategori</label>
			<div class="col-sm-9">
				<select name="ust_kategori" class="form-control">

					<option value="0">Ana Kategori Olsun</option>
					<?php Kategori_Select(0,0,$catRow["kategori_ust_id"]);?>

				</select>
			</div>
		</div>			  
		<div class="form-group">
			<label class="col-sm-2 control-label">Ön Görsel</label>
			<div class="col-sm-9">
				<input type="file" class="btn btn-default" title="Resim seç !" name="dosya[]" id="dosya[]" />
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
				text : "Kategori Güncelleniyor. Lütfen Bekleyiniz",
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
					text 	: "Kategori Başarılı Bir Şekilde Güncellendi",
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



