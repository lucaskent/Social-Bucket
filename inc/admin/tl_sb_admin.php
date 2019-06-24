<?php
class TLSB_AdminMenu{
	public function __construct(){
		add_action('admin_menu', array( $this, 'add_tl_sb_menu_page'));
		add_filter( 'plugin_action_links_'.TLSB_PLUGIN, array($this, 'settings_link'));
	}
	public function settings_link($links){
		$settings_lin='<a href="'. esc_url( "admin.php?page=tl-social-bucket&action=addNew" ) .'">Settings</a>';
		array_push($links, $settings_lin);
		return $links;
	}
	public function add_tl_sb_menu_page(){
		add_menu_page('Themelines Plugin', 'TL Social Bucket', 'manage_options', 'tl-social-bucket', array( $this, 'tl_sb_admin_menu_cb'), 'dashicons-networking', 110);
		add_action('admin_init', array($this, 'create_custom_settings'));
	}
	public function create_custom_settings(){
		register_setting('tl_sb_setting_group', 'tl_sb_settings');
		add_settings_section('tl_sb_settings_section', '', array($this, 'tl_sb_section_settings_cb'), 'tl-social-bucket');
		
	}
	public function tl_sb_admin_menu_cb(){
		echo '<div class="tl-social_bucket-title"><h1>Social Bucket</h1></div>';
		tlsb_include_file('/inc/templates/tl_sb_admin_display.php');
	}
	function tl_sb_section_settings_cb(){
		tlsb_include_file('/inc/templates/tl_sb_form.php');
	}
}
if(class_exists('TLSB_AdminMenu')){
	$tl_sb_obj= new TLSB_AdminMenu();
}


//ajax call
add_action('wp_ajax_tl_sb_ajax_cb_action', 'tl_sb_ajax_cb_action');
function tl_sb_ajax_cb_action(){
	$myvar = [ "follow" => [" "], "share" => [" "], "review" =>[" "] ];
	$myvar=(!empty($_POST['social_data']))?$_POST['social_data']:$myvar;
	update_option('tl_sb_settings', $myvar);
	wp_die();
}
add_action('wp_ajax_tl_sb_ajax_cb_delete', 'tl_sb_ajax_cb_delete');
function tl_sb_ajax_cb_delete(){
	$myvar			=	sanitize_text_field($_POST['social_id']);
	$socialType		=	sanitize_text_field($_POST['socialType']);
	$tl_sb_fromDb	=	get_option('tl_sb_settings',[]);
	if(isset($tl_sb_fromDb) && count($tl_sb_fromDb)>0){
		$tl_sb_current_array=$tl_sb_fromDb[$socialType];
		unset($tl_sb_current_array[$myvar]);
		$tl_sb_fromDb[$socialType]=$tl_sb_current_array;
		update_option('tl_sb_settings', $tl_sb_fromDb);
	}
	wp_die();
}

function tl_sb_shortCode($id, $key){
	$tl_sb_scObj	=	new tlsb_SC();
	$tl_sbSc		=	sanitize_text_field($tl_sb_scObj->generateShortcode($id, $key));
	return $tl_sbSc;
}
add_shortcode('tl-sb', array('tlsb_SC', 'generateContext'));
class tlsb_SC{
	public function generateShortcode($id, $key){
		$tl_sb_content		=	sanitize_text_field('[tl-sb id='.$id.' key='.$key.']');
		return $tl_sb_content;
	}
	public static function generateContext($atts){
		
		$atts = shortcode_atts(
			array(
				'id' => '',
				'key'=>'',
			), $atts, 'tl-sb' );	
			
		$returnableValue=self::expandCode($atts['id'], $atts['key']);
		return $returnableValue;
	}
	public static function expandCode($codeId, $key){
		$tl_social_bucket_array=get_option('tl_sb_settings',[]);
		
		if( empty($tl_social_bucket_array[$key]) ) return;
		
		if( !isset($tl_social_bucket_array[$key][$codeId]) ) return;

		$tl_sb_idArray=$tl_social_bucket_array[$key][$codeId];
		if($key=="share"){
			if($tl_sb_idArray!='' && count($tl_sb_idArray)>0){			
			$tl_sb_isStickyPos			=	isset($tl_sb_idArray['settings']['isSticky']) && ($tl_sb_idArray['settings']['isSticky'])=='Checked'?'Checked':'';
			$tl_sb_iconStickyPosDisplay	=	isset($tl_sb_idArray['settings']['stickyPos'])?$tl_sb_idArray['settings']['stickyPos']:'left';
			$tl_sb_iconLinkOpen			=	isset($tl_sb_idArray['settings']['link_open_opt'])?$tl_sb_idArray['settings']['link_open_opt']:'_self';
			$tl_sb_iconPadding			=	isset($tl_sb_idArray['settings']['padding'])?'style="padding:'.$tl_sb_idArray['settings']['padding'].'px"':'';
			$tl_sb_previewAreaTotalContent='';				
			$tl_sb_previewAreaContent='';
			
			if(isset($tl_sb_idArray['settings']['ordering'])){
				foreach($tl_sb_idArray['settings']['ordering'] as $icon){
					$arr['iconDefault']=isset($tl_sb_idArray['icons'][$icon]['color']['bydefault'])?$tl_sb_idArray['icons'][$icon]['color']['bydefault']:'#fff';
					$arr['iconHover']=isset($tl_sb_idArray['icons'][$icon]['color']['hover'])?$tl_sb_idArray['icons'][$icon]['color']['hover']:'#fff';
					$arr['bgDefault']=isset($tl_sb_idArray['icons'][$icon]['bgcolor']['bydefault'])?$tl_sb_idArray['icons'][$icon]['bgcolor']['bydefault']:tlsb_generateColor($icon, 'default');
					$arr['bgHover']=isset($tl_sb_idArray['icons'][$icon]['bgcolor']['hover'])?$tl_sb_idArray['icons'][$icon]['bgcolor']['hover']:tlsb_generateColor($icon, 'hover');
					$url= esc_url( self::shareUrl($icon) );
					$tl_sb_previewAreaContent .= '<a href="'.$url.'" target="'.$tl_sb_iconLinkOpen.'" '.$tl_sb_iconPadding.'>'.stripslashes_deep($tl_sb_idArray['icons'][$icon]['content']).'<div class="tl-sb-icon-individual-data" style="display:none;">'.json_encode($arr).'</div></a>';
				}
			}
			$tl_sb_previewAreaTotalContent.='<div class="tl-sb-preview-area tl-sb-stickypos-inline">';
			$tl_sb_previewAreaTotalContent.=$tl_sb_previewAreaContent;
			$tl_sb_previewAreaTotalContent.='</div>';
			
			return $tl_sb_previewAreaTotalContent;
		}
		}else{
			if($tl_sb_idArray!='' && count($tl_sb_idArray)>0){			
				$tl_sb_isStickyPos			=	isset($tl_sb_idArray['settings']['isSticky']) && ($tl_sb_idArray['settings']['isSticky'])=='Checked'?'Checked':'';
				$tl_sb_iconStickyPosDisplay	=	isset($tl_sb_idArray['settings']['stickyPos'])?$tl_sb_idArray['settings']['stickyPos']:'left';
				$tl_sb_iconLinkOpen			=	isset($tl_sb_idArray['settings']['link_open_opt'])?$tl_sb_idArray['settings']['link_open_opt']:'_self';
				$tl_sb_iconPadding			=	isset($tl_sb_idArray['settings']['padding'])?'style="padding:'.$tl_sb_idArray['settings']['padding'].'px"':'';
				$tl_sb_previewAreaTotalContent='';				
				$tl_sb_previewAreaContent='';
				if(isset($tl_sb_idArray['settings']['ordering'])){
					foreach($tl_sb_idArray['settings']['ordering'] as $icon){
						$arr['iconDefault']=isset($tl_sb_idArray['icons'][$icon]['color']['bydefault'])?$tl_sb_idArray['icons'][$icon]['color']['bydefault']:'#fff';
						$arr['iconHover']=isset($tl_sb_idArray['icons'][$icon]['color']['hover'])?$tl_sb_idArray['icons'][$icon]['color']['hover']:'#fff';
						$arr['bgDefault']=isset($tl_sb_idArray['icons'][$icon]['bgcolor']['bydefault'])?$tl_sb_idArray['icons'][$icon]['bgcolor']['bydefault']:tlsb_generateColor($icon, 'default');
						$arr['bgHover']=isset($tl_sb_idArray['icons'][$icon]['bgcolor']['hover'])?$tl_sb_idArray['icons'][$icon]['bgcolor']['hover']:tlsb_generateColor($icon, 'hover');
						$url=isset($tl_sb_idArray['icons'][$icon]['url'])?stripslashes_deep($tl_sb_idArray['icons'][$icon]['url']):'#';
						$tl_sb_previewAreaContent .= '<a href="'.$url.'" target="'.$tl_sb_iconLinkOpen.'" '.$tl_sb_iconPadding.'>'.stripslashes_deep($tl_sb_idArray['icons'][$icon]['content']).'<div class="tl-sb-icon-individual-data" style="display:none;">'.json_encode($arr).'</div></a>';
					}
				}
				$tl_sb_previewAreaTotalContent .='<div class="tl-sb-preview-area tl-sb-stickypos-inline">';	
				$tl_sb_previewAreaTotalContent .=$tl_sb_previewAreaContent;	
				$tl_sb_previewAreaTotalContent .='</div>';
				if($tl_sb_isStickyPos=='Checked'){
					$tl_sb_previewAreaTotalContent .='<div class="tl-sb-preview-area tl-sb-stickypos-'.$tl_sb_iconStickyPosDisplay.'">';
					$tl_sb_previewAreaTotalContent .=$tl_sb_previewAreaContent;
					$tl_sb_previewAreaTotalContent .='</div>';
				}
				return $tl_sb_previewAreaTotalContent;
			}
		}
	}
	public static function shareUrl( $iconname = '' ){
		$url = urlencode(get_permalink());
		if(class_exists('TLSB_SHARE')):
			return tlsb_getUrlContent( $iconname, $url);
		endif;
	}
	
}