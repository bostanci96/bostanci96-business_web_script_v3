<?php
echo !defined('ADMIN') ? die('error: 404 !') : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	die('error: 302 !');
}
?>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Logolarınız</strong> düzenleniyor.</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=logolar"  enctype="multipart/form-data">
		<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Üst Logo</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" name="logo[]" >
					
					<img style="max-width: 100%" src="../images/<?php echo $ayar["logo"];?>" />
				</div>
				
			</div>
			
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Alt Logo</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" name="footer_logo[]" >
					
					<img style="max-width: 100%" src="../images/<?php echo $ayar["footer_logo"];?>" />
				</div>
				
			</div>
			
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" class="form-control btn btn-red-1" id="Baslik" value="Logoyu Güncelle" name="btn_Check">
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(event) {
		$('#forms').ajaxForm({
			
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Uyarı","Logo dosyası seçilmedi !","warning");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Logo Başarıyla Güncellendi !",
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
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



