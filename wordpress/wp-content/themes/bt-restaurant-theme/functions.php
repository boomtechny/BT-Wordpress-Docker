<?php

require get_template_directory() .'/inc/database.php';
require get_template_directory() .'/inc/options.php';
require get_template_directory() .'/inc/reservations.php';
function btrestaurant_theme_setup(){

	// Featured Image Support
	add_theme_support('post-thumbnails');
	add_image_size('boxes', 437, 291, true);
	add_image_size('specialties', 768, 515, true);
	add_image_size('specialty-portrait', 435, 300, true);
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);
}

	add_action('after_setup_theme', 'btrestaurant_theme_setup');


//Scripts 

function btrestaurant_files() {
	//add style sheets
	wp_register_style('bt-restaurant-styles', get_template_directory_uri().'/style.css', array(), '1.0'); 
	wp_register_style('normalize', get_template_directory_uri().'/normalize.css', array(), '8.0.0'); 
wp_register_style(
	'fluidboxcss',                                
	get_template_directory_uri().'/css/fluidbox.min.css', 
	array( 'normalize' ),                       
	'2.0.5'
);
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css');
	//enqueue styles

	wp_enqueue_style( 'fluidboxcss' );
wp_enqueue_style('bt-restaurant-styles'); 
wp_enqueue_style('normalize'); 
wp_enqueue_style('font-awesome');
	wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Play');

	//add scripts 
	$APIKey = esc_html( get_option( 'btrestaurant_googlemaps_apikey' ) );

		wp_register_script('script', get_template_directory_uri().'/js/scripts.js', array('jquery'), '1.0.0', true );
 wp_enqueue_script('bootstrapjs', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), '3.3.7', true);
	wp_register_script(
      'googlemaps',                               
			'https://maps.googleapis.com/maps/api/js?key='.$APIKey.'&callback=initMap',  
      array(),                                    
      'V3',                                     
      true                                          
		);
		wp_register_script(
      'fluidbox-jquery-throttle-debounce-plugin',                                
      get_template_directory_uri().'/js/jquery.ba-throttle-debounce.min.js', 
      array( 'jquery' ), '1.1.0',                                     
      true                                         
    );
    wp_register_script(
      'fluidbox',                                
      get_template_directory_uri().'/js/jquery.fluidbox.min.js', 
      array( 'jquery', 'fluidbox-jquery-throttle-debounce-plugin' ),'2.0.5',true                                        
		);
	
	//enqueue scripts

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery-ui-core' );  

	wp_enqueue_script('fluidbox');
	wp_enqueue_script('script');
	wp_enqueue_script( 'googlemaps' );
	wp_enqueue_script('fluidbox-jquery-throttle-debounce-plugin');
 
	wp_localize_script(
		'script',            
		'options',   
		array(              
			'latitude'  => get_option( 'btrestaurant_googlemaps_latitude' ),     
			'longitude' => get_option( 'btrestaurant_googlemaps_longitude' ),   
			'zoom'      => get_option( 'btrestaurant_googlemaps_zoom' )        
		)
	);
}

add_action('wp_enqueue_scripts', 'btrestaurant_files');


function btrestaurant_admin_scripts () {


	wp_enqueue_style(
		'sweetalert2_css',                           
		get_template_directory_uri() . '/css/sweetalert2.min.css'  
	);
	wp_enqueue_script(
		'sweetalert2_js',                             
		get_template_directory_uri() . '/js/sweetalert2.min.js',  
		array(),                                    
		'2.8.3',                                      
		true
	);


	wp_enqueue_script(
		'admin-ajax-js',                                  
		get_template_directory_uri(). '/js/admin-ajax.js',  
		array( 'jquery' ),                                
		1.0,                                               
		true                                               
	);

	wp_localize_script(
		'admin-ajax-js',         
		'delete_reservation',     
		array(                    
			'ajax_url'  => admin_url( 'admin-ajax.php' )  
		)
	);
}

add_action( 'admin_enqueue_scripts', 'btrestaurant_admin_scripts' );

function add_async_defer( $tag, $handle ) {
	if( 'googlemaps' !== $handle ) {
		return $tag;
	}
	return str_replace(
		' src',                               
		' async="async" defer="defer" src',   
		$tag                                 
	);
}
add_filter(
	'script_loader_tag',  
	'add_async_defer',    
	10,                   # Prirority
	2                     # Amount of Arguments
);


	// Menus

	function btrestaurant_menus(){
	register_nav_menus(array(
		'header-menu'	=> __('Header Menu', 'btrestaurant'), 
		'social-menu'	=> __('Social Menu', 'btrestaurant') 
	));

	}

	add_action('init', 'btrestaurant_menus');

//Custom Logo
function btrestaurant_custom_logo() {

	$size_logo = array(
		'width'  => 280,
		'height' => 220
	);
	add_theme_support( 'custom-logo', $size_logo );       
}

add_action( 'after_setup_theme', 'btrestaurant_custom_logo' );



function btrestaurant_specialties() {
	$labels = array(
		'name'               => _x( 'Ramen', 'btrestaurant' ),
		'singular_name'      => _x( 'Ramen', 'post type singular name', 'btrestaurant' ),
		'menu_name'          => _x( 'Ramen', 'admin menu', 'btrestaurant' ),
		'name_admin_bar'     => _x( 'Ramen', 'add new on admin bar', 'btrestaurant' ),
		'add_new'            => _x( 'Add New', 'book', 'btrestaurant' ),
		'add_new_item'       => __( 'Add New Ramen', 'btrestaurant' ),
		'new_item'           => __( 'New Ramen', 'btrestaurant' ),
		'edit_item'          => __( 'Edit Ramen', 'btrestaurant' ),
		'view_item'          => __( 'View Ramen', 'btrestaurant' ),
		'all_items'          => __( 'All Ramen', 'btrestaurant' ),
		'search_items'       => __( 'Search Ramen', 'btrestaurant' ),
		'parent_item_colon'  => __( 'Parent Ramen:', 'btrestaurant' ),
		'not_found'          => __( 'No Ramen found.', 'btrestaurant' ),
		'not_found_in_trash' => __( 'No Ramen found in Trash.', 'btrestaurant' )
	);
	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'btrestaurant' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'specialties' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);
	register_post_type( 'specialties', $args );
}
add_action( 'init', 'btrestaurant_specialties' );



// Widget Area
function btrestaurant_widgets() {
  register_sidebar( array(
    'name' => 'Blog Sidebar',
    'id' => 'blog_sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'btrestaurant_widgets');



#Add reCaptcha
function btrestaurant_add_recaptcha() {
  ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  <?php
}
# Hook
add_action( 'wp_head', 'btrestaurant_add_recaptcha' );




/*******************************************************************************
 * Setting a custom timeout value for cURL. Using a high value for priority to ensure the function runs after any other added to the same action hook.
 ******************************************************************************/
// Setting a custom timeout value for cURL. Using a high value for priority to ensure the function runs after any other added to the same action hook.

add_action('http_api_curl', 'sar_custom_curl_timeout', 9999, 1);
function sar_custom_curl_timeout( $handle ){
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 30 ); // 30 seconds. Too much for production, only for testing.
	curl_setopt( $handle, CURLOPT_TIMEOUT, 30 ); // 30 seconds. Too much for production, only for testing.
}
// Setting custom timeout for the HTTP request

add_filter( 'http_request_timeout', 'sar_custom_http_request_timeout', 9999 );
function sar_custom_http_request_timeout( $timeout_value ) {
	return 30; // 30 seconds. Too much for production, only for testing.
}
// Setting custom timeout in HTTP request args

add_filter('http_request_args', 'sar_custom_http_request_args', 9999, 1);
function sar_custom_http_request_args( $r ){
	$r['timeout'] = 30; // 30 seconds. Too much for production, only for testing.
	return $r;
}

 ?>