<?php wp_footer(); ?>
<footer>
    <nav class="footer-menu">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu', // Emplacement du menu que vous avez enregistré
                'menu_class' => 'footer-menu-list', // Classe CSS du menu
                'container' => false, // Ne pas afficher de conteneur <div> autour du menu
            ));
        ?>
    </nav>

<?php get_template_part('template-parts/modal');?>
</footer>
</body>
</html>