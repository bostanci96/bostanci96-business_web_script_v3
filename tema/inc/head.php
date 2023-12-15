<header class="top_panel_wrap top_panel_style_3 scheme_original">
    <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_over">
        <div class="top_panel_top">
            <div class="content_wrap">
                <div class="top_panel_top_contact_area icon-location-light">
                  <?php echo $ayar["adres"];?>

              </div>
              <div class="top_panel_top_open_hours icon-clock-light">
                Pazartesi-Cumartesi 07:30 / 19:00
            </div>
            <div class="top_panel_top_ophone icon-call-out">
                <?php echo $ayar["telefon"];?>
            </div>
            <div class="top_panel_top_user_area cart_show">
                <div class="menu_pushy_wrap">
                    <a class="menu_pushy_button icon-1460034782_menu2" href="javascript:void(0);"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="top_panel_middle">
        <div class="content_wrap">
            <div class="contact_logo">
                <div class="logo">
                    <a href="<?php echo URL; ?>">
                        <img alt="<?php echo $ayar["site_title"];?>" class="logo_main" src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>">
                        <img alt="<?php echo $ayar["site_title"];?>" class="logo_fixed" src="<?php echo URL;?>images/<?php echo $ayar["footer_logo"];?>"></a>
                    </div>
                </div>
                <div class="menu_main_wrap">
                    <nav class="menu_main_nav_area menu_hover_fade">
                       <ul class="menu_main_nav" id="menu_main">

                        <?php
                        $url="https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                        $menuQuery = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 ORDER BY menu_sira ASC");
                        if($menuQuery->rowCount()){
                            $numb  = 1;
                            foreach($menuQuery as $menuRow){
                                if($numb==1){$active="active";}else{$active=null;}
                                if ($url==$menuRow[$lehce."menu_href"]) {$linkactive="current-menu-ancestor current-menu-parent";}else{$linkactive=null;}              
                                $menuId = $menuRow["menu_id"];
                                $altMenuQuery = $db->query("SELECT * FROM menuler WHERE menu_ust='$menuId' and menu_durum=1 ORDER BY menu_sira ASC");
                                $sayac=0;
                                if($altMenuQuery->rowCount()){
                                    $sayac++;
                                    echo '<li class="menu-item menu-item-has-children" >';
                                    echo '<a href="javascript:void(0);">'.$menuRow[$lehce."menu_baslik"].'</a>';
                                    echo '<ul class="sub-menu">';
                                    $saya=0;
                                    foreach($altMenuQuery as $altMenuRow){
                                        $saya++;
                                        $menuIdone = $altMenuRow["menu_id"];
                                        $altMenuQueryone = $db->query("SELECT * FROM menuler WHERE menu_ust='$menuIdone' and menu_durum=1 ORDER BY menu_sira ASC");
                                        if($altMenuQueryone->rowCount()){
                                            echo '<li class="menu-item">';
                                            echo '<a href="javascript:void(0);">'.$altMenuRow[$lehce."menu_baslik"].'</a>';
                                            $say=0;
                                            echo '<ul class="dropdown-submenu">';
                                            foreach($altMenuQueryone as $altMenuRowone){
                                                $say++;                                                 
                                                echo '<li class="dropdown-menu">';
                                                echo '<a href="'.$altMenuRowone[$lehce."menu_href"].'">'.$altMenuRowone[$lehce."menu_baslik"].'</a>';
                                                echo '</li>';   
                                            }
                                            echo '</ul>';
                                            echo '</li>';
                                        }else{
                                            echo '<li class="menu-item">';
                                            echo '<a href="'.$altMenuRow[$lehce."menu_href"].'">'.$altMenuRow[$lehce."menu_baslik"].'</a>';
                                            echo '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                    echo '</li>';
                                }else{
                                    echo '<li class="menu-item current-'.$linkactive.' menu-item-has-children"><a  href="'.$menuRow[$lehce."menu_href"].'">'.$menuRow[$lehce."menu_baslik"].'</a></li>';
                                }
                                $numb++;
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <div class="search_wrap search_style_fullscreen search_state_closed top_panel_el top_panel_icon">
                    <div class="search_form_wrap">

                    </div>
                </div>
                <div class="top_panel_top_socials top_panel_el">
                    <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                        <div class="sc_socials_item">
                            <a class="social_icons social_facebook" href="<?php echo $ayar["facebook_url"];?>" target="_blank"><span class="icon-facebook"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_twitter" href="<?php echo $ayar["twitter_url"];?>" target="_blank"><span class="icon-twitter"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_gplus" href="<?php echo $ayar["google_url"];?>" target="_blank"><span class="icon-youtube"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_instagramm" href="<?php echo $ayar["linkedin_url"];?>" target="_blank"><span class="icon-instagramm"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<div class="site-overlay"></div>
<div class="header_mobile header_mobile_style_3">
    <div class="content_wrap">
        <div class="menu_button icon-menu"></div>
        <div class="logo">
            <a href="<?php echo URL; ?>">
                <img style="max-height: 85px;" alt="<?php echo $ayar["site_title"];?>" class="logo_main" src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>"></a>
            </div>

        </div>
        <div class="side_wrap">
            <div class="close">
                Kapat
            </div>
            <div class="panel_top">
                <nav class="menu_main_nav_area">
                    <ul class="menu_main_nav" id="menu_mobile">
                                 <?php
                        $url="https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                        $menuQuery = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 ORDER BY menu_sira ASC");
                        if($menuQuery->rowCount()){
                            $numb  = 1;
                            foreach($menuQuery as $menuRow){
                                if($numb==1){$active="active";}else{$active=null;}
                                if ($url==$menuRow[$lehce."menu_href"]) {$linkactive="current-menu-ancestor current-menu-parent";}else{$linkactive=null;}              
                                $menuId = $menuRow["menu_id"];
                                $altMenuQuery = $db->query("SELECT * FROM menuler WHERE menu_ust='$menuId' and menu_durum=1 ORDER BY menu_sira ASC");
                                $sayac=0;
                                if($altMenuQuery->rowCount()){
                                    $sayac++;
                                    echo '<li class="menu-item menu-item-has-children" >';
                                    echo '<a href="javascript:void(0);">'.$menuRow[$lehce."menu_baslik"].'</a>';
                                    echo '<ul class="sub-menu">';
                                    $saya=0;
                                    foreach($altMenuQuery as $altMenuRow){
                                        $saya++;
                                        $menuIdone = $altMenuRow["menu_id"];
                                        $altMenuQueryone = $db->query("SELECT * FROM menuler WHERE menu_ust='$menuIdone' and menu_durum=1 ORDER BY menu_sira ASC");
                                        if($altMenuQueryone->rowCount()){
                                            echo '<li class="menu-item">';
                                            echo '<a href="javascript:void(0);">'.$altMenuRow[$lehce."menu_baslik"].'</a>';
                                            $say=0;
                                            echo '<ul class="dropdown-submenu">';
                                            foreach($altMenuQueryone as $altMenuRowone){
                                                $say++;                                                 
                                                echo '<li class="dropdown-menu">';
                                                echo '<a href="'.$altMenuRowone[$lehce."menu_href"].'">'.$altMenuRowone[$lehce."menu_baslik"].'</a>';
                                                echo '</li>';   
                                            }
                                            echo '</ul>';
                                            echo '</li>';
                                        }else{
                                            echo '<li class="menu-item">';
                                            echo '<a href="'.$altMenuRow[$lehce."menu_href"].'">'.$altMenuRow[$lehce."menu_baslik"].'</a>';
                                            echo '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                    echo '</li>';
                                }else{
                                    echo '<li class="menu-item current-'.$linkactive.' menu-item-has-children"><a  href="'.$menuRow[$lehce."menu_href"].'">'.$menuRow[$lehce."menu_baslik"].'</a></li>';
                                }
                                $numb++;
                            }
                        }
                        ?>
                    </ul>
                </nav>

            </div>

            <div class="panel_bottom">
                <div class="contact_socials">
                    <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                        <div class="sc_socials_item">
                            <a class="social_icons social_facebook" href="<?php echo $ayar["facebook_url"];?>" target="_blank"><span class="icon-facebook"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_twitter" href="<?php echo $ayar["twitter_url"];?>" target="_blank"><span class="icon-twitter"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_gplus" href="<?php echo $ayar["google_url"];?>" target="_blank"><span class="icon-youtube"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_instagramm" href="<?php echo $ayar["linkedin_url"];?>" target="_blank"><span class="icon-instagramm"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mask"></div>
    </div>