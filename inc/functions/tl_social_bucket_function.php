<?php
class TLSB_ThemelinesSBMain{
	public function __construct(){		
		tlsb_include_file( '/inc/templates/tl_social_bucket_widget.php' ) ;
	}
	public function addAssets(){
		tlsb_include_file( '/inc/functions/enqueue.php' ) ;
		if(class_exists( 'TLSB_EnqueueAll' )){
			$enqueue_file = new TLSB_EnqueueAll() ;
			$enqueue_file->register_hooks() ;
		}		
	}
	public function register(){		
		tlsb_include_file( '/inc/admin/tl_sb_admin.php' ) ;
	}
	public static function activate(){
		tlsb_include_file( '/inc/admin/Activate.php' ) ;
		TLSB_Activate::activate() ;
	}
	public static function deactivate(){
		tlsb_include_file( '/inc/admin/Deactivate.php' ) ;
		TLSB_Dectivate::deactivate() ;
	}
	public static function remove(){
		delete_option("tl_sb_settings");
		delete_option("widget_tl_sb_widget");
	}
}

if( class_exists( 'TLSB_ThemelinesSBMain' ) ){
	
    $tlsb_main = new TLSB_ThemelinesSBMain() ;
    $tlsb_main->register() ;
    $tlsb_main->addAssets() ;
	
}
register_activation_hook( TLSB_PLUGIN, array( 'TLSB_ThemelinesSBMain', 'activate' ) ) ;

register_deactivation_hook( TLSB_PLUGIN, array( 'TLSB_ThemelinesSBMain', 'deactivate' ) ) ;

register_uninstall_hook( TLSB_PLUGIN, array( 'TLSB_ThemelinesSBMain', 'remove' ) ) ;

tlsb_include_file( '/inc/functions/TLSB_SHARE.php' ) ;

