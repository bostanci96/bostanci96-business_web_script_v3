                <div class="sc_section custom_bg_2">
                    <div class="sc_section">
                        <div class="sc_section_inner">
                            <h2 class="sc_section_title sc_item_title"><?php echo $blokRow["baslik5"];?></h2>
                            <div class="sc_section_descr sc_item_descr">
                                <?php echo $blokRow["desc5"];?>
                            </div>
                            <div class="sc_section_content_wrap">
                                <article class="myportfolio-container minimal-light" id="esg-grid-6-1-wrap">
                                    <div class="esg-grid" id="esg-grid-6-1">
                                        <ul>
                                          
									<?php
									$haberQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum=2 OR fotograf_bolum=5 AND fotograf_durum=1 ORDER BY fotograf_id DESC ");
									if( $haberQuery->rowCount() ){
										foreach($haberQuery as $haberRow){
											$haberUrl = LURL.'proje-detay/'.$haberRow["fotograf_id"].'/';

											?>
											

											
											<li class="eg-home-wrapper">
												<div class="esg-media-cover-wrapper">
													<div class="esg-entry-media"><img alt="<?php echo $haberRow[$lehce."fotograf_shortDesc"];?>" src="<?php echo URL;?>images/photos/big/<?php echo $haberRow["fotograf_src"];?>"></div>
													<div class="esg-entry-cover esg-fade">
														<div class="esg-overlay esg-fade eg-home-container"></div>
														<div class="esg-center eg-home-element-3-a esg-flipup" data-delay="0.1">
															<a class="eg-home-element-3" href="<?php echo $haberUrl;?>"><?php echo $haberRow[$lehce."fotograf_shortDesc"];?></a>
														</div>
														<div class="esg-center eg-home-element-9 esg-none esg-clear"></div>
														<div class="esg-center eg-home-element-10-a esg-flipup" data-delay="0.1">
															<a class="eg-home-element-10" href="<?php echo $haberUrl;?>" rel="" title="">Detayını Gör</a>
														</div>
													</div>
												</div>
											</li>
											


											<?php
										}
									}?>


                                        </ul>
                                        <article class="esg-filters esg-singlefilters esg-navbutton-solo-left">
                                            <div class="esg-navigationbutton esg-left esg-fgc-6">
                                                <i class="eg-icon-left-open"></i>
                                            </div>
                                        </article>
                                        <div class="esg-clear-no-height"></div>
                                        <article class="esg-filters esg-singlefilters esg-navbutton-solo-right">
                                            <div class="esg-navigationbutton esg-right esg-fgc-6">
                                                <i class="eg-icon-right-open"></i>
                                            </div>
                                        </article>
                                        <div class="esg-clear-no-height"></div>
                                    </div>
                                </article>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>