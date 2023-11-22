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
    

<?php if (!is_single()) : ?>
<header class="hero">
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

<?php
$args = array(
    'post_type'      => 'evenements', // Remplacez 'votre_type_de_contenu' par le nom de votre type de contenu
    'orderby'        => 'rand',
    'posts_per_page' => 1
);

$random_post = new WP_Query($args);

if ($random_post->have_posts()) :
    while ($random_post->have_posts()) : $random_post->the_post();
        $background_image = get_field('photos'); // Récupérer l'URL de l'image à partir du champ ACF 'Photos'
?>
        <div class="hero-content" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
            <!-- Votre contenu du héros ici -->
            <div class="container">
            <h1><?php the_title(); ?></h1>
            </div>
            <p><?php the_excerpt(); ?></p>
        </div>
<?php
    endwhile;
    wp_reset_postdata(); // Réinitialiser les données de la requête
endif;
?>
</header>
<?php endif; ?>
<main>
       

</main>


    <?php wp_body_open(); ?>

