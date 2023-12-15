<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<?php
/*
$kategoriQuery = $db->query("SELECT * FROM kategoriler WHERE kategori_durum=1");
if($kategoriQuery->rowCount()){
	foreach($kategoriQuery as $kategoriRow){
		$kategori_id = $kategoriRow["kategori_id"];
		$urunSorgu = $db->query("SELECT * FROM urunler WHERE urun_kategori='$kategori_id'");
		if($urunSorgu->rowCount()){
			$sayac = 1;
			foreach($urunSorgu as $urunRow){
				$urun_id = $urunRow["urun_id"];
				$update  = $db->query("UPDATE urunler SET urun_sira_no='$sayac' WHERE urun_id='$urun_id'");
				$sayac++;
			}
		}else{
			//
		}
	}
}*/
?>
<div class="page-heading">

        	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>Mevcut Ürünler</strong></h2>
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
									<th>Görsel</th>
									<th>Sıra No</th>
									<th>Kategori Adı</th>
									<th>Ürün Adı</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$catQuery = $db->query("SELECT * FROM urunler 
									INNER JOIN kategoriler ON kategori_id=urun_kategori 
									INNER JOIN urunresim ON urun_id=resim_urun_id 
									GROUP BY(urun_id) ORDER BY urun_kategori DESC,urun_sira_no");
								if($catQuery->rowCount()){
									foreach($catQuery as $catRow){
										?>
										<tr>
											<td>
												<img style="cursor:pointer" src="assets/img/resim.png"
												onmouseover="tooltip.show('<center><img src=../images/urunler/thumb/<?php echo $catRow["urun_img"];?> width=200></center>');" 
												onmouseout="tooltip.hide();"/>
											</td>
											<td style="width:100px">
												<input type="text" value="<?php echo $catRow["urun_sira_no"];?>" name="sira_no<?php echo $catRow["urun_id"]?>" style="margin-right:5px;width:30px;float:left"/>
												<a href="javascript:;" id="updateSira" get-id="<?php echo $catRow["urun_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
											</td>
											<td><?php echo $catRow["kategori_adi"];?></td>
											<td><?php echo $catRow["urun_adi"];?></td>

											<td>
												<?php
												if($catRow["urun_durum"]==1){echo '<span style="color:green;font-weight:bold;">Onaylı</span>';}
												if($catRow["urun_durum"]==0){echo '<span style="color:red;font-weight:bold;">Onaylanmamış !</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=urun_duzenle&id=<?php echo $catRow["urun_id"];?>">Görüntüle / Düzenle</a></li>
														<li>
															<a href="javascript:;" onclick="durumDegis(<?php echo $catRow["urun_id"];?>);">
																<?php if($catRow["urun_durum"]==1){echo 'Pasifleştir';}else{echo 'Aktifleştir';}?>
															</a>
														</li>
														<li><a href="javascript:;" onclick="TekSil(<?php echo $catRow["urun_id"];?>);">Ürünü Sil</a></li>
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
	$("td #updateSira").click(function(){
		var id = $(this).attr("get-id");
		var inputValue = $("input[name=sira_no"+id+"]").val();
		$.post('ajax.php?p=urunSiraGuncelle', {sira_no: inputValue,urun_id:id}, function (data) {
			alert(data);
		});
	});
	$('.datatable').dataTable({
		"bSort":false
	});
	
});

function TekSil(catId){
	$.post('ajax.php?p=tek_urun_sil', {id: catId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Ürün başarılı bir şekilde silinmiştir.",
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
function durumDegis(catId){
	$.post('ajax.php?p=urun_durum_degis', {id: catId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Ürün başarılı bir şekilde gizlendi.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Ürün başarılı bir şekilde aktifleştirildi.",
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
