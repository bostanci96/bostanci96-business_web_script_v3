
            <!-- bitiş-->
            <footer class="footer_wrap widget_area scheme_dark">
                <div class="footer_wrap_inner widget_area_inner">
                    <div class="content_wrap">
                        <div class="columns_wrap">
                            <aside class="column-1_3 widget widget_socials">
                                <div class="widget_inner">
                                    <div class="logo">
                                        <a href="<?php echo URL;?>">
                                            <img alt="<?php echo $ayar["site_title"];?>" class="logo_main" src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>"></a>
                                    </div>

                                </div>
                            </aside>
                            <aside class="column-1_3 widget widget_recent_posts">
                                <h5 class="widget_title"><?php echo $blokRow["baslik6"];?></h5>

                                <div class="logo_descr">
                                   <?php echo $blokRow["desc6"];?>
                                    <br>
                                </div>

                            </aside>
                            <aside class="column-1_3 widget widget_text">
                                <h5 class="widget_title">İletişim</h5>
                                <ul class="sc_list sc_list_style_iconed custom_cl_1">
                                    <li class="sc_list_item"><span class="sc_list_icon icon-location-light custom_cl_2"></span>  <?php echo $ayar["adres"];?></li>
                                    <li class="sc_list_item"><span class="sc_list_icon icon-mobile-light custom_cl_2"></span> <?php echo $ayar["telefon"];?></li>
                                    <li class="sc_list_item"><span class="sc_list_icon icon-mail-light custom_cl_2"></span> <?php echo $ayar["email"];?></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </footer>