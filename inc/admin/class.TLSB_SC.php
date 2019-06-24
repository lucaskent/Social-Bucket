<?php
class TLSB_SC{
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
		
		if( empty($tl_social_bucket_array[$key]) ) return ;
		
		if( !isset($tl_social_bucket_array[$key][$codeId]) ) return ;

		$tl_sb_idArray=$tl_social_bucket_array[$key][$codeId];
		if( $key == "share" ){
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
		if(class_exists('TLSB_SHARE')){
			return tlsb_getUrlContent( $iconname, $url);
		}
	}
	
}