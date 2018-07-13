<?php
/**
 * ZincyLite functions and definitions
 *
 * @package ZincyLite
 */
if ( is_admin() ) : // Load only if we are viewing an admin page

function zincy_lite_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'zincy_lite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'of-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array( 'jquery' ) );
	wp_enqueue_style( 'zincy_lite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', '1.0', 'screen' );
	wp_localize_script( 'zincy_lite_custom_js', 'zincyWelcomeObject', array(
        'admin_nonce'   => wp_create_nonce('zincy_plugin_installer_nonce'),
        'activate_nonce'    => wp_create_nonce('zincy_plugin_activate_nonce'),
        'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
        'activate_btn' => __('Activate', 'zincy-lite'),
        'installed_btn' => __('Activated', 'zincy-lite'),
        'demo_installing' => __('Installing Demo', 'zincy-lite'),
        'demo_installed' => __('Demo Installed', 'zincy-lite'),
        'demo_confirm' => __('Are you sure to import demo content ?', 'zincy-lite'),
        ) );
}
add_action('admin_enqueue_scripts', 'zincy_lite_admin_scripts');
endif;

if ( ! function_exists( 'zincy_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zincy_lite_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	/**
	 * Global content width.
	 */
	if (!isset($content_width))
		$content_width = 750; /* pixels */

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ZincyLite, use a find and replace
	 * to change 'zincy-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zincy-lite', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/* 
     * Let WordPress manage the document title. 
     * By adding theme support, we declare that this theme does not use a 
     * hard-coded <title> tag in the document head, and expect WordPress to 
     * provide it for us. 
     */ 
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'slider-image', 1280, 585, true); //slider image
    add_image_size( 'blog-image-big', 585, 410, true); //blog image large
    add_image_size( 'blog-image-small', 400, 290, true); //blog image small
	add_image_size( 'event-thumbnail', 135, 100, true); //Latest News Events Small Image
	add_image_size( 'featured-thumbnail', 350, 245, true); //Featured Image
	add_image_size( 'portfolio-thumbnail', 415, 235, true); //Portfolio Image
    add_image_size( 'portfolio-side-thumbnail', 80 , 80, true); //Portfolio Image
    add_image_size( 'post-thumbnail', 626, 203 , true); //post Image
    add_image_size( 'testimonials-thumbnails', 150 , 150, true); //Testimonials Image
    add_image_size( 'latest-post-thumbnails', 110 , 110, true); //latest-event Image
    add_image_size( 'testimonials-home', 52 , 52 , true); //testimonials Image
    add_image_size( 'featured-thumbnails-home', 273 , 206 , true); //featured Image home
    add_image_size( 'blog-layout-four-image', 870 , 300 , true);//blog image for layout four	
    add_image_size( 'event-list-thumb', 150 , 150 , true);//events list thumbnails
    

	// This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'zincy-lite' ),
    	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'zincy_lite_custom_background_args', array(
    	'default-color' => 'ffffff',
    	'default-image' => '',
    	) ) );
    
    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
    	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    	) );

    add_editor_style( array( 'css/editor-style.css') );

	// Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

}
endif; // zincy_lite_setup
add_action( 'after_setup_theme', 'zincy_lite_setup' );

/**
 * Implement the Theme Option feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Customizer additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer_Options default-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/default-settings.php';

/**
 * Customizer_Options general-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/general-settings.php';

/**
 * Customizer_Options typography-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/typography-settings.php';

/**
 * Customizer_Options sider-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/slider-settings.php';

/**
 * Customizer_Options homepage-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/homepage-settings.php';

/**
 * Customizer_Options homepage-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/block-settings.php';

/**
 * Customizer_Options social-link-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/social-link-settings.php';

/**
 * Customizer_Options sidebar-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/sidebar-settings.php';
/**
 * Customizer_Options sanitizer.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/sanitizer.php';

/**
 * Customizer_Options additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/category-dropdown.php'; 

/**
 * Customizer_Options additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/typography-dropdown.php'; 

/**
 * Customizer_Options post dropdown.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/post-dropdown.php';
/**
 * Customizer_Options layout dropdown.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/layout-dropdown.php';

/**
 * 
 * dynamic stylesheet
 * 
 */
require get_template_directory() . '/css/styles.php';
/**
 * About Themes
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/about-theme.php';
}

/**
 * 
 * more then 4 product
 * 
 */
add_filter('loop_shop_columns', 'loop_columns'); 
if (!function_exists('loop_columns')) { 

	function loop_columns() { 
		$xr = 4; 
		return $xr; 
	}
}

//Declare Woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function my_theme_wrapper_start() {
	echo '<div class="zl-wrapper"><div id="primary">';
}
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);

function new_my_theme_wrapper_end() {
	echo '</div>';
	do_action( 'woocommerce_sidebar' );
	echo '</div>';
}
add_action('woocommerce_after_main_content','new_my_theme_wrapper_end',9);