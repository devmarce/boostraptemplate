<?php
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

function my_acf_settings_path( $path ) {

    $path = get_stylesheet_directory() . '/vendor/acf/';
    
    // return
    return $path;
    
}

add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/vendor/acf/';
    
    // return
    return $dir;
    
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');


add_filter('acf/settings/show_admin', '__return_false');

/**
 * Carga ACF embebido en el theme
 * Registro de los grupos de campos ACF
 */
include_once( get_stylesheet_directory() . '/vendor/acf/acf.php' );
include_once( get_stylesheet_directory() . '/core/acf/options-contacto.php' );
include_once( get_stylesheet_directory() . '/core/acf/options-homepage.php' );
include_once( get_stylesheet_directory() . '/core/acf/options-settings.php' );// configuracion
include_once( get_stylesheet_directory() . '/core/acf/options-productos.php' );// campos de los productos de pasteleria
include_once( get_stylesheet_directory() . '/core/acf/options-entradas.php' );// campos de los productos de pasteleria