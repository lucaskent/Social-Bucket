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
	$tl_sb_scObj	=	new TLSB_SC();
	$tl_sbSc		=	sanitize_text_field($tl_sb_scObj->generateShortcode($id, $key));
	return $tl_sbSc;
}
add_shortcode('tl-sb', array('TLSB_SC', 'generateContext'));
