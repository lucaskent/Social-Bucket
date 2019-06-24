<?php
global $tl_social_bucket;

$follow_wrapper_class = isset($tl_social_bucket["tl_sb_review_form"])?' '.$tl_social_bucket["tl_sb_review_form"]:'';

$review_icon_size = isset($tl_social_bucket["tl_sb_review_iconSize"])?$tl_social_bucket["tl_sb_review_iconSize"]:40;

$review_icon_padding = isset($tl_social_bucket["tl_sb_review_icon_padding"])?$tl_social_bucket["tl_sb_review_icon_padding"]:2;
?>
<div class = "tl-sb-socialtype tl-sb-review <?php echo $tl_social_bucket[ "tl_sb_review_form" ]; ?>" data-title = "review"  data-name = "tl-sb-review">
	<div class = "tl-sb-review-form" <?php echo $tl_social_bucket[ "tl_sb_review_block" ]; ?>>
		<div class = "tl-sb-form-general">
			<div class = "tl-sb-button-div">
				<p class = "tl-sb-button-title">Click on button to add or remove icon</p>
				<ul class = "tl-sb-buttons">
					<li class = "tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket[ "tl_sb_facebook" ] ); ?> pg-icon-facebook" data-name = "facebook"><span class = "tl-sbbutton">Facebook</span></li>
					<li class = "tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket[ "tl_sb_yelp" ] ); ?> pg-icon-yelp" data-name = "yelp"><span class = "tl-sbbutton">Yelp</span></li>
					<li class = "tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket[ "tl_sb_googlemybusiness" ] ); ?> pg-icon-googlemybusiness" data-name = "googlemybusiness"><span class = "tl-sbbutton">Google My Business</span></li>
				</ul>
			</div>
			<div class = "tl-sb-preview-area atl-sb-preview-area" data-save = "review><?php echo $tl_SB_theId;?>>icons">
				<h3><i class="far fa-eye"></i> preview Area</h3>
				<?php echo $tl_social_bucket[ "tl_sb_review_previewAreaContent" ]; ?>
			</div>			
		</div>
		<div class = "tl-sb-setting-area">
			<div class = "tl-settings-left">
				<ul class = "tl-sb-icon-name-list"></ul>
			</div>
			<div class = "tl-settings-right"></div>				
		</div>
		<div class = "tl-sb-form-settings-general">
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Name :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<input class = "tl-sb-follow-group-name" name = "tl-sb-follow-group-name" type = "text" value = "<?php echo $tl_social_bucket[ "tl_sb_review_socialName" ] ; ?>" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>name"/>
						</div>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Display stars below icon :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-label"></div>
						<div class = "sb-block-value-block">
							<input type = "checkbox" id = "tl-sb-review-addStar" class = "tl-sb-follow-addStar" style = "display:none;" name = "tl-sb-follow-addStar" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>addStar" <?php echo $tl_social_bucket[ "tl_sb_review_iconStar" ] ; ?>/>
							<label for = "tl-sb-review-addStar" class = "toggle" ><span></span>
						</div>
					</div>
				</div>
			</div>	
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Icons' Size :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-label"></div>
						<div class = "sb-block-value-block">
							<div class = "uislider-wrapper">
								<div class = "tl-sb-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-min = "20" data-max = "100" data-step = "1" data-value = "48">
									<span class = "ui-slider-handle ui-state-default ui-corner-all" tabindex = "0" style = "left: 0% ;"></span>
								</div>
								<input name = "tl-sb-follow-icon-size-default" class = "tl-sb-follow-icon-size-default range-value tl-sb-value tl-ice" type = "number" value = "<?php echo $review_icon_size ; ?>" min = "16" max = "168" step = "1" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>size">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Icons' Shape :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value select">
						<select class = "tl-sb-follow-shape" name = "tl-sb-follow-shape" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>bgShape">
							<option value = "Circle" <?php if($tl_social_bucket[ "tl_sb_review_iconShape" ] == 'Circle'){echo 'selected';}?>>Circle</option>
							<option value = "Square" <?php if($tl_social_bucket[ "tl_sb_review_iconShape" ] == 'Square'){echo 'selected';} ?>>Square</option>
							<option value = "Rounded Square" <?php if($tl_social_bucket[ "tl_sb_review_iconShape" ] == 'Rounded Square'){echo 'selected';} ?>>Rounded Square</option>
							<option value = "Hexagon" <?php if($tl_social_bucket[ "tl_sb_review_iconShape" ] == 'Hexagon'){echo 'selected' ;} ?>>Hexagon</option>
						</select>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Padding :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<input type = "number" class = "tl-sb-icon-padding" name = "tl-sb-icon-padding" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>padding" value = "<?php echo $review_icon_padding ; ?>"><b>px</b>
							<span class = "tl-sb-message"><i>Notice: This change will appear only on the front-end</i></span>
						</div>
					</div>							
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Is Sticky:</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<div class = "tl-sb-stickyopt">
								<div class = "ch-bx">
									<input type = "checkbox" id = "tl-sb-review-isSticky" class = "tl-sb-follow-isSticky" style = "display:none" <?php echo $tl_social_bucket[ "tl_sb_review_iconIsSticky" ] ; ?> data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>isSticky"/>
									<label for = "tl-sb-review-isSticky" class = "toggle"><span></span>
								</div>
								<div class = "tl-sb-stickyenable select">
									<select class = "tl-sb-follow-icon-stickyPos" name = "tl-sb-follow-icon-stickyPos" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>stickyPos" <?php echo $tl_social_bucket[ "tl_sb_review_iconStickyPos" ];?>>
									<option value = "left" <?php if($tl_social_bucket[ "tl_sb_review_iconStickyPosDisplay" ] == 'left'){echo 'selected';} ?>>Left</option>
									<option value = "right" <?php if($tl_social_bucket[ "tl_sb_review_iconStickyPosDisplay" ] == 'right'){echo 'selected';} ?>>Right</option>
									</select>									 
								</div>									
							</div>
						</div>
					</div>
				</div>
			</div>		
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label><i class="fas fa-link"></i> Open the link :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block select">
							<select class = "tl-sb-icon-link-open-tab" name = "tl-sb-icon-link-open-tab" data-save = "review><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>link_open_opt">
								<option value = "_blank" <?php if($tl_social_bucket[ "tl_sb_review_iconLinkOpen" ] == '_blank'){echo 'selected';} ?>>New tab</option>
								<option value = "_self" <?php if($tl_social_bucket[ "tl_sb_review_iconLinkOpen" ] == '_self'){echo 'selected';} ?>>Same tab</option>
							</select>
						</div>
					</div>							
				</div>
			</div>
		</div>
		<div class = "tl-sb-savearea">
			<div class = "submit tl-sb-anchor-btn"><span id = "tl-sb-submit-button" class = "tl-sb-submit-button">Save Changes</span></div>
		</div>
	</div>
</div>