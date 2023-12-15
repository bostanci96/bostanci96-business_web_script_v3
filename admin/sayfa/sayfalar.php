<?php echo !defined("ADMIN") ? die('error: 404 !') : null;?>
<div class="page-heading">

         	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>Mevcut Sayfalarınız</strong></h2>
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
									<th>Foto</th>
									<th>Sayfa Adı</th>
									<th>Sayfa URL</th>
									<th>Durum</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$pageQuery = $db->query("SELECT * FROM sayfalar");
								if($pageQuery->rowCount()){
									foreach($pageQuery as $pageRow){
										?>
										<tr>
											<td><?php echo $pageRow["sayfa_id"];?></td>
											<td>
												<img style="cursor:pointer" src="assets/img/resim.png"
												onmouseover="tooltip.show('<center><img src=../images/sayfalar/thumb/<?php echo $pageRow["sayfa_resim"];?> width=200></center>');" 
												onmouseout="tooltip.hide();"/>
											</td>
											<td><?php echo $pageRow["sayfa_adi"];?></td>
											<td><?php echo $pageRow["sayfa_url"];?></td>
											<td>
												<?php
												if($pageRow["sayfa_durum"]==1){echo '<span style="color:green;font-weight:bold;">Yayında</span>';}
												if($pageRow["sayfa_durum"]==0){echo '<span style="color:red;font-weight:bold;">Yayında Değil</span>';}
												?>
											</td>
											<td>
												<div class="btn-group dropdown">
													<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i> İşlemler <span class="caret"></span>
													</button>
													<ul class="dropdown-menu danger" role="menu">
														<li><a href="index.php?sayfa=sayfa_edit&id=<?php echo $pageRow["sayfa_id"];?>">Görüntüle / Düzenle</a></li>
														<li><a href="javascript:void(0);" onclick="TekSil(<?php echo $pageRow["sayfa_id"];?>);">Sil</a></li>
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
function TekSil(sayfaId){
	$.post('ajax.php?p=tek_sayfa_sil', {id: sayfaId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Sayfa başarılı bir şekilde silinmiştir.",
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
