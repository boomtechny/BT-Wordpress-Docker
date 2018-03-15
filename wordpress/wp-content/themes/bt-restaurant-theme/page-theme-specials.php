<?php
  /*
   * Template Name: Specials
   */
?>
<?php   ?>
<?php get_header(); ?>

<?php while( have_posts() ): the_post(); # Agregamos el loop de WordPress ?>
  <div class="hero" style="background-image: url( <?php echo get_the_post_thumbnail_url(); ?> );">
    <div class="hero-content">
      <div class="hero-text">
        <h1><?php the_title();      ?></h1>
      </div>
    </div>
  </div>
  <div class="main-content">
    <main class="centered-text page-content">
      <?php the_content();    ?>
    </main>
  </div>
<?php endwhile; ?>

<div class="specialties content">
  <h3 class="title-specialties">Ramen</h3>
  <div class="grid-container">
    <?php
   
      $args = array(
        'post_type'      => 'especialidades',   
        'posts_per_page' => -1,                 
        'orderby'        => 'title',          
        'order'          => 'ASC',            
        'category_name'  => 'Pizzas'           
      );
      
      $ramen = new WP_Query( $args );        
      while ( $ramen -> have_posts() ): $pizzas -> the_post();    
    ?>

      <div class="cols_2-4">
        <?php the_post_thumbnail( 'especialidades' ); ?>
        <div class="specialty-text">
          <h4><?php the_title(); ?> <span>$ <?php the_field( 'precio' ); ?></span></h4>
          <?php the_content(); ?>
        </div>  
      </div>

    <?php endwhile; wp_reset_postdata(); ?>
  </div>  <!-- .grid-container -->
</div>  <!-- .specialties -->

<div class="others content">
  <h3 class="title-others">Otros</h3>
  <div class="grid-container">
    <?php
    
      $args = array(
        'post_type'      => 'especialidades',   
        'posts_per_page' => -1,                 
        'orderby'        => 'title',           
        'order'          => 'ASC',              
        'category_name'  => 'Otros'         
      );
      #
      $otros = new WP_Query( $args );         
      while ( $otros -> have_posts() ): $otros -> the_post();   
    ?>

      <div class="cols_2-4">
        <?php the_post_thumbnail( 'especialidades' ); ?>
        <div class="others-text">
          <h4><?php the_title(); ?> <span>$ <?php the_field( 'precio' ); ?></span></h4>
          <?php the_content(); ?>
        </div>  
      </div>

    <?php endwhile; wp_reset_postdata(); ?>
  </div>  <!-- .grid-container -->
</div>  <!-- .others -->

<?php get_footer(); ?>
