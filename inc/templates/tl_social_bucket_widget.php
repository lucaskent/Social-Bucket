<?php
function tl_social_bucket_widget() {
    register_widget( 'tl_sb_widget' );
}
add_action( 'widgets_init', 'tl_social_bucket_widget' );
class tl_sb_widget extends WP_Widget {

	function __construct(){
	parent::__construct(
	
	'tl_sb_widget', 
	
	// Widget name will appear in UI
	__('Social bucket', 'themeline-social-bucket'), 
	
	// Widget description
	array( 'description'  => __( 'Add social Button in your widget', 'themeline-social-bucket' ), ));
	}
	
	// Creating widget front-end
	public function widget( $args, $instance ){
	$title  =  apply_filters( 'widget_title', $instance[ 'title' ] );
	
	// before and after widget arguments are defined by themes
	echo $args[ 'before_widget' ];
	if ( ! empty( $title ) )
	echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
	
	// This is where you run the code and display the output
	
	$tl_sb_array 			 =  get_option( 'tl_sb_settings', 'tl_sb' );
	$instanceFrom			 =  $instance[ 'tl_sb_follow_id' ];
	$splitArray				 =  explode( '.', $instanceFrom );
	$social_array			 =  isset($tl_sb_array[ $splitArray[ 0 ] ][ $splitArray[ 1 ] ] ) ? $tl_sb_array[ $splitArray[ 0 ] ][ $splitArray[ 1 ] ] : '';

	?>
	<div class = "tl-social-bucket">
		<?php
		if( $splitArray[ 0 ] == 'share' ){
			if( isset( $instance[ 'tl_sb_follow_id' ]) && !empty( $social_array ) ):
			$preview_area_content = '';
			add_action( 'wp_head', array( $this, 'generateMeta' ) ) ;
			$sticky_status = isset( $social_array[ 'settings' ][ 'isSticky' ] ) && ( $social_array[ 'settings' ][ 'isSticky' ] ) == 'Checked' ? 'Checked' : '';
			$icon_link = isset( $social_array[ 'settings' ][ 'link_open_opt' ] ) ? $social_array[ 'settings' ][ 'link_open_opt' ] : '_self';
			$padding = isset( $social_array[ 'settings' ][ 'padding' ] ) ? 'style = "padding:'.$social_array[ 'settings' ][ 'padding' ].'px"' : '';
			$preview_area_content.= '<div class = "tl-sb-preview-area tl-sb-stickypos-inline">';
			$uri = urlencode( get_home_url() );
			if( isset( $social_array[ 'settings' ][ 'ordering' ] ) && count( $social_array[ 'settings' ][ 'ordering' ] )>0 ){					
				foreach( $social_array[ 'settings' ][ 'ordering' ] as $iconkey ){
					$arr[ 'iconDefault' ] = isset( $social_array[ 'icons' ][ $iconkey ][ 'color' ][ 'bydefault' ] ) ? $social_array[ 'icons' ][ $iconkey ][ 'color' ][ 'bydefault' ] : '#fff';
					$arr[ 'iconHover' ] = isset( $social_array[ 'icons' ][ $iconkey ][ 'color' ][ 'hover' ]) ? $social_array[ 'icons' ][ $iconkey ][ 'color' ][ 'hover' ] : '#fff';
					$arr[ 'bgDefault' ] = isset( $social_array[ 'icons' ][ $iconkey ][ 'bgcolor' ][ 'bydefault' ] ) ? $social_array[ 'icons' ][ $iconkey ][ 'bgcolor' ][ 'bydefault' ] : tlsb_generateColor($iconkey, 'default');
					$arr[ 'bgHover' ] = isset( $social_array[ 'icons' ][ $iconkey ][ 'bgcolor' ][ 'hover' ] ) ? $social_array[ 'icons' ][ $iconkey ][ 'bgcolor' ][ 'hover' ] : tlsb_generateColor($iconkey, 'hover');
					$url = esc_url(tlsb_getUrlContent( $iconkey, $uri ) );
					$preview_area_content .=  '<a href = "'.$url.'" target = "'.esc_attr( $icon_link ).'" '.esc_attr( $padding ).'>'.stripslashes_deep($social_array[ 'icons' ][ $iconkey ][ 'content' ]).'<div class = "tl-sb-icon-individual-data" style = "display:none ;">'.json_encode($arr).'</div></a>';
					}
				}
			$preview_area_content.= '</div>';					
			echo $preview_area_content;
			endif ;
		}else{
			if( isset( $instance[ 'tl_sb_follow_id' ]) && !empty( $social_array ) ):
			$preview_area_content = '';
			$sticky_status = isset( $social_array[ 'settings' ][ 'isSticky' ]) && ( $social_array[ 'settings' ][ 'isSticky' ] ) == 'Checked' ? 'Checked' : '';
			$icon_link = isset( $social_array[ 'settings' ][ 'link_open_opt' ] ) ? $social_array[ 'settings' ][ 'link_open_opt' ] : '_self';
			$padding = isset( $social_array[ 'settings' ][ 'padding' ] ) ? 'style = "padding:'.$social_array[ 'settings' ][ 'padding' ].'px"' : '';
			$preview_area_content.= '<div class = "tl-sb-preview-area tl-sb-stickypos-inline">';
			if(isset($social_array['settings']['ordering'])){
				foreach($social_array['settings']['ordering'] as $icon){
					$arr['iconDefault']=isset($social_array['icons'][$icon]['color']['bydefault'])?$social_array['icons'][$icon]['color']['bydefault']:'#fff';
					$arr['iconHover']=isset($social_array['icons'][$icon]['color']['hover'])?$social_array['icons'][$icon]['color']['hover']:'#fff';
					$arr['bgDefault']=isset($social_array['icons'][$icon]['bgcolor']['bydefault'])?$social_array['icons'][$icon]['bgcolor']['bydefault']:tlsb_generateColor($icon, 'default');
					$arr['bgHover']=isset($social_array['icons'][$icon]['bgcolor']['hover'])?$social_array['icons'][$icon]['bgcolor']['hover']:tlsb_generateColor($icon, 'hover');
					$url=isset($social_array['icons'][$icon]['url'])?stripslashes_deep($social_array['icons'][$icon]['url']):'#';
					$preview_area_content .= '<a href="'.esc_url( $url ).'" target="'.esc_attr( $icon_link ).'" '.esc_attr( $padding ).'>'.stripslashes_deep($social_array['icons'][$icon]['content']).'<div class="tl-sb-icon-individual-data" style="display:none;">'.json_encode($arr).'</div></a>';
				}
			}
			$preview_area_content.= '</div>';			
			echo $preview_area_content ;
			endif ;
		}
	?>
</div>
	
	<?php echo $args[ 'after_widget' ];
	}
			 
	// Widget Backend 
	public function form( $instance ) {
		
		$title  =  isset($instance[  'title'  ])?$instance[  'title'  ]:'New Title';
		$tl_sb_array 	 =  get_option('tl_sb_settings', 'tl_sb');
		// Widget admin form
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>		
		<p>
			<select id="<?php echo $this->get_field_id( 'tl_sb_follow_id' ); ?>" name="<?php echo $this->get_field_name( 'tl_sb_follow_id' ); ?>">
				<?php
				foreach($tl_sb_array as $type =>$typeData){
					?>
					<optgroup label="<?php echo $type ; ?>">
					<?php
					foreach($typeData as $id =>$innerdata){
						if($id > 0){
							$follow_id=isset($instance[ 'tl_sb_follow_id' ])?$instance[ 'tl_sb_follow_id' ]:'';
					?>
						<option value="<?php echo esc_attr( $type.'.'.$id ); ?>"<?php echo ($follow_id == $type.'.'.$id)?esc_attr( ' selected' ):'' ; ?>>tl-sb-<?php echo esc_attr( $type.'-'.$id ); ?></option>
					<?php
						}
					}
					?>
					</optgroup>
					<?php
				}
				?>
			</select>
		</p>

	<?php 
	}
		 
		 
	public function update( $new_instance, $old_instance ) {
		$instance  =  array() ;
		$instance[ 'title' ]  =  ( ! empty( $new_instance[ 'title' ] ) ) ? sanitize_text_field( $new_instance[ 'title' ] ) : '' ;
		$instance[ 'tl_sb_follow_id' ]  =  ( ! empty( $new_instance[ 'tl_sb_follow_id' ] ) ) ? sanitize_text_field( $new_instance[ 'tl_sb_follow_id' ] ) : '' ;

		return $new_instance ;
	}


	function generateMeta(){
		$post_id 	=  get_queried_object_id();
        $post_obj 	=  get_post( $post_id );
        $content 	=  $post_obj->post_content;
		$getTitle	=  get_the_title() ;
		$image = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
		$html = '' ;
		$html.= '<meta property = "og:locale" content = "en_US" />';
		$html.= '<meta property = "og:title" content = "'.$getTitle.'" />';
		$html.= '<meta property = "og:type" content = "website" />' ;
		$html.= '<meta property = "og:url" content = "'.urlencode(get_permalink()).'" />';
		$html.= '<meta property = "og:image" content = "'.$image.'" />';
		$html.= '<meta property = "og:image:width" content = "400" />';
		$html.= '<meta property = "og:image:height" content = "300" />';
		$html.= '<meta property = "og:site-name" content = "'.get_bloginfo('name').'" />';
		$html.= '<meta property = "og:description" content = "'.wp_strip_all_tags($content).'" />';
		$html.= '<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[ 0 ];
				s.parentNode.insertBefore(t,s)}(window,document,"script",
				"https://connect.facebook.net/en_US/fbevents.js");
				fbq("track", "PageView");
				</script>';
		echo $html ;
	}
}

