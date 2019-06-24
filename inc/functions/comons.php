<?php
$tl_social_bucket=[];
function tlsb_generateColor($iconname="", $colorType=""){
	$defaultColor;
	$hoverColor;
	if($colorType=='hover'){
		switch($iconname){
			case 'facebook':
				$hoverColor='#5d81cd';
				break;
			case 'twitter':
				$hoverColor='#74bef9';
				break;
			case 'linkedin':
				$hoverColor='#1c99da';
				break;
			case 'pinterest':
				$hoverColor='#d3152a';
				break;
			case 'instagram':
				$hoverColor='#f2607b';
				break;
			case 'youtube':
				$hoverColor='#ea3635';
				break;
			case 'googlemybusiness':
				$hoverColor='#d7d8da';
				break;
			case 'yelp':
				$hoverColor='#d71919';
				break;
			case 'tumblr':
				$hoverColor='#6c7b91';
				break;
			case 'buffer':
				$hoverColor='#40a2ed';
				break;
			case 'whatsapp':
				$hoverColor='#28d85f';
				break;
			case 'reddit':
				$hoverColor='#ff7900';
				break;
			default:
				$hoverColor='#fff';
				break;
			}
			return $hoverColor;
		}
	if($colorType=='default'){
		switch($iconname){
			case 'facebook':
				$defaultColor='#4267b2';
				break;
			case 'twitter':
				$defaultColor='#38A1F3';
				break;
			case 'linkedin':
				$defaultColor='#0077B5';
				break;
			case 'pinterest':
				$defaultColor='#BD081C';
				break;
			case 'instagram':
				$defaultColor='#e4405f';
				break;
			case 'youtube':
				$defaultColor='#cd201f';
				break;
			case 'googlemybusiness':
				$defaultColor='#B2B3B5';
				break;
			case 'yelp':
				$defaultColor='#af0606';
				break;
			case 'tumblr':
				$defaultColor='#44546A';
				break;
			case 'buffer':
				$defaultColor='#168EEA';
				break;
			case 'whatsapp':
				$defaultColor='#0CB742';
				break;
			case 'reddit':
				$defaultColor='#FF4500';
				break;
			default:
				$defaultColor='#f0f0f0';
				break;
			}
			return $defaultColor;
		}
	}

function tlsb_getUrlContent( $iconname = '', $url = '' ){
		$getTitle = $slug = '' ;
		$getTitle = get_the_title() ;
		$image = has_post_thumbnail() ? get_the_post_thumbnail_url() : '' ;
		$post_id  =  get_queried_object_id() ;
        $post_obj  =  get_post( $post_id ) ;
        $description  =  $post_obj->post_content ;
		switch($iconname){
			case 'facebook':
				$slug = 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.$getTitle.'&p[ images ][ 0 ]='.$image;
				break ;
			case 'twitter':
				$slug = 'https://twitter.com/intent/tweet?text='.$getTitle.'&amp;url='.$url.'&amp;via=Themelines';
				break ;
			case 'linkedin':
				$slug = 'https://www.linkedin.com/shareArticle?mini= true&url='.$url.'&amp;title='.$getTitle;
				break ;
			case 'pinterest':
				$slug = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$image.'&amp;description='.$getTitle;
				break ;
			case 'tumblr':
				$slug = 'https://www.tumblr.com/share/link?url='.$url.'&name='.$getTitle.'&description='.wp_strip_all_tags($description);
				break ;
			case 'reddit':
				$slug = 'https://reddit.com/submit?url='.$url.'&title='.$getTitle;
				break ;
			case 'buffer':
				$slug = 'https://bufferapp.com/add?url='.$url.'&amp;text='.$getTitle;
				break ;
			case 'whatsapp':
			    if(wp_is_mobile()):
					$slug = 'whatsapp://send?text='.$url.'" data-action="share/whatsapp/share"' ;
				else:
					$slug='https://web.whatsapp.com/send?text='.$url.'" data-action="share/whatsapp/share"';
				endif ;
				break ;
			default:
				$slug = '#f0f0f0' ;
				break ;
		}
		return $slug ;
	}		
