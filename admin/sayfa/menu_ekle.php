<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<?php
function menuSelect($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM menuler WHERE menu_ust='$tree' and menu_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			echo '<option value="'.$item["menu_id"].'">'.str_repeat('-', $level*3).$item['menu_baslik'].'</option>';
			menuSelect($item['menu_id'],$level + 1);
		}
	}
}
?>
<script>
	$(document).ready(function(){
		$("select[name=menu_ust]").change(function(){
			var menuVal = $("select[name=menu_ust]").val();
			if(menuVal==0){
				$("#menuType").show(500);
			}else{
				$("#menuType").hide(500);
			}
		});


		/* Bağlantı seçeneğine göre inputları göster */
		$("select[name=hrefTypes]").change(function(){
			var hrefType = $("select[name=hrefTypes]").val();
			if(hrefType=='manuel'){
				// Manuel seçildiyse sayfaları gösteren selectBox disable edilip gizlenecek.
				$("#hrefSayfalar select[name=menu_href]").attr('disabled','disabled');
				$("#hrefSayfalar").hide();

				$("#hrefManuel").show(500);
				$("#hrefManuel input[name=menu_href]").removeAttr('disabled');

			}else if(hrefType=='sayfalar'){
				$("#hrefManuel input[name=menu_href]").attr('disabled','disabled');
				$("#hrefManuel").hide();

				$("#hrefSayfalar").show(500);
				$("#hrefSayfalar select[name=menu_href]").removeAttr('disabled');
			}
		});

		/*  Menü tipine göre resim ekletme */ 

		$("select[name=menu_type]").change(function(){
			var menuType = $(this).val();
			if(menuType=='mega-menu'){
				$("#menuResim").show(500);
				$("#menuResim input").removeAttr('disabled','disabled');
			}else{
				$("#menuResim").hide(500);
				$("#menuResim input").attr('disabled','disabled');
			}
		});


	});

</script>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong>Yeni </strong>Menü Ekle</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=menu_add"  enctype="multipart/form-data">
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Üst Menü</label>
			<div class="col-sm-9">
				<select name="menu_ust" class="form-control">
					
					<option value="0">Ana Menü Olsun</option>
					<?php menuSelect(0,0);?>
				</select>
			</div>
		</div>
		<!--<div class="form-group" id="menuType">
			<label for="input-text" class="col-sm-2 control-label">Menü Tipini Seçin</label>
			<div class="col-sm-9">
				<select name="menu_type" class="form-control">
					<option value="normal" selected>Normal Menü</option>
					<option value="mega-menu" >Mega Menü</option>
				</select>
			</div>
		</div>
		-->
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Menü Başlığı</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="menu_baslik" >
			</div>
		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-2 control-label">Bağlantı Seçenekleri</label>
			<div class="col-sm-9">
				<select name="hrefTypes" class="form-control">
					<option value="0">Link verme seçeneğini belirleyin !</option>
					<option value="manuel">Manuel Gireceğim</option>
					<option value="sayfalar" >Sayfaları Göster</option>
				</select>
			</div>
		</div>

		<div class="form-group" id="hrefSayfalar" style="display:none">
			<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
			<div class="col-sm-9">
				<select name="menu_href" class="form-control"  disabled>
					<option value="0">Sayfa Seçin !</option>
					<?php
						$sayfaQuery = $db->query("SELECT * FROM sayfalar WHERE sayfa_durum=1 and secenekHaber=0");
						if($sayfaQuery->rowCount()){
							foreach($sayfaQuery as $sayfaRow){
								echo '<option value="'.URL.$sayfaRow["sayfa_url"].'/">'.$sayfaRow["sayfa_adi"].'</option>';
							}
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group" id="hrefManuel" style="display:none">
			<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="menu_href" placeholder="Örn : http://www.google.com.tr/" disabled>
			</div>
		</div>


		<div class="form-group" id="menuResim" style="display:none">
			<label class="col-sm-2 control-label">Mega Menü Resmi</label>
			<div class="col-sm-9">
				<input type="file" name="dosya[]" class="form-control" disabled/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-9">
				<button class="btn btn-success" type="submit">Tamamla ! </button>
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
				text : "Menü Yükleniyor. Lütfen Bekleyiniz",
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
					text 	: "Menü Başarılı Bir Şekilde Eklendi",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else if(data=='mega-resim-yok'){
				sweetAlert("Uyarı","Mega Menü için resim seçmediniz !","warning");
				return false;
			}else{
				sweetAlert(data,"Bir hata oluştu !","error");
				return false;
			}
		}
	});

});
</script>



