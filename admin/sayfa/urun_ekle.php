<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<?php
function Kategori_Select($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==159){$sel="selected";}else{$sel="";}
			echo '<option value="'.$item["kategori_id"].'" '.$sel.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1);
		}
	}
}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni Ürün</strong> Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=urun_add"  enctype="multipart/form-data">
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Ürün Kategori</label>
			<div class="col-sm-9">
				<select name="urun_kategori" class="form-control">
					<option value="0">Kategori Seçiniz</option>
					<?php Kategori_Select(0,0,0);?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Ürün Kategori</label>
			<div class="col-sm-9">
				<select name="urun_populer" class="form-control">
					
					<option value="0">Popüler Olmasın</option>
					<option value="1">Popüler Ürün Olsun</option>

				</select>
			</div>
		</div>

		
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Ürün Adı</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Baslik" name="urun_adi" >
			</div>
		</div>
		<div class="form-group">
			<label for="input-text-help" class="col-sm-2 control-label">Ürün Desc ( SEO )</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="Aciklama" name="urun_desc" value="#">
			</div>
		</div>		

		<div class="form-group">
			<label class="col-sm-2 control-label">Ürün İçeriği</label>
			<div class="col-sm-9">
				<textarea class="ckeditor" id="bootstrapck" name="urun_icerik"></textarea>
				<?php ckeditor('bootstrapck');?>
			</div>
		</div>				  
		<div class="form-group">
			<label class="col-sm-2 control-label">Ön Görsel</label>
			<div class="col-sm-9">
				<input type="file" class="btn btn-default" title="Resim seç !" name="dosya[]" id="dosya[]" multiple/>
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
		beforeSerialize: function(form, options) { 
			for (instance in CKEDITOR.instances)
				CKEDITOR.instances[instance].updateElement();
		},
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Ürün Yükleniyor. Lütfen Bekleyiniz",
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
					text 	: "Ürün Başarılı Bir Şekilde Eklendi",
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



