<?php

class TLSB_Activate{
	public static function activate(){
        //$this->customPostType();
        flush_rewrite_rules();
		(new self)->insertOpt();
    }
	public static function insertOpt(){		
		$myvar = [ "follow" => [" "], "share" => [" "], "review" =>[" "] ];
		if(!get_option("tl_sb_settings")){
			update_option('tl_sb_settings', $myvar);
		}
	}
}