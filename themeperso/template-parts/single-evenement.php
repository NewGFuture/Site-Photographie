

<?php
$args = array(
    'post_type'      => 'evenements',
    'posts_per_page' => 8,
    'orderby'        => 'meta_value',
    'meta_key'       => 'reference',
    'order'          => 'ASC',
);

$query = new WP_Query($args);

if ($query->have_posts() && !is_page('À PROPOS')) { // Vérifie si ce n'est pas la page "A PROPOS"
    $count = 0; // Compteur pour regrouper les images par paire
    while ($query->have_posts()) {
        $query->the_post();
        $image = get_field('photos');
        if ($image) {
            $image_url = $image['url'];
            $image_alt = $image['alt'];
            $image_link = get_permalink(); // Lien vers une page unique pour chaque image

            // Incrémentez le compteur
            $count++;

            // Si le compteur est pair, ouvrez une nouvelle ligne pour regrouper deux images par ligne
            if ($count % 2 !== 0) {
                echo '<div class="image-pair-container">'; // Ajout de la classe image-pair-container
                echo '<div class="image-pair">'; // Ajout de la classe image-pair
            }
            ?>
            <a href="<?php echo esc_url($image_link); ?>" class="image-with-margin">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" style="width: 564px; height: 495px;">
            </a>
            <?php
            // Si le compteur est impair ou si c'est la dernière image, fermez le groupe
            if ($count % 2 === 0 || $count === $query->post_count) {
                echo '</div>'; // Fermer la div image-pair
                echo '</div>'; // Fermer la div image-pair-container
            }
        } else {
            ?>
            <p>Aucune image trouvée.</p>
            <?php
        }
    }
    wp_reset_postdata();
} elseif (is_page('À PROPOS')) {
    // Vérifier si c'est la page "À PROPOS"
    // Ne rien afficher ou mettre un message spécifique si nécessaire
} else {
    echo 'Aucune publication trouvée.';
}
?>





