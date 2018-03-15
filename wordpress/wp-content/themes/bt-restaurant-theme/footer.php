
<footer>
<?php
        $args = array(
          'theme_location' => 'header-menu',
          'container' => 'nav',
					'after' => '<span class="seperator"> | </span>', 
					'container_class'=> ''
        );
        wp_nav_menu($args);
			 ?>
			 
			 <div class="address">
			 <p><?php echo esc_html( get_option( 'btrestaurant_address' ) ); ?></p>
        <p>Phone: <?php echo esc_html( get_option( 'btrestaurant_phone' ) ); ?></p>
</div>	 
	<div class="container">
		<p>&copy; <?php the_date('Y'); ?> - <?php bloginfo('name'); ?></p>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>