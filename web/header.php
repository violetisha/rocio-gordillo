<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <!-- Mobile Specific
    ================================================== -->
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">

    <!-- Meta Tags
    ================================================== -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" >
    <meta name="author" content="Violeta Rosales">
    <meta name="keywords" content=" ">
    <meta name="robots" content="INDEX, FOLLOW">
    <link type="text/plain" rel="author" href="<?php bloginfo('template_directory'); ?>/humans.txt">
   
    <!-- Title Tag
    ================================================== -->
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('template_directory'); ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory'); ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles CSS
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/magnific-popup.css">
    

    <!-- Scripts
    ================================================== -->
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-extra-selectors.js"></script><![endif]-->
    
    <!-- Libs-->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.nav.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/masonry.pkgd.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.magnific-popup.min.js"></script>
    
    <!-- Site-->
    <script src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>

    
    


    <!-- Analytics
    ================================================== -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-68629044-1', 'auto');
      ga('send', 'pageview');
    </script>


    <!-- WP Head
    ================================================== -->
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <!-- Header
  ================================================== -->
  <header>
    <div class="container"><a href="/" class="logo">
        <h1>Rocio <span>Gordillo</span></h1></a>
      <nav>

        <?php if (is_front_page()) { ?>
            <?php wp_nav_menu( array( 'theme_location' => 'navigation-front', 'menu_class' => 'menu-container', 'menu_id' => 'menu-front-page' ) ); ?>
        <?php } else { ?>
            <?php wp_nav_menu( array( 'theme_location' => 'navigation-main', 'menu_class' => 'menu-container', 'menu_id' => 'menu-front-page' ) ); ?>
        <?php } ?>

      </nav>
    </div>
  </header>

