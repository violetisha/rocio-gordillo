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
        
        <h1><span><?php the_title(); ?></span></h1>

        <?php the_content(); ?>

        <?php 
          endwhile; 
          endif;
        ?>

      </div>
    </div>
  
<?php get_footer(); ?>