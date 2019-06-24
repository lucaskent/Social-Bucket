<?php
/**
* Plugin Name: Social Bucket
* Description: This is used to create social link, share etc.
* Plugin URI: https://www.themelines.com/
* Author: CodeCloudWeb
* Author URI: https://codecloudweb.com/
* version:0.0.1
* Lisence:GPLv2
* Text Domain:social-bucket
* Copyright: © 2019 Themelines / Social Bucket.
*/
if(!defined('ABSPATH')){
    die;
   }
define( 'TLSB_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'TLSB_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'TLSB_PLUGIN', plugin_basename(__FILE__) );

if(!function_exists('tlsb_include_file')):
	function tlsb_include_file($filename){
		if(file_exists(dirname(__FILE__).$filename)){
			require_once(dirname(__FILE__).$filename);
		}
	}
endif;
tlsb_include_file('/inc/functions/comons.php');
tlsb_include_file('/inc/functions/class.TLSB_ThemelinesSBMain.php');