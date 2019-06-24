<?php
global $tl_social_bucket;
$on_edit_script = null;

$tl_social_bucket_array = get_option( 'tl_sb_settings', [] );
	
if( is_string( $tl_social_bucket_array ) )
	$tl_social_bucket_array = [] ;

$tl_sb_action = isset( $_GET[ 'action' ] ) ? sanitize_text_field( $_GET[ 'action' ] ):null;
$tl_sb_type = isset( $_GET[ 'type' ] ) ? sanitize_text_field( $_GET[ 'type' ] ):'review';
$tl_social_bucket[ "tl_sb_follow_block" ] = $tl_social_bucket[ "tl_sb_share_block" ] = $tl_social_bucket[ "tl_sb_review_block" ] = sanitize_text_field('style = display:none ;' );
$tl_social_bucket[ "tl_sb_follow_form" ] = $tl_social_bucket[ "tl_sb_share_form" ] = $tl_social_bucket[ "tl_sb_review_form" ] = '' ;
$formDisplay = isset( $tl_sb_action ) ? 'display:block ;':'display:none ;';
$tl_sb_pAIcon = [];
if( $tl_sb_type == 'follow' ){	
	$tl_social_bucket[ "tl_sb_follow_block" ] = sanitize_text_field( 'style = display:block ;' );
	$tl_social_bucket[ "tl_sb_follow_form" ] = sanitize_text_field( 'active' );
	if( isset( $tl_sb_action ) ){
		if( $tl_sb_action == 'addNew' ){
			$idKey =  isset( $tl_social_bucket_array[ 'follow' ] ) && count( $tl_social_bucket_array[ 'follow' ] )>0?array_keys( $tl_social_bucket_array[ 'follow' ] ):'' ;
			if( is_array( $idKey ) ){
				$idKe = $idKey[ count( $idKey ) -1 ];
			}else{
				$idKe = '0' ;
			}
			$tl_social_bucket[ "tl_SB_theId" ] = ( ( int )$idKe) + 1;
			$tl_social_bucket[ "tl_sb_socialName" ] = 'Follow us';
			$tl_social_bucket[ "tl_sb_iconSize" ] = '40';
			$tl_social_bucket[ "tl_sb_iconShape" ] = 'Circle';
			$tl_social_bucket[ "tl_sb_iconIsSticky" ] = '';
			$tl_social_bucket[ "tl_sb_iconStickyPos" ] = 'style = "display:none ;"';
			$tl_social_bucket[ "tl_sb_iconStickyPosDisplay" ] = 'Left';
			$tl_social_bucket[ "tl_sb_iconLinkOpen" ] = '_self';
			$tl_social_bucket[ "tl_sb_previewAreaContent" ] = '';
			$tl_social_bucket[ "tl_sb_icon_padding" ] = 2;
			$tl_social_bucket[ "tl_sb_iconStar" ] = '';
		}
		if( $tl_sb_action == 'edit' ){
			$tl_social_bucket[ "tl_SB_theId" ] =  sanitize_text_field($_GET[ 'id' ] );
			$tl_sb_idArray = $tl_social_bucket_array[ 'follow' ][ $tl_social_bucket[ "tl_SB_theId" ] ];
			$tl_social_bucket[ "tl_sb_socialName" ] = isset($tl_sb_idArray[ 'settings' ][ 'name' ])?$tl_sb_idArray[ 'settings' ][ 'name' ]:'Follow us';
			$tl_social_bucket[ "tl_sb_iconSize" ] = isset($tl_sb_idArray[ 'settings' ][ 'size' ])?$tl_sb_idArray[ 'settings' ][ 'size' ]:'40';
			$tl_social_bucket[ "tl_sb_iconShape" ] = isset($tl_sb_idArray[ 'settings' ][ 'bgShape' ])?$tl_sb_idArray[ 'settings' ][ 'bgShape' ]:'Circle';
			$tl_social_bucket[ "tl_sb_iconIsSticky" ] = isset($tl_sb_idArray[ 'settings' ][ 'isSticky' ]) && ($tl_sb_idArray[ 'settings' ][ 'isSticky' ]) == 'Checked'?'Checked':'';
			$tl_social_bucket[ "tl_sb_iconStickyPos" ] = ($tl_social_bucket[ "tl_sb_iconIsSticky" ] == 'Checked')?'':'style = "display:none ;"' ;
			$tl_social_bucket[ "tl_sb_iconStickyPosDisplay" ] = isset($tl_sb_idArray[ 'settings' ][ 'stickyPos' ])?$tl_sb_idArray[ 'settings' ][ 'stickyPos' ]:'Left' ;
			$tl_social_bucket[ "tl_sb_iconStar" ] = isset($tl_sb_idArray[ 'settings' ][ 'addStar' ])?'checked':'' ;
			$tl_social_bucket[ "tl_sb_icon_padding" ] = isset($tl_sb_idArray[ 'settings' ][ 'padding' ])?$tl_sb_idArray[ 'settings' ][ 'padding' ]:2;
			$tl_social_bucket[ "tl_sb_iconLinkOpen" ] = isset($tl_sb_idArray[ 'settings' ][ 'link_open_opt' ])?$tl_sb_idArray[ 'settings' ][ 'link_open_opt' ]:'_self';
			$tl_social_bucket[ "tl_sb_previewAreaContent" ] = '';		
			if( isset( $tl_sb_idArray[ 'icons' ] ) ){
				foreach( $tl_sb_idArray[ 'icons' ] as $iconkey =>$icon ){
					$tl_social_bucket[ "tl_sb_previewAreaContent" ] .=  stripslashes_deep( $icon[ 'content' ] );
					$tl_sb_pAIcon[ $iconkey ] = 'active';
				}
				$tl_sb_all_icon_index = array_keys( $tl_sb_idArray[ 'icons' ] );
			}
		}
	}
}
else if( $tl_sb_type == 'share' ){
	$tl_social_bucket[ "tl_sb_share_block" ] = 'style = display:block ;';
	$tl_social_bucket[ "tl_sb_share_form" ] = 'active';
	if( isset( $tl_sb_action ) ){
		if( $tl_sb_action == 'addNew' ){
			$idKey =  isset( $tl_social_bucket_array[ 'share' ] ) && count( $tl_social_bucket_array[ 'share' ] )>0?array_keys( $tl_social_bucket_array[ 'share' ] ):'';
			if( is_array( $idKey ) ){
				$idKe = $idKey[ count( $idKey )-1 ];
			}else{
				$idKe = '0';
			}
			$tl_social_bucket[ "tl_SB_theId" ] = ( ( int )$idKe) + 1;
			$tl_social_bucket[ "tl_sb_share_socialName" ] = 'Share on';
			$tl_social_bucket[ "tl_sb_share_iconSize" ] = 40;
			$tl_social_bucket[ "tl_sb_share_iconShape" ] = 'Circle';
			$tl_social_bucket[ "tl_sb_share_iconIsSticky" ] = '';
			$tl_social_bucket[ "tl_sb_share_iconStickyPos" ] = 'style = "display:none ;"';
			$tl_social_bucket[ "tl_sb_share_iconStickyPosDisplay" ] = 'Left';
			$tl_social_bucket[ "tl_sb_share_iconLinkOpen" ] = '_self';
			$tl_social_bucket[ "tl_sb_share_previewAreaContent" ] = '';
			$tl_social_bucket[ "tl_sb_share_icon_padding" ] = 2;
			$tl_social_bucket[ "tl_sb_share_iconStar" ] = '';
			$tl_social_bucket[ "tl_sb_share_iconPosTop" ] = '';
			$tl_social_bucket[ "tl_sb_share_iconPosBottom" ] = 'checked';
			$tl_social_bucket[ "tl_sb_share_customLink" ] = '';			
			$tl_social_bucket[ "tl_sb_share_link" ] = 'postslug';
			$tl_social_bucket[ "tl_sb_share_iconPlacement" ] = [];
			$tl_social_bucket[ "tl_sb_share_customLink_show" ] =  'display:none ;';

		}
		if( $tl_sb_action == 'edit' ){
			$tl_social_bucket[ "tl_SB_theId" ] =  sanitize_text_field($_GET[ 'id' ] );
			$tl_sb_idArray = $tl_social_bucket_array[ 'share' ][ $tl_social_bucket[ "tl_SB_theId" ] ];
			$tl_social_bucket[ "tl_sb_share_socialName" ] = isset( $tl_sb_idArray[ 'settings' ][ 'name' ] )? $tl_sb_idArray[ 'settings' ][ 'name' ] : 'Share on';
			$tl_social_bucket[ "tl_sb_share_iconSize" ] = isset( $tl_sb_idArray[ 'settings' ][ 'size' ]) ? $tl_sb_idArray[ 'settings' ][ 'size' ] : 40;
			$tl_social_bucket[ "tl_sb_share_iconShape" ] = isset( $tl_sb_idArray[ 'settings' ][ 'bgShape' ]) ? $tl_sb_idArray[ 'settings' ][ 'bgShape' ] : 'Circle';
			$tl_social_bucket[ "tl_sb_share_link" ] = isset( $tl_sb_idArray[ 'settings' ][ 'slug' ]) ? $tl_sb_idArray[ 'settings' ][ 'slug' ] : 'postslug';
			$tl_social_bucket[ "tl_sb_share_customLink" ] = ( $tl_social_bucket[ "tl_sb_share_link" ] == "customslug" ) && isset( $tl_sb_idArray[ 'settings' ][ 'customSlug' ]) ? $tl_sb_idArray[ 'settings' ][ 'customSlug' ] : '#';
			$tl_social_bucket[ "tl_sb_share_customLink_show" ] = $tl_social_bucket[ "tl_sb_share_link" ] == 'customslug' ? 'display:block ;' : 'display:none ;';
			$tl_social_bucket[ "tl_sb_share_iconPosTop" ] = isset( $tl_sb_idArray[ 'settings' ][ 'iconPosTop' ]) && ($tl_sb_idArray[ 'settings' ][ 'iconPosTop' ]) == 'Checked' ? 'Checked' : '';
			$tl_social_bucket[ "tl_sb_share_iconPosBottom" ] = isset( $tl_sb_idArray[ 'settings' ][ 'iconPosBottom' ]) && ($tl_sb_idArray[ 'settings' ][ 'iconPosBottom' ]) == 'Checked' ? 'Checked':'';
			$tl_social_bucket[ "tl_sb_share_iconPlacement" ] = isset( $tl_sb_idArray[ 'settings' ][ 'placement' ] ) ? $tl_sb_idArray[ 'settings' ][ 'placement' ] : [];
			$tl_social_bucket[ "tl_sb_share_iconIsSticky" ] = isset( $tl_sb_idArray[ 'settings' ][ 'isSticky' ] ) && ( $tl_sb_idArray[ 'settings' ][ 'isSticky' ]) == 'Checked' ? 'Checked' : '';
			$tl_social_bucket[ "tl_sb_share_iconStickyPos" ] = ($tl_social_bucket[ "tl_sb_share_iconIsSticky" ] == 'Checked')?'':'style = "display:none ;"';
			$tl_social_bucket[ "tl_sb_share_iconStickyPosDisplay" ] = isset($tl_sb_idArray[ 'settings' ][ 'stickyPos' ])?$tl_sb_idArray[ 'settings' ][ 'stickyPos' ]:'Left';		
			$tl_social_bucket[ "tl_sb_share_iconStar" ] = isset( $tl_sb_idArray[ 'settings' ][ 'addStar' ] ) ? 'checked' : '';
			$tl_social_bucket[ "tl_sb_share_icon_padding" ] = isset( $tl_sb_idArray[ 'settings' ][ 'padding' ] ) ? $tl_sb_idArray[ 'settings' ][ 'padding' ] : 2;
			$tl_social_bucket[ "tl_sb_share_iconLinkOpen" ] = isset( $tl_sb_idArray[ 'settings' ][ 'link_open_opt' ] ) ? $tl_sb_idArray[ 'settings' ][ 'link_open_opt' ] : '_self';
			$tl_social_bucket[ "tl_sb_share_previewAreaContent" ] = '';		
			if( isset( $tl_sb_idArray[ 'icons' ] ) ){
				foreach( $tl_sb_idArray[ 'icons' ] as $iconkey => $icon ){
					$tl_social_bucket[ "tl_sb_share_previewAreaContent" ] .=  stripslashes_deep( $icon[ 'content' ] );
					$tl_sb_pAIcon[ $iconkey ] = 'active';
				}
				$tl_sb_all_icon_index = array_keys( $tl_sb_idArray[ 'icons' ] );
			}
		}
	}
}
else if( $tl_sb_type == 'review' ){
	$tl_social_bucket[ "tl_sb_review_block" ] = 'style = display:block ;';
	$tl_social_bucket[ "tl_sb_review_form" ] = 'active';
	if( isset( $tl_sb_action ) ){
		if( $tl_sb_action == 'addNew' ){
			$idKey =  isset( $tl_social_bucket_array[ 'review' ] ) && count( $tl_social_bucket_array[ 'review' ] )>0 ? array_keys( $tl_social_bucket_array[ 'review' ] ) : '';
			if( is_array( $idKey ) ){
				$idKe = $idKey[ count( $idKey )-1 ];
			}else{
				$idKe = '0';
			}
			$tl_social_bucket[ "tl_SB_theId" ] = ( ( int )$idKe) + 1;
			$tl_social_bucket[ "tl_sb_review_socialName" ] = 'Show review';
			$tl_social_bucket[ "tl_sb_review_iconSize" ] = 40;
			$tl_social_bucket[ "tl_sb_review_iconShape" ] = 'Circle';
			$tl_social_bucket[ "tl_sb_review_iconIsSticky" ] = '' ;
			$tl_social_bucket[ "tl_sb_review_iconStickyPos" ] = 'style = "display:none ;"';
			$tl_social_bucket[ "tl_sb_review_iconStickyPosDisplay" ] = 'Left';
			$tl_social_bucket[ "tl_sb_review_iconLinkOpen" ] = '_self';
			$tl_social_bucket[ "tl_sb_review_previewAreaContent" ] = '';
			$tl_social_bucket[ "tl_sb_review_icon_padding" ] = 2;
			$tl_social_bucket[ "tl_sb_review_iconStar" ] = '';
		}
		if( $tl_sb_action == 'edit' ){
			$tl_social_bucket[ "tl_SB_theId" ] =  sanitize_text_field($_GET[ 'id' ] );
			$tl_sb_idArray = $tl_social_bucket_array[ 'review' ][ $tl_social_bucket[ "tl_SB_theId" ] ];
			$tl_social_bucket[ "tl_sb_review_socialName" ] = isset( $tl_sb_idArray[ 'settings' ][ 'name' ] ) ? $tl_sb_idArray[ 'settings' ][ 'name' ] : 'Show review';
			$tl_social_bucket[ "tl_sb_review_iconSize" ] = isset( $tl_sb_idArray[ 'settings' ][ 'size' ] ) ? $tl_sb_idArray[ 'settings' ][ 'size' ] : 40 ;
			$tl_social_bucket[ "tl_sb_review_iconShape" ] = isset( $tl_sb_idArray[ 'settings' ][ 'bgShape' ] ) ? $tl_sb_idArray[ 'settings' ][ 'bgShape' ] : 'Circle';
			$tl_social_bucket[ "tl_sb_review_iconIsSticky" ] = isset( $tl_sb_idArray[ 'settings' ][ 'isSticky' ] ) && ( $tl_sb_idArray[ 'settings' ][ 'isSticky' ] ) == 'Checked' ? 'Checked' : '';
			$tl_social_bucket[ "tl_sb_review_iconStickyPos" ] = ( $tl_social_bucket[ "tl_sb_review_iconIsSticky" ] == 'Checked' ) ? '' : 'style = "display:none ;"';
			$tl_social_bucket[ "tl_sb_review_iconStickyPosDisplay" ] = isset($tl_sb_idArray[ 'settings' ][ 'stickyPos' ])?$tl_sb_idArray[ 'settings' ][ 'stickyPos' ]:'Left';
			$tl_social_bucket[ "tl_sb_review_iconStar" ] = isset( $tl_sb_idArray[ 'settings' ][ 'addStar' ] ) ? 'checked' : '' ;
			$tl_social_bucket[ "tl_sb_review_icon_padding" ] = isset( $tl_sb_idArray[ 'settings' ][ 'padding' ] ) ? $tl_sb_idArray[ 'settings' ][ 'padding' ] : 2 ;
			$tl_social_bucket[ "tl_sb_review_iconLinkOpen" ] = isset( $tl_sb_idArray[ 'settings' ][ 'link_open_opt' ] ) ? $tl_sb_idArray[ 'settings' ][ 'link_open_opt' ] : '_self';
			$tl_social_bucket[ "tl_sb_review_previewAreaContent" ] = '';		
			if( isset( $tl_sb_idArray[ 'icons' ] ) ){
				foreach( $tl_sb_idArray[ 'icons' ] as $iconkey =>$icon ){
					$tl_social_bucket[ "tl_sb_review_previewAreaContent" ] .=  stripslashes_deep( $icon[ 'content' ] );
					$tl_sb_pAIcon[ $iconkey ] = 'active';
				}
				$tl_sb_all_icon_index = array_keys( $tl_sb_idArray[ 'icons' ] ) ;				
			}
		}
	}
}else{
	$tl_social_bucket[ "tl_sb_follow_form" ] = 'active';
}
if( $tl_sb_action == 'edit' ){
	 $on_edit_script = '<script>'.
		'window.onload = function(){'.
		'let args = {};'.
		'let body_data = jQuery(".tl-sb-icon-data").text();'.
		'body_data = JSON.parse(body_data);'.
		'args = (body_data[ "'.$tl_sb_type.'" ][ '.$tl_social_bucket[ "tl_SB_theId" ].' ][ "icons" ][ "'.$tl_sb_all_icon_index[ 0 ].'" ]);'.
		'args.name = "'.$tl_sb_all_icon_index[ 0 ].'" ;'.
		'tl_cb_iconAction.openIconSetting(args);'.
		'tl_sb_generateIconProperty.openIconName(body_data[ "'.$tl_sb_type.'" ][ '.$tl_social_bucket[ "tl_SB_theId" ].' ], '.$tl_social_bucket[ "tl_SB_theId" ].');'.
		'}</script>';
}
$prevValue = isset( $tl_social_bucket_array ) && count( $tl_social_bucket_array )>0 ? json_encode( $tl_social_bucket_array ) : '';
$tl_social_bucket[ "tl_sb_facebook" ]			= isset( $tl_sb_pAIcon[ 'facebook' ] ) ? $tl_sb_pAIcon[ 'facebook' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_twitter" ]			= isset( $tl_sb_pAIcon[ 'twitter' ] ) ? $tl_sb_pAIcon[ 'twitter' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_linkedin" ]			= isset( $tl_sb_pAIcon[ 'linkedin' ] ) ? $tl_sb_pAIcon[ 'linkedin' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_pinterest" ]			= isset( $tl_sb_pAIcon[ 'pinterest' ] ) ? $tl_sb_pAIcon[ 'pinterest' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_instagram" ]			= isset( $tl_sb_pAIcon[ 'instagram' ] ) ? $tl_sb_pAIcon[ 'instagram' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_youtube" ]			= isset( $tl_sb_pAIcon[ 'youtube' ] ) ? $tl_sb_pAIcon[ 'youtube' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_yelp" ]				= isset( $tl_sb_pAIcon[ 'yelp' ]) ? $tl_sb_pAIcon[ 'yelp' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_googlemybusiness" ] 	= isset( $tl_sb_pAIcon[ 'googlemybusiness' ] ) ? $tl_sb_pAIcon[ 'googlemybusiness' ] : 'no-icon';
$tl_social_bucket[ "tl_sb_tumblr" ]				= isset( $tl_sb_pAIcon[ "tumblr" ] ) ? $tl_sb_pAIcon[ "tumblr" ] : 'no-icon';
$tl_social_bucket[ "tl_sb_buffer" ] 			= isset( $tl_sb_pAIcon[ "buffer" ] ) ? $tl_sb_pAIcon[ "buffer" ] : 'no-icon';
$tl_social_bucket[ "tl_sb_whatsapp" ]			= isset( $tl_sb_pAIcon[ "whatsapp" ] ) ? $tl_sb_pAIcon[ "whatsapp" ] : 'no-icon';
$tl_social_bucket[ "tl_sb_reddit" ]				= isset( $tl_sb_pAIcon[ "reddit" ] ) ? $tl_sb_pAIcon[ "reddit" ] : 'no-icon';
?>
<div class = "tl-social-bucket-wrapper">
	<div class = "tl-sb-row tl-sb-social-type">
		<input type = "hidden" id = "tl-prev-obj-value" value = '<?php echo stripcslashes($prevValue) ; ?>'>	
		<span class = "tl-sb-social-text <?php echo esc_attr( $tl_social_bucket[ "tl_sb_follow_form" ] ); ?>" data-name = "follow" data-type = "tl-sb-follow" data-id = "<?php echo esc_attr( $tl_social_bucket[ "tl_SB_theId" ] );?>"><i class="fas fa-eye"></i> Follow</span>
		<span class = "tl-sb-social-text <?php echo esc_attr( $tl_social_bucket[ "tl_sb_review_form" ] ); ?>" data-name = "review" data-type = "tl-sb-review"  data-id = "<?php echo esc_attr( $tl_social_bucket[ "tl_SB_theId" ] );?>"><i class="fab fa-rev"></i> Review</span>
		<span class = "tl-sb-social-text <?php echo esc_attr( $tl_social_bucket[ "tl_sb_share_form" ] ); ?>" data-name = "share" data-type = "tl-sb-share"  data-id = "<?php echo esc_attr( $tl_social_bucket[ "tl_SB_theId" ] );?>"><i class="fas fa-share-alt"></i> Share</span>
		
	</div>
	<div class = "tl-sb-form" style = "<?php echo esc_attr( $formDisplay ); ?>">
		<?php
		tlsb_include_file( '/inc/templates/tl_sb_follow.php' );
		tlsb_include_file( '/inc/templates/tl_sb_review.php' );
		tlsb_include_file( '/inc/templates/tl_sb_share.php' );
		?>
		<div class = "tl-sb-icon-data" style = "display:none ;"></div>		
	</div>
</div>
<!-- display area -->
<div class = "tl-sb-table">
<?php

if( is_array( $tl_social_bucket_array )){
	foreach( $tl_social_bucket_array as $key  => $valueofArray ){		
	?>
		<div class = "tl-sb-data-row tl-sb-preview-<?php echo esc_attr( $key ); ?>">
			<div class = "tl-sb-innertab">
			<?php 
			if( is_array( $valueofArray ) ){
				foreach( $valueofArray as $idKey =>$id ){
					if( isset( $id[ 'settings' ][ 'name' ] ) ){?>
						<div class="tl-sb-data-inner-row">
							<div class="tl-sb-dt-property">
								<div class="tl-sb-dt-property-inner">
									<div class="tl-sb-preview-area">
										<?php
										if( is_array( $id[ 'settings' ][ 'ordering' ] ) ){
											foreach( $id[ 'settings' ][ 'ordering' ] as $icon ){
												echo stripslashes_deep( $id['icons'][$icon][ 'content' ] );
											}
										}?>
									</div>
									<div class="tl-sb-shortcode">
										<input type="text" class="tl-sb-the-shortcode" value="<?php echo esc_attr( tl_sb_shortCode( $idKey, $key ) ); ?>" readonly = "readonly">
										<div class="tl-sb-anchor-btn">
											<span class="tl-sb-copy-button copy-this">
												<i class="fas fa-copy" title="Copy Shortcode"></i>
											</span>
											<span class="copied-to-clipboard code-msg" style="display: none ;">Copied</span>
										</div>										
									</div>
									<div class="tl-sb-data-edit">
										<div class="tl-sb-action">
											<div class="tl-sb-action-inner action-edit">
												<a href="admin.php?page=tl-social-bucket&action=edit&id=<?php echo esc_attr( $idKey ); ?>&type=<?php echo esc_attr( $key );?>">
													<span class="dashicons dashicons-edit"></span>
												</a>
											</div>
											<div id="tl_sb_sgroup_delete" class="tl-sb-action-inner action-delete" data-id =<?php echo esc_attr( $idKey ); ?>">
												<span class="dashicons dashicons-trash"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				}
			}?>
						<div class="tl-sb-data-inner-row add-new">
							<div class="add-new-btn-block">
								<div class="add-new-btn-inner">
									<a class = "tl-sb-anchor-btn tl-sb-add-new-button" href="admin.php?page=tl-social-bucket&amp;action=addNew">
										<span class = "dashicons dashicons-plus"></span>
										<span class = "tl-sb-btn-text">Add New</span>
									</a>
								</div>
							</div>
						</div>
			</div>
		</div>
	<?php
	}
}
?>
</div>
<?php
echo $on_edit_script ;
?>
<div class = "save-msg">
	<div class = "message">
	  <div class = "check"><i class="fas fa-check"></i></div>
	  <p>Success</p>
	  <p>The social data has been saved</p>
	</div>
</div>
