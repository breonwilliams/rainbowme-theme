<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
	/**
	 * Setup theme and register support wp features.
	 */
	function bootstrapBasicSetup() 
	{
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * 
		 * copy from underscores theme
		 */
		load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

		// add theme support post and comment automatic feed links
		add_theme_support('automatic-feed-links');

		// enable support for post thumbnail or feature image on posts and pages
		add_theme_support('post-thumbnails');
		add_image_size( 'videos-thumb', 400, 300, true ); // Soft Crop Mode
		add_image_size( 'videos-rel-thumb', 75, 75, true ); // Soft Crop Mode
		add_image_size( 'staff-thumb', 300, 300, true ); // Soft Crop Mode

		// add support menu
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'bootstrap-basic'),
		));

		// add post formats support
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// add support custom background
		add_theme_support(
			'custom-background', 
			apply_filters(
				'bootstrap_basic_custom_background_args', 
				array(
					'default-color' => 'ffffff', 
					'default-image' => ''
				)
			)
		);
	}// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');

// avatar
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
	$myavatar = get_bloginfo('template_directory') . '/img/avatar.png';
	$avatar_defaults[$myavatar] = "RainbowMe Avatar";
	return $avatar_defaults;
}

function bp_remove_gravatar ($image, $params, $item_id, $avatar_dir, $css_id, $html_width, $html_height, $avatar_folder_url, $avatar_folder_dir) {

	$default = get_stylesheet_directory_uri() .'/img/avatar.png';

	if( $image && strpos( $image, "gravatar.com" ) ){

		return '<img src="' . $default . '" alt="avatar" class="avatar" ' . $html_width . $html_height . ' />';
	} else {
		return $image;

	}

}
add_filter('bp_core_fetch_avatar', 'bp_remove_gravatar', 1, 9 );

function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {

	$default = get_stylesheet_directory_uri() .'/img/avatar.png';
	return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
}

add_filter('get_avatar', 'remove_gravatar', 1, 5);

function bp_remove_signup_gravatar ($image) {

	$default = get_stylesheet_directory_uri() .'/img/avatar.png';

	if( $image && strpos( $image, "gravatar.com" ) ){

		return '<img src="' . $default . '" alt="avatar" class="avatar" width="150" height="150" />';
	} else {
		return $image;
	}

}
add_filter('bp_get_signup_avatar', 'bp_remove_signup_gravatar', 1, 1 );

if (!function_exists('bootstrapBasicWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function bootstrapBasicWidgetsInit() 
	{
		register_sidebar(array(
			'name'          => __('Header right', 'bootstrap-basic'),
			'id'            => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Navigation bar right', 'bootstrap-basic'),
			'id'            => 'navbar-right',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Sidebar left', 'bootstrap-basic'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'bootstrap-basic'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar video left', 'bootstrap-basic'),
			'id'            => 'sidebar-videoleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar video right', 'bootstrap-basic'),
			'id'            => 'sidebar-videoright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related video left', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedvideoleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related video right', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedvideoright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar games left', 'bootstrap-basic'),
			'id'            => 'sidebar-gamesleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar games right', 'bootstrap-basic'),
			'id'            => 'sidebar-gamesright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related games left', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedgamesleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related games right', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedgamesright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar books left', 'bootstrap-basic'),
			'id'            => 'sidebar-booksleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar books right', 'bootstrap-basic'),
			'id'            => 'sidebar-booksright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related books left', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedbooksleft',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar related books right', 'bootstrap-basic'),
			'id'            => 'sidebar-relatedbooksright',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar woocommerce', 'bootstrap-basic'),
			'id'            => 'sidebar-woocommerce',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Footer left', 'bootstrap-basic'),
			'id'            => 'footer-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => __('Footer middle', 'bootstrap-basic'),
			'id'            => 'footer-middle',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => __('Footer right', 'bootstrap-basic'),
			'id'            => 'footer-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');

/** Thumbnails **/

if ( function_exists( 'add_theme_support' ) ) {
	add_image_size( 'article_thumbnail', 280, 280, true ); // Posts thumnail

}


if (!function_exists('bootstrapBasicEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles
	 */
	function bootstrapBasicEnqueueScripts() 
	{
		wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
		wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
		wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style('buddypress-style', get_template_directory_uri() . '/css/bp.css');
		wp_enqueue_style('component-style', get_template_directory_uri() . '/css/component.css');
		wp_enqueue_style('bs-select-style', get_template_directory_uri() . '/css/bootstrap-select.min.css');
		wp_enqueue_style('avatar-style', get_template_directory_uri() . '/css/avatar.css');

		wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
		wp_enqueue_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
		wp_enqueue_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');
		wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
		wp_enqueue_script('moderni-js', get_template_directory_uri() . '/js/modernizr.custom.js');
		wp_enqueue_script('toucheffects-js', get_template_directory_uri() . '/js/toucheffects.js', 'jquery','1.0',true);
		wp_enqueue_script('wrapforms-js', get_template_directory_uri() . '/js/wrapforms.js');
		wp_enqueue_script('bs-select-js', get_template_directory_uri() . '/js/bootstrap-select.js');


		wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	}// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');



/**
 * Fonts to include
 */

function load_fonts() {
            wp_register_style('oxygen', 'https://fonts.googleapis.com/css?family=Oxygen');
            wp_register_style('Fredoka', 'https://fonts.googleapis.com/css?family=Fredoka+One');
            wp_register_style('Luckiest', 'https://fonts.googleapis.com/css?family=Luckiest+Guy');

            wp_enqueue_style( 'oxygen');
            wp_enqueue_style( 'Fredoka');
            wp_enqueue_style( 'Luckiest');

        }
    
add_action('wp_print_styles', 'load_fonts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';
require get_template_directory() . '/inc/removeadminbar.php';
require get_template_directory() . '/inc/woocom.php';
require get_template_directory() . '/inc/related-posts.php';
require get_template_directory() . '/inc/findfriends.php';
require get_template_directory() . '/inc/fb-connect.php';
require get_template_directory() . '/inc/logo.php';
require get_template_directory() . '/inc/donate-filter.php';

/*--- Custom Function ---*/

require_once locate_template('/inc/redirecthome.php');                          // Redirect to home page



