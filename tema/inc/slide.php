            <section class="slider_wrap slider_fullwide slider_engine_revo slider_alias_home-1">
                <div class="rev_slider_wrapper fullscreen-container" id="rev_slider_1_1_wrapper">
                    <div class="rev_slider fullscreenbanner" data-version="5.2.6" id="rev_slider_1_1">
                        <ul>
<?php
					$slideQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum=1 && fotograf_durum=1");
					if($slideQuery->rowCount()){
						$sayac = 0;
						foreach($slideQuery as $slideRow){
							$sayac++;
							
							?>
                            <li data-description="" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-<?php echo $sayac;?>" data-masterspeed="default,default,default,default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0,0,0,0" data-saveperformance="off" data-slotamount="default,default,default,default" data-thumb="<?php echo URL.'images/photos/thumb/'.$slideRow["fotograf_src"];?>" data-title="Slide" data-transition="slidingoverlayup,slidingoverlaydown,slidingoverlayright,slidingoverlayleft">
                                <img alt="<?php echo $slideRow[$lehce."fotograf_shortDesc"];?>" class="rev-slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" height="1079" src="<?php echo URL.'images/photos/big/'.$slideRow["fotograf_src"];?>" title="<?php echo $slideRow[$lehce."fotograf_shortDesc"];?>" width="1920">
                                <div class="tp-caption trx-big tp-resizeme" data-end="8700" data-height="['auto']" data-hoffset="" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="900" data-transform_idle="o:1;" data-transform_in="opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:600;" data-voffset="-40" data-width="['auto']" data-x="center" data-y="center" id="slide-1-layer-1">
                                    <?php echo $slideRow[$lehce."fotograf_shortDesc"];?>
                                    <br>
                                </div>
                                <div class="tp-caption trx-norm tp-resizeme" data-end="8700" data-height="['auto']" data-hoffset="" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="900" data-transform_idle="o:1;" data-transform_in="opacity:0;s:800;e:Power2.easeInOut;" data-transform_out="opacity:0;s:600;" data-visibility="['on','on','on','off']" data-voffset="46" data-width="['auto']" data-x="center" data-y="center" id="slide-1-layer-2">

                                  <?php echo $slideRow[$lehce."fotograf_shortDesc2"];?>
                                </div>

                            </li>

                            	<?php
						}
					}
					?>

                         

                        </ul>
                        <div class="tp-bannertimer"></div>
                    </div>
                </div>
            </section>