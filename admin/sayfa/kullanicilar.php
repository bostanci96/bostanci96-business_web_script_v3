<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<div class="page-heading">

         	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>Mevcut Kullanıcılar</strong></h2>
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
						<table id="datatables-1" class="mail table table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Ad Soyad</th>
									<th>E-Posta</th>
									<th>Telefon</th>
									<th>Kayıt Tarihi</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$uyeQuery = $db->query("SELECT * FROM uyeler");
								if($uyeQuery->rowCount()){
									foreach($uyeQuery as $uyeRow){
										?>
										<tr>
											<td><?php echo $uyeRow["uye_id"];?></td>
											<td><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></td>
											<td><?php echo $uyeRow["uye_eposta"];?></td>
											<td><?php echo $uyeRow["uye_telefon"];?></td>
											<td><?php echo tarih($uyeRow["uye_tarih"]);?></td>
											<td>
												<?php
												if($uyeRow["uye_onay"]==1){echo '<span style="color:green;font-weight:bold;">Onaylı Üye</span>';}
												if($uyeRow["uye_onay"]==0){echo '<span style="color:red;font-weight:bold;">Onaylanmamış !</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=kullanici_duzenle&id=<?php echo $uyeRow["uye_id"];?>">Görüntüle / Düzenle</a></li>
														<li>
															<a href="javascript:;" onclick="durumDegis(<?php echo $uyeRow["uye_id"];?>);">
																<?php if($uyeRow["uye_onay"]==1){echo 'Üyeyi Yasakla';}else{echo 'Yasağı Kaldır';}?>
															</a>
														</li>
														<li><a href="javascript:;" onclick="TekSil(<?php echo $uyeRow["uye_id"];?>);">Tamamen Sil</a></li>
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
function TekSil(uyeId){
	$.post('ajax.php?p=tek_uye_sil', {id: uyeId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Kullanıcı başarılı bir şekilde silinmiştir.",
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
function durumDegis(uyeId){
	$.post('ajax.php?p=uye_durum_degis', {id: uyeId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Üye Başarılı bir şekilde yasaklandı.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Üyenin yasağı başarılı bir şekilde kaldırıldı.",
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
