<?php echo !defined("ADMIN") ? die('error: 404') : null;?>
<!--<div class="row top-summary">
	<div class="col-lg-3 col-md-6">
		<div class="widget green-1 animated fadeInDown">
			<div class="widget-content padding">
				<div class="widget-icon">
					<i class="fa fa-users"></i>
				</div>
				<div class="text-box">
					<p class="maindata">TOPLAM <b>ZİYARETÇİ</b></p>
					<h2><span class="animate-number" data-value="1809" data-duration="3000">1,809</span></h2>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="widget-footer">
				<div class="row">
					<div class="col-sm-12">
						<i class="glyphicon glyphicon-share-alt"></i> Toplam ziyaretçi sayısı.
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="widget darkblue-2 animated fadeInDown">
			<div class="widget-content padding">
				<div class="widget-icon">
					<i class="glyphicon glyphicon-user"></i>
				</div>
				<div class="text-box">
					<p class="maindata">GÜNLÜK <b>ZİYARETÇİ</b></p>
					<h2><span class="animate-number" data-value="811" data-duration="3000">811</span></h2>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="widget-footer">
				<div class="row">
					<div class="col-sm-12">
						<i class="glyphicon glyphicon-share-alt"></i> Bugün gelen ziyaretçiler.
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="widget pink-1 animated fadeInDown">
			<div class="widget-content padding">
				<div class="widget-icon">
					<i class="fa fa-try"></i>
				</div>
				<div class="text-box">
					<p class="maindata">YILLIK YENİLEME <b>ÜCRETİ</b></p>
					<h2>TL <span class="animate-number" data-value="150" data-duration="3000">150</span></h2>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="widget-footer">
				<div class="row">
					<div class="col-sm-12">
						<i class="glyphicon glyphicon-share-alt"></i> Hizmet bedeli yenilemesi.
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="widget blue-1 animated fadeInDown">
			<div class="widget-content padding">
				<div class="widget-icon">
					<i class="fa fa-exclamation-circle"></i>
				</div>
				<div class="text-box">
					<p class="maindata">SON <b>ÖDEME TARİHİ</b></p>
					<h3 style="color:white;">03.06.2016</h3>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="widget-footer">
				<div class="row">
					<div class="col-sm-12">
						<i class="glyphicon glyphicon-share-alt"></i> Şimdi <b>ödemek</b> için tıklayın !
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

</div>-->
<div class="row">
	<div class="col-lg-3 portlets ui-sortable">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><strong>Online</strong> Ziyaretçi</h2>
				<div class="additional-btn">
					<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				</div>
			</div>
			
			<center><p style="font-size:64px; font-weight:600">12</p></center>
			
			<center><a href="#" type="button" class="btn btn-default updatePieCharts">Yenile</a></center>
			<br>	
		</div>
	</div>	
	<div class="col-lg-9 portlets ui-sortable">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><strong>Ziyaretçi</strong> İstatistikleri</h2>
				<div class="additional-btn">
					<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				</div>
			</div>
			<div class="col-lg-9 portlets ui-sortable" id="chart_div" style="width: 100%; height: 155px;"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 portlets ui-sortable">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><strong>Kampanyalar</strong> &amp; Duyurular</h2>
				<div class="additional-btn">
					<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				</div>
			</div>
			<br><br>
			<center>Yeni Duyuru Yok !</center>
			<br><br>
			<br>	
		</div>
	</div>
</div>