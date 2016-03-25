<?php get_header(); ?>
  
    <!-- Home Layout
    ================================================== -->

    <!-- ========================-->
    <!-- Magazine-->
    <!-- ========================-->
    <div id="magazine" class="panel-slideshow">
      <div style="background-image: url(<?php bloginfo('template_directory'); ?>/img/slide-01.jpg)" class="item-slideshow"></div>
    </div>



    <!-- ========================-->
    <!-- Acerca De-->
    <!-- ======================== -->
    <div id="acerca-de" class="panel-quienes-somos">
      <div class="container">

        <?php 
          // Only retrieve the Intro Post
          $queryIntro = new WP_Query( array( 'name' => 'acerca-de' ) );
          // The loop
          if ($queryIntro->have_posts()) : while ($queryIntro->have_posts()) : $queryIntro->the_post(); 
        ?>

        
        <h2><span><?php the_title(); ?></span></h2>
        <?php the_content(); ?>


        <?php 
          endwhile; 
          endif;
          wp_reset_postdata();
        ?>
        
      </div>
    </div>



    <!-- ========================-->
    <!-- Portafolio-->
    <!-- ========================-->
    <div id="portafolio" class="panel-portafolio">
      <div class="container">
        
        <h2><span>Portafolio</span></h2>

        <div class="grid-home">
        
        <?php
          // Arguments
          $queryPortafolio = new WP_Query( array(
            'posts_per_page' => -1,
            'orderby'        => 'most_recent',
            'category_name'  => 'portafolio'
          ));
          // The loop
          if ($queryPortafolio->have_posts()) : while ($queryPortafolio->have_posts()) : $queryPortafolio->the_post();
        ?>

          <div class="item-portafolio"><a href="<?php the_permalink(); ?>">
            <div class="thumb">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="info">
              <h4><?php the_title(); ?></h4>
            </div></a>
          </div>

        <?php
          endwhile;
          endif;
          wp_reset_postdata();
        ?>

         </div>

      </div>
    </div>





    <!-- ========================-->
    <!-- Noticias-->
    <!-- ========================-->
    <div id="noticias" class="panel-noticias">
      <div class="container">
        <h2><span>Noticias</span></h2>
        <div class="the-grid-03">

          <?php
          // Arguments
          $queryNoticias = new WP_Query( array(
            'posts_per_page' => 3,
            'orderby'        => 'most_recent',
            'category_name'  => 'noticias'
          ));
          // The loop
          if ($queryNoticias->have_posts()) : while ($queryNoticias->have_posts()) : $queryNoticias->the_post();
          ?>

          <div class="item-noticias">
            <a href="<?php the_permalink(); ?>">
              <div class="thumb">
              <?php the_post_thumbnail(); ?>
              </div>
              <div class="info">
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
              </div>
            </a>
          </div>


        <?php
          endwhile;
          endif;
          wp_reset_postdata();
        ?>
          
        </div>
      </div>
    </div>




    <!-- ========================-->
    <!-- Reconocimientos-->
    <!-- ========================-->
    <div id="reconocimientos" class="panel-reconocimientos">
      <div class="container">

        <?php 
          // Only retrieve the Intro Post
          $queryIntro = new WP_Query( array( 'name' => 'reconocimientos' ) );
          // The loop
          if ($queryIntro->have_posts()) : while ($queryIntro->have_posts()) : $queryIntro->the_post(); 
        ?>

        <h2><span>Reconocimientos</span></h2>
        <?php the_content(); ?>

        <?php 
          endwhile; 
          endif;
          wp_reset_postdata();
        ?>
        
      </div>
    </div>

  
<?php get_footer(); ?>