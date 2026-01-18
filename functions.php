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
        'name'                  => '🍥 Mis Delicias',
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
        'rewrite'               => array('slug' => 'delicias_pasteleria'),
        'supports'              => array('title'),
        'menu_icon'             => 'dashicons-heart',
        'show_in_half'          => true,
    );

    register_post_type('delicias_pasteleria', $args);
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
        'post_type'      => 'delicias_pasteleria',
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
            $aclaracion       = esc_html(get_field('aclaracion', $post->ID));
            $tag_promo        = esc_html(get_field('tag_promo', $post->ID));
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
                'id'                        => $id,
                'nombre'                    => $nombre,
                'descripcion_corta'         => $descripcion_corta,
                'descripcion'               => $descripcion,
                'categoria'                 => $categoria,
                'imagen'                    => $imagen_url,
                'galeria'                   => $galeria_urls,
                'video'                     => $video,
                'precio'                    => $precio,
                'precio_temporal'           => get_field('precio_temporal', $id) ?: 0,
                'precio_temporal_hasta' => get_field('precio_temporal_hasta', $id) ?: '',
                'descuento'                 => $descuento,
                'estado'                    => $estado,
                'aclaracion'                => $aclaracion,
                'tag_promo'                 => $tag_promo,
                'stock'                     => $stock,
                'unidad'                    => $unidad,
                'enlace_solicitar'          => $enlace_solicitar,
                'hot_sale'                  => $hot_sale,
                'modal_form'                => $modal_form,
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
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('forms-modales', get_stylesheet_directory_uri() . '/assets/js/forms-modales.js', ['jquery'], time(), true);

    // Obtenemos los modelos
    $productos_pasteleria_cat = get_pasteleria_grouped_by_category();
    $productos = [];

    foreach ($productos_pasteleria_cat as $categoria => $items) {
        foreach ($items as $item) {
            $productos[] = esc_html($item['nombre']);
        }
    }

    wp_localize_script('forms-modales', 'deliciasData', [
        'delicias' => $productos
    ]);
});


// Función para generar botón de WhatsApp con mensaje personalizado
function whatsapp_delicias($producto, $numero_wa, $title_btn = "Consultar")
{
    // Mensaje base
    $mensaje = "Hola Dulcing, quiero consultar el siguiente producto: " . $producto;
    // Codificar el mensaje para URL
    $mensaje_codificado = urlencode($mensaje);
    // Armar la URL de WhatsApp
    $url = "https://wa.me/" . $numero_wa . "?text=" . $mensaje_codificado;
    // Generar el botón con logo
    $html = '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">' . $title_btn . '
                <img src="' . get_stylesheet_directory_uri() . '/assets/img/icons/icon-whatsapp.png" alt="WhatsApp" />
             </a>';

    return $html;
}


/**
 * Genera un botón de WhatsApp con enlace directo.
 *
 * @param string $tel       Número de teléfono (se limpian caracteres no numéricos).
 * @param string $tit_btn   Texto del botón (por defecto "Enviar Mensaje").
 * @param string $mensaje   Mensaje inicial en WhatsApp (por defecto un saludo).
 *
 * @return void             Imprime el HTML del botón.
 */
function whatsapp_btn($tel, $mensaje, $tit_btn = "Enviar Mensaje")
{
    $htmlwa = '';

    if ($mensaje == '') {
        $mensaje = "Hola Dulcing, quiero solicitar una de sus delicias...";
    }

    if ($tel) {
        $wa_url = "https://wa.me/" . preg_replace('/\D/', '', $tel) . "?text=" . urlencode($mensaje);

        $htmlwa .= '<a href="' . esc_url($wa_url) . '" target="_blank" class="btn btn-whatsapp f-serius odin-bed">';
        $htmlwa .= '<i class="fab fa-whatsapp"></i> ' . $tit_btn;
        $htmlwa .= '</a>';
    }

    echo $htmlwa;
}



function cat_odin_ini ($color = '#000000', $array = ['Z', 'z', 'z'], $color_txt = '#000000', $device = '')
{
    // echo cat_odin_ini('#FF0000', ['😴', '💤', '🛌'], '#0000FF');
    //      html o boton -> add class "odin-bed"
    // echo cat_odin_end();


    // Asegurarse de que el color sea válido
    $color = htmlspecialchars($color);
    $color_txt = htmlspecialchars($color_txt);

    // Generar los spans del sueño con los elementos del array
    $spans = '';
    foreach ($array as $element) {
        $spans .= '<span style="font-family: Ephesis; color: ' . $color_txt . ';">' . htmlspecialchars($element) . '</span>' . PHP_EOL . '        ';
    }

    return <<<HTML
      <div class="mouse-detector {$device}">
        <div class="odin">
      <!-- sueño -->
      <div class="sleep-symbol">
        $spans
      </div>
      <!-- CAT -->
      <div class="thecat">
        <svg width="3rem" viewBox="0 0 45.952225 35.678726" version="1.1" id="svg1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
          <defs id="defs1" />
          <g id="layer1" style="display:inline" transform="translate(-121.80376,-101.90461)">
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 144.95859,104.74193 c 6.01466,-2.1201 14.02915,-0.85215 17.62787,2.77812 3.59872,3.63027 2.91927,7.6226 -0.0661,11.80703 -2.98542,4.18443 -9.54667,3.58363 -15.1474,3.43959 -5.60073,-0.14404 -10.30411,-0.0586 -11.67474,-3.9026 7.85671,-2.22341 3.24576,-12.00205 9.26042,-14.12214 z" id="path1" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 156.30732,121.30486 c 0,0 -3.82398,2.52741 -4.14054,3.7997 -0.31656,1.2723 0.31438,2.18109 0.95701,2.55128 0.64264,0.3702 1.59106,-0.085 2.13559,-0.75306 0.54452,-0.6681 1.5629,-2.25488 2.47945,-3.20579 0.91654,-0.95091 2.96407,-2.74361 2.96407,-2.74361 l 0.73711,-3.60348 z" id="path2" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 136.93356,123.08347 c 0,0 -3.20149,3.2804 -3.24123,4.59088 -0.0397,1.31049 0.60411,1.83341 1.3106,2.05901 0.7065,0.22559 1.60304,-0.55255 1.99363,-1.32084 0.39056,-0.76832 1.14875,-2.30337 2.04139,-3.29463 0.89264,-0.99126 3.37363,-3.37561 3.37363,-3.37561 l -1.30007,-3.61169 z" id="path3" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 130.12859,121.60522 c -2.15849,1.92962 -3.38576,3.23532 -3.61836,4.5256 -0.23257,1.2903 0.0956,1.80324 0.76105,2.13059 0.66549,0.32733 1.66701,-0.31006 2.16665,-1.01233 0.49961,-0.70231 1.04598,-1.14963 2.83575,-3.05671 1.78977,-1.90708 5.91823,-3.27102 5.91823,-3.27102 l -0.75313,-3.99546 c 0,0 -5.15171,2.7497 -7.31019,4.67933 z" id="path4" />
            <path id="path5" style="display:inline;fill:$color;stroke:none;stroke-width:0.292536;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.988235" d="m 147.59927,113.85404 c 0.68896,4.40837 -4.04042,7.93759 -10.51533,8.9455 -6.47491,1.00791 -12.24344,-0.88717 -12.9324,-5.29555 -0.68895,-4.40838 3.44199,-9.94186 9.9169,-10.94977 6.47491,-1.0079 12.84186,2.89144 13.53083,7.29982 z" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 126.36446,111.82609 c 0,0 -2.37067,-6.28072 -0.86724,-7.10855 1.50342,-0.82783 5.87139,3.72617 5.87139,3.72617 z" id="path6" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 143.50182,108.85407 c 0,0 -0.0544,-6.71302 -1.75519,-6.94283 -1.70081,-0.22982 -4.13211,5.59314 -4.13211,5.59314 z" id="path7" />
            <g id="g25" style="display:inline">
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 125.27102,116.06007 -2.97783,-1.05373" id="path8" />
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 124.91643,116.80991 -2.84808,0.0754" id="path9" />
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 124.97798,118.00308 -2.53111,0.5156" id="path10" />
            </g>
            <g id="g13" transform="rotate(-23.188815,49.755584,71.047761)" style="display:inline;fill:none;stroke:$color">
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 121.77448,146.87682 3.00963,-0.95912" id="path11" />
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 122.10521,147.63749 2.84427,0.16537" id="path12" />
              <path style="fill:none;stroke:$color;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 122.00599,148.82812 2.51354,0.59531" id="path13" />
            </g>
            <ellipse style="display:inline;fill:#ffffff;stroke:none;stroke-width:0.56967;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="path14" cx="142.61723" cy="108.6707" rx="3.0261719" ry="3.0757811" transform="rotate(1.8105864)" />
            <ellipse style="display:inline;fill:$color;stroke:none;stroke-width:0.597086;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse15" cx="112.57543" cy="138.29808" rx="1.0380507" ry="1.3097118" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
            <ellipse style="display:inline;fill:#f9f9f9;fill-opacity:1;stroke:none;stroke-width:0.184905;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse16" cx="112.70263" cy="137.817" rx="0.32146212" ry="0.40558979" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
            <ellipse style="display:inline;fill:#ffffff;stroke:none;stroke-width:0.56967;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse17" cx="135.40735" cy="110.12592" rx="3.0261719" ry="3.0757811" transform="rotate(1.8105864)" />
            <ellipse style="display:inline;fill:$color;stroke:none;stroke-width:0.597086;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse18" cx="105.22613" cy="138.07497" rx="1.0380507" ry="1.3097118" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
            <ellipse style="display:inline;fill:#f9f9f9;fill-opacity:1;stroke:none;stroke-width:0.184905;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse19" cx="105.35332" cy="137.59389" rx="0.32146212" ry="0.40558979" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
            <path style="display:inline;fill:$color;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 163.77708,109.27292 c 4.36563,2.71198 4.26447,17.63497 3.70417,21.03437 -0.5603,3.3994 -1.86906,4.06275 -4.53099,4.49791 -5.87463,0.96037 -8.39724,-5.87134 -5.7547,-5.72161 2.64254,0.14973 3.15958,3.46446 5.95314,2.05052 2.79356,-1.41394 -1.42214,-13.46068 -1.42214,-13.46068 z" id="tail" />
            <path style="display:inline;fill:$color;stroke:none;stroke-width:0.264583;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 159.74981,121.34445 c 0,0 -2.98896,3.47517 -2.94624,4.78555 0.0427,1.31039 0.89775,2.01247 1.61702,2.1932 0.71928,0.18075 1.50745,-0.51603 1.84897,-1.30735 0.34149,-0.79135 0.88811,-2.59584 1.51032,-3.76081 0.62219,-1.16497 2.10268,-3.44845 2.10268,-3.44845 l -0.27441,-3.66785 z" id="path20" />
            <g id="lefteyelid" style="display:inline">
              <ellipse style="fill:$color;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="path21" cx="131.94429" cy="114.29948" rx="3.1571214" ry="3.2155864" />
              <path style="fill:$color;fill-opacity:1;stroke:#ffffff;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 129.32504,114.80228 c 2.54908,-1.14592 4.60706,-0.65481 4.60706,-0.65481" id="path22" />
            </g>
            <g id="righteyelid" style="display:inline">
              <ellipse style="fill:$color;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse22" cx="139.07704" cy="113.0834" rx="3.1571214" ry="3.2155864" />
              <path style="fill:$color;fill-opacity:1;stroke:#ffffff;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" d="m 136.48089,113.70683 c 2.48528,-1.2784 4.56624,-0.89621 4.56624,-0.89621" id="path23" />
            </g>
            <g id="eyesdown">
              <ellipse style="fill:#ffffff;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="path26" cx="139.12122" cy="113.61373" rx="1.8686198" ry="2.0422525" />
              <ellipse style="fill:$color;stroke:none;stroke-width:0.597086;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse25" cx="112.24622" cy="139.77037" rx="1.0380507" ry="1.3097118" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
              <ellipse style="fill:#f9f9f9;fill-opacity:1;stroke:none;stroke-width:0.184905;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse26" cx="112.37342" cy="139.28929" rx="0.32146212" ry="0.40558979" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
              <ellipse style="fill:#ffffff;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse27" cx="131.994" cy="114.92011" rx="1.8686198" ry="2.0422525" />
              <ellipse style="fill:$color;stroke:none;stroke-width:0.597086;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse28" cx="105.00267" cy="139.64998" rx="1.0380507" ry="1.3097118" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
              <ellipse style="fill:#f9f9f9;fill-opacity:1;stroke:none;stroke-width:0.184905;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235" id="ellipse29" cx="105.12987" cy="139.1689" rx="0.32146212" ry="0.40558979" transform="matrix(0.98048242,-0.19660678,0.20800608,0.97812753,0,0)" />
            </g>
            <path
              id="longtail"
              style="display:inline;fill:$color;fill-opacity:1;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:0.988235"
              d="m 164.24062,110.09354 -2.10788,6.5381 c 0,0 0.84017,12.88397 0.35269,20.95169 h 4.78291 c 0.83489,-8.63528 0.13334,-24.78453 -3.02772,-27.48979 z" />
          </g>
        </svg>
      </div>
    HTML;
}

function cat_odin_end () {
    return <<<HTML
        </div>
    </div>
    HTML;
}