<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">


<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content ="">
<meta name="author" content="">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="BT Restaurant" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
 
    <meta name="mobile-web-app-capable" content="yes" /> 
    <meta name="theme-color" content="#A61206" />
    <meta name="application-name" content="BTMarketing" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/android-icon.png" sizes="180x180" />
    <link rel="icon" href="img/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'btmarketing' ); ?></a>
</div>
  <!-- HEADER	================================================== -->
	<header class="site-header" role="banner">
		
		<!-- NAVBAR================================================== -->

					<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
						<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="BT Marketing"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sr-only">Toggle navigation</span>
							<span class="navbar-toggler-icon"></span>
						</button>
						
<!-- navbar-header -->
					
					<!-- If the menu (WP admin area) is not set, then the "menu_class" is applied to "container". In other words, it overwrites the "container_class". Ref: http://wordpress.org/support/topic/wp_nav_menu-menu_class-usage-bug?replies=4 -->
					
					<?php
						wp_nav_menu( array(
							
							'theme_location'	=> 'primary',
							'container'			=> 'div',
							'container_class'	=> 'navbar-collapse collapse',
							'menu_class'		=> 'navbar-nav ml-auto'
							
						) );
					?>
					
				
						</div>

		</div><!-- navbar-wrapper -->
					</nav>
	</header>