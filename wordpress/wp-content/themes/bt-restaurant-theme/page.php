<?php get_header(); ?>

    <?php while(have_posts()): the_post(); ?>
      <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="hero-content">
          <div class="hero-text">
              <h2><?php the_title(); ?></h2>
          </div>
        </div>
      </div>

      <div class="main-content container">
        <div class="text-center content-text clear">
            <?php the_content(); ?>
        </div>
      </div>



    <?php endwhile; ?>

<?php get_footer(); ?>