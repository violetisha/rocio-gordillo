<?php get_header(); ?>
  
    <!-- Index Layout
    ================================================== -->

    <!-- ========================-->
    <!-- Portafolio-->
    <!-- ========================-->
    <div id="portafolio" class="panel-portafolio">
      <div class="container">
        <?php
          // The loop
          if (have_posts()) : while (have_posts()) : the_post(); 
        ?>
        
        <h2><span><?php the_title(); ?></span></h2>

        <?php the_content(); ?>

        <?php 
          endwhile; 
          endif;
        ?>

      </div>
    </div>
  
<?php get_footer(); ?>