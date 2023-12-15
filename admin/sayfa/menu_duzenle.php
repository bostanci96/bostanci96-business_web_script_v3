<?php echo !defined('ADMIN') ? die('error: 404 !') : null;?>
<?php 
if(isset($_GET["id"])){
	$id = g("id");
	$menuControl = $db->query("SELECT * FROM menuler WHERE menu_id='$id'");
	if($menuControl->rowCount()){
		$menuRow = $menuControl->fetch(PDO::FETCH_ASSOC);
	}else{
		die('error: 302 !');
	}
}else{
	die('error: 302 !');
}
?>
<?php
function menuSelect($tree,$level=0,$ustId=null){
	global $db;
	$sorgula = $db->query("SELECT * FROM menuler WHERE menu_ust='$tree' and menu_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($ustId==$item["menu_id"]){$sel = " selected ";}else{$sel="";}
			echo '<option value="'.$item["menu_id"].'" '.$sel.'>'.str_repeat('-', $level*3).$item['menu_baslik'].'</option>';
			menuSelect($item['menu_id'],$level + 1);
		}
	}
}
?>
<script>
$(document).ready(function(){
		// Sayfa açıldığında üst menüyü kontrol edip ona göre menü tipini gösterip gizleme yaptırıyoruz.
		var menuVal = $("select[name=menu_ust]").val();
		if(menuVal==0){
			$("#menuType").show();
		}else{
			$("#menuType select[name=menu_type]").attr('disabled','disabled');
			$("#menuResim").hide();
		}

		// Sayfa açılışında menü tipini seçiyoruz

		var menuType = $("select[name=menu_type]").val();
		if(menuType=='mega-menu'){
			$("#menuResim").show();
			$("#menuResim input").removeAttr('disabled');
		}

		// Menü tipi değişikliğine göre input gizleme gösterme yapıyoruz.

		$("select[name=menu_type]").change(function(){
			var menuType = $(this).val();
			if(menuType=='mega-menu'){
				$("#menuResim").show(500);
				$("#menuResim input").removeAttr('disabled');
			}else{
				$("#menuResim").hide(500);
				$("#menuResim input").attr('disabled','disabled');
			}
		});

		// Üst menünün değişimine göre menü tiplerini gösterip gizliyoruz vs.
		$("select[name=menu_ust]").change(function(){
			var menuVal = $("select[name=menu_ust]").val();
			if(menuVal==0){
				$("#menuType").show(500);
				$("#menuType select[name=menu_type]").removeAttr('disabled');
			}else{
				$("#menuType").hide(500);
				$("#menuType select[name=menu_type]").attr('disabled','disabled');
				$("#menuResim").hide(500);
				$("#menuResim input").attr('disabled','disabled');
			}
		});
	});
</script>
<div class="widget">
	<div class="widget-header transparent">
		<h2><strong><?php echo $menuRow["menu_baslik"];?></strong> Üst Menüsü Düzenleniyor</h2>
		
		<div class="additional-btn">
			<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
			<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
			<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
		</div>
	</div>
	<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=menu_edit"  enctype="multipart/form-data">
		<input type="hidden" name="menu_id" value="<?php echo $menuRow["menu_id"];?>" />
		<input type="hidden" name="menu_resim" value="<?php echo $menuRow["menu_resim"];?>" />
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
				<a href="#demo5-farsca" data-toggle="tab"><i class="fa fa-flag"></i> <b>RUSÇA</b></a>
			</li>-->
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="demo5-turkce">
				
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(TR) Menü Başlığı</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="menu_baslik" value="<?php echo $menuRow["menu_baslik"];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(TR) Menü Linki Belirleyin</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"  name="menu_href" value="<?php echo $menuRow["menu_href"];?>">
					</div>
				</div>
			</div>
			<div class="tab-pane fade " id="demo5-ingilizce">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(EN) Menü Başlığı</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="en_menu_baslik" value="<?php echo $menuRow["en_menu_baslik"];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(EN) Menü Linki Belirleyin</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"  name="en_menu_href" value="<?php echo $menuRow["en_menu_href"];?>">
					</div>
				</div>
			</div>
			<div class="tab-pane fade " id="demo5-arapca">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(AR) Menü Başlığı</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="ar_menu_baslik" value="<?php echo $menuRow["ar_menu_baslik"];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(AR) Menü Linki Belirleyin</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"  name="ar_menu_href" value="<?php echo $menuRow["ar_menu_href"];?>">
					</div>
				</div>
			</div>
			<div class="tab-pane fade " id="demo5-farsca">
				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(FA) Menü Başlığı</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="fa_menu_baslik" value="<?php echo $menuRow["fa_menu_baslik"];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input-text" class="col-sm-3 control-label">(FA) Menü Linki Belirleyin</label>
					<div class="col-sm-8">
						<input type="text" class="form-control"  name="fa_menu_href" value="<?php echo $menuRow["fa_menu_href"];?>">
					</div>
				</div>
			</div>

		</div>
		<div class="form-group">
			<label for="input-text" class="col-sm-3 control-label">Üst Menü</label>
			<div class="col-sm-8">
				<select name="menu_ust" class="form-control">
					<option value="0">Ana Menü Olsun</option>
					<?php menuSelect(0,0,$menuRow["menu_ust"]);?>
				</select>
			</div>
		</div>
		<div class="form-group" id="menuResim" style="display:none">
			<label class="col-sm-2 control-label">Mega Menü Resmi</label>
			<div class="col-sm-9">
				<input type="file" name="dosya[]" class="form-control" disabled/>
				<?php
				if(strlen($menuRow["menu_resim"])>3){
					echo '<img src="../images/menuPhotos/'.$menuRow["menu_resim"].'" />';
				}
				?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label"></label>
			<div class="col-sm-8">
				<button class="btn btn-success" type="submit">Güncelle ! </button>
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
			}else{
				sweetAlert(data,"Bir hata oluştu !","error");
				return false;
			}
		}
	});

});
</script>



