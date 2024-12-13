<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <title><?php bloginfo("name"); ?> | <?php the_title(); ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nav.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/news.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/about.css" />
    <?php wp_head(); ?>
  </head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-82QG9TX807"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-82QG9TX807');
</script>
  <body <?php if (is_page('service')) {?> class="background-img"<?php } ?>>
    <?php if (is_front_page()) {
        ?>
        <div class="background-video">
        <video autoplay muted loop>
            <source src="<?php echo get_template_directory_uri(); ?>/images/background-video.mp4" type="video/mp4" />
            </video>
        </div>
    <?php

    }
    ?>
    <header id="header">
      <nav id="main_nav">
        <div class="logo">
          <a href="<?php echo get_home_url(); ?>"
            ><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Företagets logotyp"
          /></a>
        </div>
        <button class="menu-toggle" aria-label="Toggle menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <?php 
            wp_nav_menu([
                "theme_location" => "main_nav",
                "menu_class" => "nav-links", 
                "container" => "ul",        // Wraps the menu in a <nav> element
                
            ])
            
        ?>
      </nav>
  </header>
    <main>