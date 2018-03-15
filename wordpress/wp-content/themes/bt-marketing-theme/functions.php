<?php
function btmarketing_files() {
	//add style sheets
	wp_register_style('bt-marketing-styles', get_template_directory_uri().'/style.css', array(), '1.0'); 
	wp_register_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.0'); 
	wp_register_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css', array(), '8.0.0'); 
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css');
	//enqueue styles


  wp_enqueue_style('bootstrap-css'); 
wp_enqueue_style('bt-marketing-styles'); 
wp_enqueue_style('normalize'); 
wp_enqueue_style('font-awesome');
	wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Play');

	//register scripts
		wp_register_script('script', get_template_directory_uri().'/js/scripts.js', array(''), '1.0.0', true );
    wp_register_script('script', get_template_directory_uri().'/js/bootstrap.min.js', array(''), '1.0.0', true );
 wp_enqueue_script('jquery'); 
	
	//enqueue scripts

	wp_enqueue_script('script');
}

add_action('wp_enqueue_scripts', 'btmarketing_files');
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'btmarketing_setup' ) ) :

function btmarketing_theme_setup(){
	load_theme_textdomain( 'btmarketing', get_template_directory() . '/languages' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'btmarketing' ),
		'footer' => __( 'Footer Menu', 'btmarketing' ),
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	// Featured Image Support
	add_theme_support('post-thumbnails');
	add_theme_support( 'custom-background', apply_filters( 'btmarketing_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;


add_action('after_setup_theme', 'btmarketing_theme_setup');

function btmarketing_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'btmarketing' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Extra Sidebar', 'btmarketing' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'btmarketing_widgets_init' );


/**
 * Replaces the excerpt "more" text by a link.
 */
function new_excerpt_more($more) {
	global $post;
return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
//add_filter('show_admin_bar', '__return_false');

require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
?>