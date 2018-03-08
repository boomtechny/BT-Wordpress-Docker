<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
		<a href="<?php echo home_url('/'); ?>">
			<h1>
					<?php bloginfo('name'); ?>
				</a>
				<span><?php bloginfo('description'); ?></span>
			</h1>
			<div class="h_right">
				<form method="get" action="<?php esc_url(home_url('/')); ?>">
					<input type="text" name="s" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<nav class="nav main-nav">
		<div class="container">
			<?php
				$args = array(
					'theme_location' => 'primary'
				);
			?>

			<?php wp_nav_menu($args); ?>
		</div>
	</nav>