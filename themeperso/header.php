<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;1,700&family=Syne&display=swap" rel="stylesheet"> 
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
<header>
<div class="logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/logo.png" alt="Description de votre logo">
    </div>
<nav class="main-menu" role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
    <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false // On retire le conteneur généré par WP
        ]);
    ?>
</nav>
</header>

    <?php wp_body_open(); ?>
