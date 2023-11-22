<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_scripts() {
    // Enregistrez jQuery depuis le CDN de Google
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
    // Autres scripts en file d'attente ici
}

function theme_enqueue_styles() {
 wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
 wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}



// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function themeperso_add_admin_pages() {
    add_menu_page('Paramètres du thème themeperso', 'themeperso', 'manage_options', 'themeperso-settings', 'themeperso_theme_settings', 'dashicons-admin-settings', 60);
}


function themeperso_theme_settings() {

    echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
    
    echo '<form action="options.php" method="post" name="themeperso_settings">';
    
    echo '<div>';
    
    settings_fields('themeperso_settings_fields');
    
    do_settings_sections('themeperso_settings_section');
    
    submit_button();
    
    echo '</div>';
    
    echo '</form>';
    
    }

function themeperso_settings_register() {
    register_setting('themeperso_settings_fields', 'themeperso_settings_fields', 'themeperso_settings_fields_validate');
    add_settings_section('themeperso_settings_section', __('Paramètres', 'themeperso'), 'themeperso_settings_section_introduction', 'themeperso_settings_section');
    add_settings_field('themeperso_settings_field_introduction', __('Introduction', 'themeperso'), 'themeperso_settings_field_introduction_output', 'themeperso_settings_section', 'themeperso_settings_section');
    }
    
    function themeperso_settings_section_introduction() {
    echo __('Paramètrez les différentes options de votre thème themeperso.', 'themeperso');
    }

    function themeperso_settings_fields_validate($inputs) {
        if(!empty($_POST)) {
            if(!empty($_POST['themeperso_settings_field_introduction'])) {
                update_option( 'themeperso_settings_field_introduction', $_POST['themeperso_settings_field_introduction'] );
            }
        }
        return $inputs;
    }
    
    function themeperso_settings_field_introduction_output() {
    $value = get_option('themeperso_settings_field_introduction');
    
    echo '<input type="texte" name="themeperso_settings_field_introduction" value="'.$value.'" />';
    }
    

add_action('admin_menu', 'themeperso_add_admin_pages', 10);   
add_action('admin_init', 'themeperso_settings_register');


// Emplacement de Menus Header et Footer

function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

function custom_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'custom_footer_menu' );