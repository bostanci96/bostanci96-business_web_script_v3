<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<div class="page-heading">

     	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>Mevcut Kategoriler</strong></h2>
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
									<th>Üst Kategori</th>
									<th>Kategori Adı</th>
									<th>Kayıt Tarihi</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$catQuery = $db->query("SELECT * FROM kategoriler ORDER BY kategori_ust_id");
								if($catQuery->rowCount()){
									foreach($catQuery as $catRow){
										$ustId = $catRow["kategori_ust_id"];
										if($ustId==0){
											$ustKat = "Ana Kategori";
										}else{
											$ustCatQuery = $db->query("SELECT kategori_adi FROM kategoriler WHERE kategori_id='$ustId'");
											if($ustCatQuery->rowCount()){
												$ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
												$ustKat = $ustKatRow["kategori_adi"];
											}
										}
										?>
										<tr>
											<td>
												<img style="cursor:pointer" src="assets/img/resim.png"
												onmouseover="tooltip.show('<center><img src=../images/kategoriler/thumb/<?php echo $catRow["kategori_resim"];?> width=200></center>');" 
												onmouseout="tooltip.hide();"/>
											</td>
											<td><b><?php echo $ustKat;?></b></td>
											<td><?php echo $catRow["kategori_adi"];?></td>
											<td><?php echo tarih($catRow["kategori_tarih"]);?></td>
											<td>
												<?php
												if($catRow["kategori_durum"]==1){echo '<span style="color:green;font-weight:bold;">Onaylı</span>';}
												if($catRow["kategori_durum"]==0){echo '<span style="color:red;font-weight:bold;">Onaylanmamış !</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=kategori_duzenle&id=<?php echo $catRow["kategori_id"];?>">Görüntüle / Düzenle</a></li>
														<li>
															<a href="javascript:;" onclick="durumDegis(<?php echo $catRow["kategori_id"];?>);">
																<?php if($catRow["kategori_durum"]==1){echo 'Pasifleştir';}else{echo 'Aktifleştir';}?>
															</a>
														</li>
														<li><a href="javascript:;" onclick="TekSil(<?php echo $catRow["kategori_id"];?>);">Kategoriyi Sil</a></li>
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
});
function TekSil(catId){
	$.post('ajax.php?p=tek_cat_sil', {id: catId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Kategori başarılı bir şekilde silinmiştir.",
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
	$.post('ajax.php?p=cat_durum_degis', {id: catId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Kategori başarılı bir şekilde gizlendi.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Kategori başarılı bir şekilde aktifleştirildi.",
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
