<?php

/** 
 * Functions file.
 * 
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */


// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140; // this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
}


// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = apply_filters('bootstrap_basic4_column_left', 3);
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = apply_filters('bootstrap_basic4_column_right', 3);
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
    $bootstrapbasic4_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to auto register widgets.
$AutoRegisterWidgets = new BootstrapBasic4\Widgets\AutoRegisterWidgets();
$AutoRegisterWidgets->registerAll();
unset($AutoRegisterWidgets);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Display theme help page for admin.
$ThemeHelp = new \BootstrapBasic4\Controller\ThemeHelp();
$ThemeHelp->addActionsFilters();
unset($ThemeHelp);


require_once get_template_directory() . '/vendor/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
include_once get_template_directory() . '/core/acf.php';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Página de inicio',
        'icon_url' => 'dashicons-admin-home',
        'position' => '5'
    ));
    acf_add_options_page(array(
        'page_title' => 'Configuración',
        'icon_url' => 'dashicons-admin-settings',
        'position' => '4'
    ));
}

/**
 * Registrar el Custom Post Type "Productos de Pasteleria".
 *
 * Este CPT está orientado a vehículos y maquinaria agropecuaria.
 */
function registrar_post_type_productos_pasteleria()
{
    $labels = array(
        'name'                  => '🍥 Mis Productos',
        'singular_name'         => 'Delicia',
        'menu_name'             => 'Delicias',
        'name_admin_bar'        => 'Delicia',
        'add_new'               => 'Agregar nuevo',
        'add_new_item'          => 'Nueva Delicia 🧁',
        'new_item'              => 'Nueva delicia',
        'edit_item'             => 'Editar delicia',
        'view_item'             => 'Ver delicia',
        'all_items'             => 'Todas las delicias',
        'search_items'          => 'Buscar delicias',
        'not_found'             => 'No se encontraron delicias',
        'not_found_in_trash'    => 'No se encontraron delicias en la papelera',
        'parent_item_colon'     => 'Delicia padre:',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'productos_pasteleria'),
        'supports'              => array('title'),
        'menu_icon'             => 'dashicons-heart',
        'show_in_half'          => true,
    );

    register_post_type('productos_pasteleria', $args);
}
add_action('init', 'registrar_post_type_productos_pasteleria');

/**
 * Construye un array de productos de pastelería agrupados por categoría.
 *
 * @return array
 */
function get_pasteleria_grouped_by_category()
{
    $args = array(
        'post_type'      => 'productos_pasteleria',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $productos = get_posts($args);
    $data_pasteleria = [];

    if ($productos) {
        foreach ($productos as $post) {
            setup_postdata($post);

            // Campos ACF con sanitización y fallback
            $id               = esc_attr($post->ID);
            $nombre           = esc_html(get_field('nombre', $post->ID));
            $descripcion_corta = esc_html(get_field('descripcion_corta', $post->ID));
            $descripcion      = get_field('descripcion', $post->ID);
            $categoria        = esc_html(get_field('categoria', $post->ID));
            $imagen           = get_field('imagen', $post->ID);
            $galeria          = get_field('galeria', $post->ID);
            $video            = esc_url(get_field('video', $post->ID));
            $precio           = get_field('precio', $post->ID);
            $precio_temporal  = get_field('precio_temporal', $post->ID);
            $descuento        = get_field('descuento', $post->ID);
            $estado           = esc_html(get_field('estado', $post->ID));
            $promo            = esc_html(get_field('promo', $post->ID));
            $stock            = get_field('stock', $post->ID);
            $unidad           = esc_html(get_field('unidad', $post->ID));
            $enlace_solicitar = esc_html(get_field('enlace_solicitar', $post->ID));
            $hot_sale         = esc_html(get_field('hot_sale', $post->ID));
            $modal_form       = esc_html(get_field('modal_form', $post->ID));

            // Si no hay categoría o nombre, saltamos
            if (empty($categoria) || empty($nombre)) {
                continue;
            }

            // Fallback de imagen principal
            if (is_array($imagen) && !empty($imagen['url'])) {
                $imagen_url = esc_url($imagen['url']);
            } elseif (!empty($imagen)) {
                $imagen_url = esc_url($imagen);
            } else {
                $imagen_url = esc_url(get_stylesheet_directory_uri() . '/assets/img/default.png');
            }

            // Galería: extraemos URLs si existen
            $galeria_urls = [];
            if (is_array($galeria)) {
                foreach ($galeria as $img) {
                    if (!empty($img['url'])) {
                        $galeria_urls[] = esc_url($img['url']);
                    }
                }
            }

            // Creamos el item
            $item = [
                'id'               => $id,
                'nombre'           => $nombre,
                'descripcion_corta' => $descripcion_corta,
                'descripcion'      => $descripcion,
                'categoria'        => $categoria,
                'imagen'           => $imagen_url,
                'galeria'          => $galeria_urls,
                'video'            => $video,
                'precio'           => $precio,
                'precio_temporal'  => $precio_temporal,
                'descuento'        => $descuento,
                'estado'           => $estado,
                'promo'            => $promo,
                'stock'            => $stock,
                'unidad'           => $unidad,
                'enlace_solicitar' => $enlace_solicitar,
                'hot_sale'         => $hot_sale,
                'modal_form'       => $modal_form,
            ];

            // Agrupamos por categoría
            if (!isset($data_pasteleria[$categoria])) {
                $data_pasteleria[$categoria] = [];
            }
            $data_pasteleria[$categoria][] = $item;
        }

        wp_reset_postdata();
    }

    return $data_pasteleria;
}


/**
 * Devuelve clases de Bootstrap 4 para controlar la visibilidad de elementos
 * según el dispositivo (mobile o desktop).
 *
 * Parámetro:
 *  - 'desktop' → Oculta en móviles y muestra en pantallas medianas en adelante.
 *  - 'mobile'  → Muestra en móviles y oculta en pantallas medianas en adelante.
 *
 * Uso:
 *   echo responsive_device('desktop'); // d-none d-md-block
 *   echo responsive_device('mobile');  // d-block d-md-none
 */
function responsive_device($device)
{
    switch ($device) {
        case 'desktop':
            return 'd-none d-md-block';
        case 'mobile':
            return 'd-block d-md-none';
        default:
            return '';
    }
}

// Enqueue y pasar datos de los modelos al JS (forms-modales)
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('form-modelos', get_stylesheet_directory_uri() . '/assets/js/form-modelos.js', ['jquery'], time(), true);

    // Obtenemos los modelos
    $productos_pasteleria_cat = get_pasteleria_grouped_by_category();
    $productos = [];

    foreach ($productos_pasteleria_cat as $categoria => $items) {
        foreach ($items as $item) {
            $productos[] = esc_html($item['nombre']);
        }
    }

    wp_localize_script('form-modelos', 'deliciasData', [
        'delicias' => $productos
    ]);
});


// Función para generar URL de WhatsApp con mensaje personalizado
function whatsapp_delicias($producto, $numero_wa) {
    // Mensaje base
    $mensaje = "Hola Dulcing, quiero consultar el siguiente producto: " . $producto;

    // Codificar el mensaje para URL
    $mensaje_codificado = urlencode($mensaje);

    // Armar la URL de WhatsApp
    $url = "https://wa.me/" . $numero_wa . "?text=" . $mensaje_codificado;

    return $url;
}
