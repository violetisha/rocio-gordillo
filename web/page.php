
<?php get_header(); ?>
  
  <!-- Single Layout
  ================================================== -->

  <section class="page">
    <div class="content">

      <?php 
        // The loop
        if (have_posts()) : while (have_posts()) : the_post(); 
      ?>
      
      <div class="wanted">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
      </div>

      <?php 
        endwhile; 
        endif;
      ?>
      
    </div>
  </section>

  
<?php get_footer(); ?>