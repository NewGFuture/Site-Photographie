<?php get_header(); ?>



<?php
// Boucle WordPress pour afficher la liste des articles 
while (have_posts()) :
    the_post();
    the_content(); // Affiche le contenu de l'article
endwhile;
?>



<main>

<?php get_template_part('template-parts/single-evenement');?>
</main>

<?php get_footer(); ?>