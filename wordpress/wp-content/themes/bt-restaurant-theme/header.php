<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">


<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="BT Restaurant" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
 
    <meta name="mobile-web-app-capable" content="yes" /> 
    <meta name="theme-color" content="#A61206" />
    <meta name="application-name" content="BTRestaurant" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/android-icon.png" sizes="180x180" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



<header class = "site-header">
	<div class="container">

<div class = "logo"> 
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
           
              if( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
              }
            ?>
          </a>
        </div> 
 <div class = "header-information">
 <div class="social-media">
            <?php
              $args = array(
                'theme_location'  => 'social-menu',
                'container'       => 'nav', 
                'container_class' => 'social-menu', 
                'container_id'    => 'social-menu', 
                'link_before'     => '<span class="sr-text">',
                'link_after'      => '</span>'
              );

              wp_nav_menu( $args );
            ?>
          </div>  <!-- .social-media -->
	
<div class="address">
			 <p><?php echo esc_html( get_option( 'btrestaurant_address' ) ); ?></p>
        <p>Phone: <?php echo esc_html( get_option( 'btrestaurant_phone' ) ); ?></p>
</div>	
		</div>
</div>
	
</header>
		<div class="main-menu">
			<div class = "mobile-menu"> 
<a href="#" class="mobile">Menu <i class="fa fa-bars"></i>
        </a>
		</div>
		<div class="container navigation">
		<?php
			$args = array(
				'theme_location'	=> 'header-menu',
				'container' => 'nav', //html element
				'container_class'=>'main-nav'
			);
		?>
		<?php wp_nav_menu($args); ?>
		</div>
		</div>
