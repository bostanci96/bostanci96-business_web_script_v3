<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<div class="page-heading">

          	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>Mevcut Menüler</strong></h2>
				<div class="additional-btn">
					<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
				</div>
			</div>
			<div class="widget-content">
				<br>					
				<div class="table-responsive">
					<form class='form-horizontal' role='form'>
						<table class="mail table table-hover datatable" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Sıra No</th>
									<th>Üst Menü</th>
									<th>Menü Adı</th>
									<th>Menü Tipi</th>
									<th>Kayıt Tarihi</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$menuQuery = $db->query("SELECT * FROM menuler ORDER BY menu_ust,menu_sira");
								if($menuQuery->rowCount()){
									foreach($menuQuery as $menuRow){
										$ustId = $menuRow["menu_ust"];
										if($ustId==0){
											$ustMenu = "Ana Menü";
										}else{
											$ustMenuQuery = $db->query("SELECT menu_baslik FROM menuler WHERE menu_id='$ustId' ORDER BY menu_sira");
											if($ustMenuQuery->rowCount()){
												$ustMenuRow = $ustMenuQuery->fetch(PDO::FETCH_ASSOC);
												$ustMenu = $ustMenuRow["menu_baslik"];
											}
										}
										?>
										<tr>
											<td><?php echo $menuRow["menu_id"];?></td>
											<td style="width:100px">
												<input type="text" value="<?php echo $menuRow["menu_sira"];?>" name="sira_no<?php echo $menuRow["menu_id"]?>" style="margin-right:5px;width:30px;float:left"/>
												<a href="javascript:;" id="updateSira" get-id="<?php echo $menuRow["menu_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
											</td>
											<td><b><?php echo $ustMenu;?></b></td>
											<td><a href="<?php echo $menuRow["menu_href"];?>" target="_blank"><?php echo $menuRow["menu_baslik"];?></a></td>
											<td><?php echo $menuRow["menu_type"];?></td>
											<td><?php echo tarih($menuRow["menu_tarih"]);?></td>
											<td>
												<?php
												if($menuRow["menu_durum"]==1){echo '<span style="color:green;font-weight:bold;">Onaylı Menü</span>';}
												if($menuRow["menu_durum"]==0){echo '<span style="color:red;font-weight:bold;">Onaylanmamış !</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=menu_duzenle&id=<?php echo $menuRow["menu_id"];?>">Görüntüle / Düzenle</a></li>
														<li>
															<a href="javascript:;" onclick="durumDegis(<?php echo $menuRow["menu_id"];?>);">
																<?php if($menuRow["menu_durum"]==1){echo 'Pasifleştir';}else{echo 'Aktifleştir';}?>
															</a>
														</li>
														<li><a href="javascript:;" onclick="TekSil(<?php echo $menuRow["menu_id"];?>);">Menüyü Sil</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$('.datatable').dataTable({
		"bSort":false
	});
	$("td #updateSira").click(function(){
		var id = $(this).attr("get-id");
		var inputValue = $("input[name=sira_no"+id+"]").val();
		$.post('ajax.php?p=menuSiraGuncelle', {sira_no: inputValue,menu_id:id}, function (data) {
			alert(data);
		});
	});
});
function TekSil(menuId){
	$.post('ajax.php?p=tek_menu_sil', {id: menuId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Menü başarılı bir şekilde silinmiştir.",
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
function durumDegis(menuId){
	$.post('ajax.php?p=menu_durum_degis', {id: menuId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Menü başarılı bir şekilde gizlendi.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Menü başarılı bir şekilde aktifleştirildi.",
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

</script>
