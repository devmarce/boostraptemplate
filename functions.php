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
    $content_width = 1140;// this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
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
 * Registrar el Custom Post Type "Machines".
 *
 * Este CPT está orientado a vehículos y maquinaria agropecuaria.
 */
function registrar_post_type_machines() {
  $labels = array(
    'name'                  => 'Machines',
    'singular_name'         => 'Vehículo',
    'menu_name'             => 'Machines Agro',
    'name_admin_bar'        => 'Vehículo',
    'add_new'               => 'Agregar nuevo',
    'add_new_item'          => 'Agregar nuevo vehículo',
    'new_item'              => 'Nuevo vehículo',
    'edit_item'             => 'Editar vehículo',
    'view_item'             => 'Ver vehículo',
    'all_items'             => 'Todos los vehículos',
    'search_items'          => 'Buscar vehículos',
    'not_found'             => 'No se encontraron vehículos',
    'not_found_in_trash'    => 'No se encontraron vehículos en la papelera',
    'parent_item_colon'     => 'Vehículo padre:',
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'has_archive'           => true,
    'rewrite'               => array('slug' => 'machines'),
    'supports'              => array('title'),
    'menu_icon'             => 'dashicons-car',
    'show_in_rest'          => true,
  );

  register_post_type('machines', $args);
}
add_action('init', 'registrar_post_type_machines');



/**
 * Construye un array de máquinas agrupadas por categoría.
 *
 * @return array
 */
function get_machines_grouped_by_category() {
    $args = array(
        'post_type'      => 'machines',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $machines = get_posts($args);
    $data_machine = [];

    if ($machines) {
        foreach ($machines as $post) {
            setup_postdata($post);

            // Campos ACF con sanitización y fallback
            $categoria = esc_html(get_field('categoria', $post->ID));
            $modelo    = esc_html(get_field('modelo', $post->ID));
            $imagen    = get_field('imagen', $post->ID);

            // Si no hay categoría o modelo, saltamos
            if (empty($categoria) || empty($modelo)) {
                continue;
            }

            // Fallback de imagen: si es array ACF, tomamos 'url'; si no, usamos placeholder
            if (is_array($imagen) && !empty($imagen['url'])) {
                $imagen_url = esc_url($imagen['url']);
            } elseif (!empty($imagen)) {
                $imagen_url = esc_url($imagen);
            } else {
                $imagen_url = esc_url(get_stylesheet_directory_uri() . '/assets/img/default.png');
            }

            // Creamos el item
            $item = [
                'nombre' => $modelo,
                'imagen' => $imagen_url,
            ];

            // Agrupamos por categoría
            if (!isset($data_machine[$categoria])) {
                $data_machine[$categoria] = [];
            }
            $data_machine[$categoria][] = $item;
        }

        wp_reset_postdata();
    }

    return $data_machine;
}
