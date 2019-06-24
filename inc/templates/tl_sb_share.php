<?php
global $tl_social_bucket;

$follow_wrapper_class = isset($tl_social_bucket["tl_sb_share_form"])?' '.$tl_social_bucket["tl_sb_share_form"]:'';

$share_icon_size = isset($tl_social_bucket["tl_sb_share_iconSize"])?$tl_social_bucket["tl_sb_share_iconSize"]:40;

$share_icon_padding = isset($tl_social_bucket["tl_sb_share_icon_padding"])?$tl_social_bucket["tl_sb_share_icon_padding"]:2;


$share_single_posts					=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['list'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['list']:[];
$share_single_post_sticky_value		=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['sticky'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['sticky']:'None';
$share_single_post_standard_value	=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['standard'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['singlePost']['standard']:[];

$share_page_posts					=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['list'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['list']:[];
$share_page_pos_sticky_value		=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['sticky'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['sticky']:'None';
$share_page_pos_standard_value		=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['standard'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['page']['standard']:[];

$share_blog_posts					=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['list'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['list']:[];
$share_blog_pos_sticky_value		=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['sticky'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['sticky']:'None';
$share_blog_pos_standard_value		=	isset($tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['standard'])?$tl_social_bucket[ "tl_sb_share_iconPlacement" ]['blogPage']['standard']:[];
?>
<div class = "tl-sb-socialtype tl-sb-share <?php echo $tl_social_bucket[ "tl_sb_share_form" ]; ?>" data-title = "share"  data-name = "tl-sb-share">
	<div class = "tl-sb-share-form" <?php echo $tl_social_bucket[ "tl_sb_share_block" ]; ?>>
		<div class = "tl-sb-form-general">
			<div class = "tl-sb-button-div">
				<p class = "tl-sb-button-title">Click on button to add or remove icon</p>
				<ul class = "tl-sb-buttons">
				
					
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_facebook"] ); ?> pg-icon-facebook" data-name="facebook"><span class="tl-sbbutton">Facebook</span></li>					
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_pinterest"] ); ?> pg-icon-pinterest" data-name="pinterest"><span class="tl-sbbutton">Pinterest</span></li>
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_twitter"] ); ?> pg-icon-twitter" data-name="twitter"><span class="tl-sbbutton">Twitter</span></li>
					<li class = "tl-sb-botton-icon btn-icon <?php echo $tl_social_bucket[ "tl_sb_whatsapp" ] ; ?> pg-icon-whatsapp" data-name = "whatsapp"><span class = "tl-sbbutton">whatsApp</span></li>					
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_linkedin"] ); ?> pg-icon-linkedin" data-name="linkedin"><span class="tl-sbbutton">Linkedin</span></li>	
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_tumblr"] ); ?> pg-icon-tumblr" data-name="tumblr"><span class="tl-sbbutton">Tumblr</span></li>	
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_buffer"] ); ?> pg-icon-buffer" data-name="buffer"><span class="tl-sbbutton">Buffer</span></li>						
					<li class="tl-sb-botton-icon btn-icon <?php echo esc_attr( $tl_social_bucket["tl_sb_reddit"] ); ?> pg-icon-reddit" data-name="reddit"><span class="tl-sbbutton">Reddit</span></li>	
				
				
				
				</ul>
			</div>
			<div class = "tl-sb-preview-area atl-sb-preview-area" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>icons">
				<h3><i class="far fa-eye"></i> Preview Area</h3>
				<?php echo isset( $tl_social_bucket[ "tl_sb_share_previewAreaContent" ] )?$tl_social_bucket[ "tl_sb_share_previewAreaContent" ]:''; ?>
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
				<div class = "tl-sb-col sb-block-left"><label>Title :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<input class = "tl-sb-follow-group-name" name = "tl-sb-follow-group-name" type = "text" value = "<?php echo esc_attr( $tl_social_bucket[ "tl_sb_share_socialName" ] ); ?>" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>name"/>
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
								<div class = "tl-sb-slider" data-min = "20" data-max = "100" data-step = "1" data-value = "48">
								</div>
								<input name = "tl-sb-follow-icon-size-default" class = "tl-sb-follow-icon-size-default range-value tl-sb-value tl-ice" type = "number" value = "<?php echo $share_icon_size ; ?>" min = "16" max = "168" step = "1" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>size">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Icons' Shape :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value select">
						<select class = "tl-sb-follow-shape" name = "tl-sb-follow-shape" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>bgShape">
							<option value = "Circle" <?php if($tl_social_bucket[ "tl_sb_share_iconShape" ] == 'Circle'){echo esc_attr( 'selected' );}?>>Circle</option>
							<option value = "Square" <?php if($tl_social_bucket[ "tl_sb_share_iconShape" ] == 'Square'){echo esc_attr( 'selected' );} ?>>Square</option>
							<option value = "Rounded Square" <?php if($tl_social_bucket[ "tl_sb_share_iconShape" ] == 'Rounded Square'){echo esc_attr( 'selected' );} ?>>Rounded Square</option>
							<option value = "Hexagon" <?php if($tl_social_bucket[ "tl_sb_share_iconShape" ] == 'Hexagon'){echo esc_attr( 'selected' );} ?>>Hexagon</option>
						</select>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Target Url:</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<div class = "definedslug" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>slug">
								<div class = "definedslug-opt"><input type = "radio" name = "tlsbshareslug" value = "homepage" <?php echo ($tl_social_bucket[ "tl_sb_share_link" ] == 'homepage')?'checked':''; ?>/>Homepage's url</div>
								<div class = "definedslug-opt"><input type = "radio" name = "tlsbshareslug" value = "postslug" <?php echo ($tl_social_bucket[ "tl_sb_share_link" ] == 'postslug')?'checked':''; ?>/>Individual Post/Page's url</div>
								<div class = "definedslug-opt"><input type = "radio" name = "tlsbshareslug" value = "customslug" <?php echo ($tl_social_bucket[ "tl_sb_share_link" ] == 'customslug')?'checked':''; ?>/>Custom url</div>
							</div>
							<input class = "tl-sb-share-customslug" type = "text" placeholder="http://example.com" onfocus="this.placeholder=''" onblur="this.placeholder='http://example.com'" value = "<?php echo $tl_social_bucket[ "tl_sb_share_customLink" ]; ?>" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>customSlug" style = "<?php echo $tl_social_bucket[ "tl_sb_share_customLink_show" ]; ?>"/>			
						</div>
					</div>							
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Visiblity in single post :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-label"></div>
						<div class = "sb-block-value-block">
							<div class = "tl-sb-icon-placement" data-save = "share><?php echo esc_attr($tl_social_bucket[ "tl_SB_theId" ] );?>>settings>placement>singlePost>list">
								<div class = "sb-block-value">
									<select class="tl-sb-single-post" multiple>
									<?php 
										$post_types = get_post_types();
										$exclude = ['attachment', 'revision', 'nav_menu_item', 'custom_css', 'oembed_cache', 'user_request', 'wp_block', 'customize_changeset', 'page'];
										foreach($post_types as $type):
											if( !in_array($type, $exclude) ): ?>										
												<option value = "<?php echo $type; ?>"<?php echo in_array($type, $share_single_posts)?' selected':''; ?>><?php echo $type; ?></option>																						
											<?php
											endif;
										endforeach;
										?>
									</select>
								</div>	
							</div>
						</div>
						<!-- Placement -->
						<div class="tl-sticky-option">
							<div class="sb-block-value-block">
								<div class="tlsb-icon-placement">
									<div class="label">Placement</div>
									<div class="tlsb-share-sticky" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>singlePost>sticky">
										<span>Sticky: </span> &nbsp;&nbsp;&nbsp;&nbsp;
										<span><input type="radio" name="singlePost" value="left"<?php echo ('None' == $share_single_post_sticky_value)?' checked':''; ?>/> None</span>
										<span><input type="radio" name="singlePost" value="left"<?php echo ('left' == $share_single_post_sticky_value)?' checked':''; ?>/> Left</span>
										<span><input type="radio" name="singlePost" value="right"<?php echo ('right' == $share_single_post_sticky_value)?' checked':''; ?>/> Right</span>
									</div>
									<div class="tlsb-share-standard" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>placement>singlePost>standard">
										<span>Standard: </span>
										<span><input type="checkbox" value="top"<?php echo in_array('top', $share_single_post_standard_value)?' checked':'';?>/> Before the content</span>
										<span><input type="checkbox" value="bottom"<?php echo in_array('bottom', $share_single_post_standard_value)?' checked':'';?>/> After the content</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Visiblity in Page :</label></div>	
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-label"></div>
						<div class = "sb-block-value-block">
							<div class = "tl-sb-icon-placement" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>page>list">
								<div class = "sb-block-value">
									<select class="tl-sb-page" multiple>
									<?php 
									$pages=get_pages();
									$frontpage_id = get_option( 'page_on_front' );
									$blog_id = get_option( 'page_for_posts' );
									foreach($pages as $post):
										if( $post->ID != $frontpage_id && $post->ID != $blog_id ):
									?>
											<option value = "<?php echo $post->ID; ?>"<?php echo in_array($post->ID, $share_page_posts)?' selected':'';?>><?php echo $post->post_title ?></option>	
										
									<?php
										endif;
									endforeach;
									?>	
									</select>
								</div>
							</div>
							<div class="tl-sticky-option">
								<div class="sb-block-value-block">
									<div class="tlsb-icon-placement">
										<div class="label">Placement</div>
										<div class="tlsb-share-sticky" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>page>sticky">
											<span>Sticky: </span>&nbsp;&nbsp;&nbsp;&nbsp;
											<span><input type="radio" name="page" value="left"<?php echo ('None' == $share_page_pos_sticky_value)?' checked':''; ?>/> None</span>
											<span><input type="radio" name="page" value="left"<?php echo ('left' == $share_page_pos_sticky_value)?' checked':''; ?>/> Left</span>
											<span><input type="radio" name="page" value="right"<?php echo ('right' == $share_page_pos_sticky_value)?' checked':''; ?>/> Right</span>
										</div>
										<div class="tlsb-share-standard" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>page>standard">
											<span>Standard: </span>
											<span><input type="checkbox" value="top"<?php echo in_array('top', $share_page_pos_standard_value)?' checked':'';?>/> Before the content</span>
											<span><input type="checkbox" value="bottom"<?php echo in_array('bottom', $share_page_pos_standard_value)?' checked':'';?>/> After the content</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>							
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Visiblity in Blog Page :</label></div>	
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-label"></div>
						<div class = "sb-block-value-block">
							<div class = "tl-sb-icon-placement tlsb-blogpage" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>blogPage>list">
								<p class="placement-checkbox"><input type="checkbox" value = "postContent"<?php echo in_array('postContent', $share_blog_posts)?' checked':''; ?>>Post List</p>
								<p class="placement-checkbox"><input type="checkbox" value = "pageContent"<?php echo in_array('pageContent', $share_blog_posts)?' checked':''; ?>>Blog page</p>
							</div>
						</div>
						<div class="tl-sticky-option">
							<div class="sb-block-value-block">
								<div class="tlsb-icon-placement">
									<div class="label">Placement</div>
									<div class="tlsb-share-sticky" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>blogPage>sticky">
										<span>Sticky: </span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span><input type="radio" name="blogPage" value="left"<?php echo ('None' == $share_blog_pos_sticky_value)?' checked':''; ?>/> None</span>
										<span><input type="radio" name="blogPage" value="left"<?php echo ('left' == $share_blog_pos_sticky_value)?' checked':''; ?>/> Left</span>
										<span><input type="radio" name="blogPage" value="right"<?php echo ('right' == $share_blog_pos_sticky_value)?' checked':''; ?>/> Right</span>
									</div>
									<div class="tlsb-share-standard" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>placement>blogPage>standard">
										<span>Standard: </span>
										<span><input type="checkbox" value="top"<?php echo in_array('top', $share_blog_pos_standard_value)?' checked':'';?>/> Before the content</span>
										<span><input type="checkbox" value="bottom"<?php echo in_array('bottom', $share_blog_pos_standard_value)?' checked':'';?>/> After the content</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label>Padding :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block">
							<input type = "number" class = "tl-sb-icon-padding" name = "tl-sb-icon-padding" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ];?>>settings>padding" value = "<?php echo $share_icon_padding; ?>"><b>px</b>
							<span class = "tl-sb-message"><i>Notice: This change will appear only on front-end</i></span>
						</div>
					</div>
				</div>
			</div>
			<div class = "sb-row-block">
				<div class = "tl-sb-col sb-block-left"><label><i class="fas fa-link"></i> Open the link :</label></div>
				<div class = "tl-sb-col sb-block-right">
					<div class = "sb-block-value">
						<div class = "sb-block-value-block select">
							<select class = "tl-sb-icon-link-open-tab" name = "tl-sb-icon-link-open-tab" data-save = "share><?php echo $tl_social_bucket[ "tl_SB_theId" ] ;?>>settings>link_open_opt">
								<option value = "_blank" <?php if($tl_social_bucket[ "tl_sb_share_iconLinkOpen" ] == '_blank'){echo 'selected';} ?>>New tab</option>
									<option value = "_self" <?php if($tl_social_bucket[ "tl_sb_share_iconLinkOpen" ] == '_self'){echo 'selected';} ?>>Same tab</option>
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