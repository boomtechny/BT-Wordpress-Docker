<?php
/*
* Template Name: Our Specialities
*/
get_header(); ?>

    <?php while(have_posts()): the_post(); ?>
      <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="hero-content">
          <div class="hero-text">
              <h2><?php the_title(); ?></h2>
          </div>
        </div>
      </div>

      <div class="main-content container">
        <div class="text-center content-text">
            <?php the_content(); ?>
        </div>
      </div>

      <div class="our-specialties container">
        <h3 class="primary-text">Ramen</h3>
        <div class="container-grid">
          <?php
            $args = array(
              'post_type' => 'specialties',
              'posts_per_page' => 15,
              'orderby' => 'title',
              'order' => 'ASC',
              'category_name' => 'ramen'
            );
            $ramen = new WP_Query($args);
            while($ramen->have_posts() ): $ramen->the_post(); ?>

            <div class="columns2-4 specialty-content">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('specialties') ?>
                <h4><?php the_title(); ?><span>$<?php the_field('price'); ?></span></h4>
                <?php the_content(); ?>
              </a>
            </div>

        <?php endwhile; wp_reset_postdata();
           ?>
        </div>

        <h3 class="primary-text">Appetitizers</h3>
        <div class="container-grid">
          <?php
            $args = array(
              'post_type' => 'specialties',
              'posts_per_page' => 15,
              'orderby' => 'title',
              'order' => 'ASC',
              'category_name' => 'appetizers'
            );
            $ramen = new WP_Query($args);
            while($ramen->have_posts() ): $ramen->the_post(); ?>

            <div class="columns2-4 specialty-content" >
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('specialties') ?>
                <h4><?php the_title(); ?> <span>$<?php the_field('price'); ?></span></h4>
                <?php the_content(); ?>
              </a>
            </div>

        <?php endwhile; wp_reset_postdata();
           ?>
        </div>
      </div>



    <?php endwhile; ?>

<?php get_footer(); ?>
