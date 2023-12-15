                <div class="sc_section custom_bg_2">
                	<div class="content_wrap">
                		<div class="sc_empty_space" data-height="2.2em"></div>
                		<div class="sc_section margin_top_huge margin_bottom_huge">
                			<div class="sc_section_inner">
                				<h2 class="sc_section_title sc_item_title"><?php echo $blokRow["baslik1"];?> </h2>
                				<div class="sc_section_descr sc_item_descr">
                					<?php echo $blokRow["desc1"];?>

                				</div>
                				<div class="sc_empty_space" data-height="0.7em"></div>
                				<div class="columns_wrap sc_columns margin_top_tiny">


                					<?php
                					$haberQuery = $db->query("SELECT * FROM sayfalar WHERE sayfa_durum=1 AND sayfa_id=1 ");
                					if( $haberQuery->rowCount() ){
                						foreach($haberQuery as $haberRow){
                							$haberUrl = LURL.'haberler/'.$haberRow["sayfa_url"].'/';
                							?>
                							
                							
                							<div class="column-1_2 sc_column_item">
                								<figure class="sc_image style_img">
                									<img alt="<?php echo $haberRow[$lehce."sayfa_desc"];?>" class="first" src="<?php echo URL;?>images/sayfalar/big/<?php echo $haberRow["sayfa_resim"];?>"> <img alt="<?php echo $haberRow[$lehce."sayfa_desc"];?>" class="second" src="<?php echo URL;?>images/hak1.png">
                								</figure>
                							</div>
                							<div class="column-1_2 sc_column_item">
                								<div class="sc_empty_space" data-height="1.5em"></div>
                								<h4 class="sc_title sc_title_regular margin_top_small margin_bottom_tiny"><?php echo $haberRow[$lehce."sayfa_desc"];?></h4>
                									<?php echo $haberRow[$lehce."sayfa_icerik"];?>
                									<a class="sc_button sc_button_style_filled sc_button_size_medium margin_top_small margin_bottom_small" href="<?php echo URL; ?>hakkimizda">Devamı...</a>
                								</div>


                								<?php
                							}
                						}?>
                					</div>
                				</div>
                			</div>
                			<div class="sc_empty_space" data-height="2em"></div>
                		</div>
                	</div>