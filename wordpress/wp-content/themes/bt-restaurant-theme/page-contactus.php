<?php get_header(); ?>

<?php while( have_posts() ): the_post();?>
  <div class="hero" style="background-image: url( <?php echo get_the_post_thumbnail_url(); ?> );">
    <div class="hero-content">
      <div class="hero-text">
        <h1><?php the_title();      ?></h1>
      </div>
    </div>
  </div>
  <div class="main-content contact">
    <main class="page-content">
      <?php
   
        get_template_part(
          'templates/form',  
          'resrvation'     
        );
      ?>
    </main>
  </div>
<?php endwhile; ?>

<?php get_footer(); ?>