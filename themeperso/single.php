<?php
get_header();
// Assurez-vous que WordPress a des données à afficher
if (have_posts()) {
    // Commencez la boucle WordPress
    while (have_posts()) {
        // Chargez les données de l'article courant
        the_post();
        ?>
        <div class="event-image">
            <h2><?php the_title(); ?></h2>
            
            <?php
            // Afficher la référence
            $reference = get_field('reference');
            if ($reference) {
                echo '<p>Référence : ' . esc_html($reference) . '</p>';
            }

            // Récupérer et afficher les termes de la taxonomie "categorie"
            $categories = get_the_terms(get_the_ID(), 'categorie');
            if ($categories && !is_wp_error($categories)) {
                $category_names = array();
                foreach ($categories as $category) {
                    $category_names[] = $category->name;
                }
                echo '<p>Catégorie : ' . esc_html(implode(', ', $category_names)) . '</p>';
            }

            // Afficher le format
            $format = get_field('format');
            if ($format) {
                echo '<p>Format : ' . esc_html($format) . '</p>';
            }

            // Récupérer et afficher les termes de la taxonomie "type-photo"
            $types = get_the_terms(get_the_ID(), 'type-photo');
            if ($types && !is_wp_error($types)) {
                $type_names = array();
                foreach ($types as $type) {
                    $type_names[] = $type->name;
                }
                echo '<p>Type : ' . esc_html(implode(', ', $type_names)) . '</p>';
            }

            // Afficher l'année
            $year = get_the_date('Y');
            if ($year) {
                echo '<p>Année : ' . esc_html($year) . '</p>';
            }

            // Afficher l'image avec la taille spécifiée
            $image = get_field('photos');
            if ($image) {
                $image_url = $image['url'];
                $image_alt = $image['alt'];
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" style="width: 563px; height: 844px; object-fit: cover;">
                <?php
            } else {
                ?>
                <p>Aucune image trouvée.</p>
                <?php
            }
            ?>
        </div>
        <?php
    }
} else {
    // S'il n'y a pas de données à afficher
    echo 'Aucune publication trouvée.';
}
get_footer();
?>
















