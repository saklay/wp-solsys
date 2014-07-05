<?php

	/* SIDEBARS */
	register_sidebar(array(
		'name' => 'Primary',
		'id' => 'primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => "<h3>",
		'after_title' => "</h3>",
		));

	register_sidebar(array(
		'name' => 'About widget in home page',
		'id' => 'about',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => "<h3>",
		'after_title' => "</h3>",
		));

	register_sidebar(array(
		'name' => 'Twitterfeed',
		'id' => 'twitterfeed',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => "<h3>",
		'after_title' => "</h3>",
		));

/* ENABLE POST THUMBNAILS */
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true ); 
	}

	
function vp_get_thumb_url($text) {
	global $post;

	$imageurl="";
 
	// extract the thumbnail from attached imaged
	$allimages =&get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
 
	foreach ($allimages as $img){
		$img_src = wp_get_attachment_image_src($img->ID);
		break; 
		}
 
	$imageurl=$img_src[0];
 
 
	// try to get any image
	if (!$imageurl) {
		preg_match('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i' ,$text, $matches);
		$imageurl=$matches[1];
		}
 
	// try to get youtube video thumbnail
	if (!$imageurl) {
		preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/watch(\?v\=|\/v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
 
		$youtubeurl = $matches2[0];
		if ($youtubeurl)
			$imageurl = "http://i.ytimg.com/vi/{$matches2[3]}/1.jpg"; 
			else preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/(v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
 
		$youtubeurl = $matches2[0];
		if ($youtubeurl)
			$imageurl = "http://i.ytimg.com/vi/{$matches2[3]}/1.jpg"; 
		}
 
 
	return $imageurl;
	}
function vp_get_img_url($text) {
	global $post;

	$imageurl="";

								$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
								foreach( $mypages as $page ) {		
									$content = $page->post_content;
									if ( ! $content ) // Check for empty page
										continue;
										$subid = $page->ID;
								}
										
	// extract the thumbnail from attached imaged
	$allimages =&get_children('post_type=attachment&post_mime_type=image&post_parent=' . $subid ); 
 
	foreach ($allimages as $img){
		$img_src = wp_get_attachment_image_src($subid,'full');
		break; 
		}
 
	$imageurl=$img_src[0];
 
 
	// try to get any image
	if (!$imageurl) {
		preg_match('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i' ,$text, $matches);
		$imageurl=$matches[1];
		}
 
	return $imageurl;
	}
	
function get_page_id($page_name){
    global $wpdb;
    $page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."' AND post_status = 'publish' AND post_type = 'page'");
    return $page_name;
}
?>