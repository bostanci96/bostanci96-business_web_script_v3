<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<?php
	$id = g("bolum");
	if($id!=67){
		die('error');
	}else{
		if($id==67){
			$baslik = "Şirket Yönetimi";
			$aciklama = "Şirketlarınızı bu alanda yönetebilirsiniz.";
			$h2 	= "Mevcut Şirketlar";
		}
	}
?>
<div class="page-heading">

	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong><?php  echo $h2?></strong></h2>
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
									<th>Görsel</th>
									<th>Fotoğraf Adı</th>
									<th>Kayıt Tarihi</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$slideQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum='$id'");
								if($slideQuery->rowCount()){
									foreach($slideQuery as $slideRow){
										if(strlen($slideRow["fotograf_href"])>5){$slideButton = $slideRow["fotograf_href"];}else{$slideButton = "Link Belirtilmemiş";}
										?>
										<tr>
											<td><?php echo $slideRow["fotograf_id"];?></td>
											<td>
												<img style="cursor:pointer" src="assets/img/resim.png"
												onmouseover="tooltip.show('<center><img src=../images/photos/thumb/<?php echo $slideRow["fotograf_src"];?> width=200></center>');" 
												onmouseout="tooltip.hide();"/>
											</td>
											<td><?php echo $slideRow["fotograf_shortDesc"];?></td>
											<td><?php echo tarih($slideRow["fotograf_tarih"]);?></td>
											<td>
												<?php
												if($slideRow["fotograf_durum"]==1){echo '<span style="color:green;font-weight:bold;">Yayında</span>';}
												if($slideRow["fotograf_durum"]==0){echo '<span style="color:red;font-weight:bold;">Yayında Değil !</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=sirket_duzenle&id=<?php echo $slideRow["fotograf_id"];?>">Görüntüle / Düzenle</a></li>
														<li>
															<a href="javascript:;" onclick="durumDegis(<?php echo $slideRow["fotograf_id"];?>);">
																<?php if($slideRow["fotograf_durum"]==1){echo 'Pasifleştir';}else{echo 'Aktifleştir';}?>
															</a>
														</li>
														<li><a href="javascript:;" onclick="TekSil(<?php echo $slideRow["fotograf_id"];?>);">Şirketı Sil</a></li>
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
function TekSil(slideId){
	$.post('ajax.php?p=tek_foto_sil', {id: slideId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Şirket başarılı bir şekilde silindi.",
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
function durumDegis(slideId){
	$.post('ajax.php?p=foto_durum_degis', {id: slideId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Şirket başarılı bir şekilde yayından kaldırıldı.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Şirket başarılı bir şekilde yayınlandı.",
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
