<?php get_header(); ?>
  
    <!-- Index Layout
    ================================================== -->

    <!-- ========================-->
    <!-- Portafolio-->
    <!-- ========================-->
    <div id="noticias">
      <div class="container">
        <?php
          // The loop
          if (have_posts()) : while (have_posts()) : the_post(); 
        ?>
        
        <h2><span><?php the_title(); ?></span></h2>
        <div class="post-image"><?php the_post_thumbnail(); ?></div>
        <?php the_content(); ?>

        <?php 
          endwhile; 
          endif;
        ?>

      </div>
    </div>
  
<?php get_footer(); ?>