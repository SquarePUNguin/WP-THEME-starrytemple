<?php
if( WP_DEBUG && WP_DEBUG_DISPLAY && (defined('DOING_AJAX') && DOING_AJAX) ){
	@ ini_set( 'display_errors', 1 );
}

if(! function_exists("WP_THEME_SquarePUNguin_theme_setup")){
	function WP_THEME_SquarePUNguin_theme_setup(){
		add_theme_support('custom-logo', [
		'height'      => 100,
		'width'       => 100,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => '',
		'unlink-homepage-logo' => false,
		]);
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails',array("post","page","movie"));
	}
	add_action('after_setup_theme','WP_THEME_SquarePUNguin_theme_setup');
}
//места под выпадающие меню
function WP_THEME_SquarePUNguin_theme_menus(){
	$locations=array(
		"Header" => __('Header Menue','Theme'),
		"Footer" => __('Footer Menue',"Theme"),
	);
	register_nav_menus($locations);
}
add_action("init","WP_THEME_SquarePUNguin_theme_menus");
function WP_THEME_SquarePUNguin_theme_scripts() {
	
	wp_enqueue_script( "jquery",true );
	wp_enqueue_style("maincss",get_stylesheet_uri(),array());
	wp_enqueue_script("mainjs",get_template_directory_uri()."/scripts/main.js",array("jquery"),true);
	$data=['url'=>admin_url('admin-ajax.php')];
	wp_add_inline_script("mainjs",'window.myajaxery = ' . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ),"before");
	wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'WP_THEME_SquarePUNguin_theme_scripts' );
function WP_THEME_SquarePUNguin_searchposts(){
	get_template_part(slug: "templates/postloop", args: $_POST);
	wp_die();
}
add_action("wp_ajax_nopriv_search","WP_THEME_SquarePUNguin_searchposts");
add_action("wp_ajax_search","WP_THEME_SquarePUNguin_searchposts");
?>
