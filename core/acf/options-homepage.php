<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/* Slider homepage */
if (function_exists('acf_add_local_field_group')):
    // Slider homepage
    acf_add_local_field_group(array(
        'key' => 'group_5e3c096c8ed139f99c9c1',
        'title' => 'Slider y Botones Página de inicio',
        'fields' => array(
            array(
                'key' => 'field_c096c8ed139f9_mostrar',
                'label' => 'Mostrar Componente',
                'name' => 'visible_slider_homepage',//$mostrar_banner = get_field('visible_slider_homepage', 'option');
                'type' => 'true_false',
                'ui_on_text' => 'Mostrar', 
                'ui_off_text' => 'Ocultar',
                'instructions' => '📵 Activa o desactiva la visualización de este componente.',
                'default_value' => 0,
                'ui' => 1, // oculto por default
            ),
            array(
                'key' => 'field_5b632d28c0bf5c91',
                'label' => 'Slider',
                'name' => 'slider_homepage',
                'type' => 'repeater',
                'required' => 0,
                'button_label' => 'Añadir Slide',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5b632d57c0bf6c11',
                        'label' => 'Imagen Horizontal ▱',
                        'name' => 'imagen',
                        'type' => 'image',
                        'instructions' => 'Tamaño Horizontal (1024x350)',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'button_label' => 'Añadir Imagen',
                    ),
                    array(
                        'key' => 'field_5b632d57c0bf6cd11',
                        'label' => 'Imagen Vertical ▯ (Opcional)',
                        'name' => 'imagen_mobile',
                        'type' => 'image',
                        'instructions' => 'Tamaño Vertical (1200x1200)',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'button_label' => 'Añadir Imagen',
                    ),
                    array(
                        'key' => 'field_5b632dsasac0b8',
                        'label' => 'Título',
                        'name' => 'titulo',
                        'type' => 'text',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_5b632dsasac856',
                        'label' => 'Sub titulo o descripcion',
                        'name' => 'descripcion',
                        'type' => 'text',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_5b632d8aplsd9dk',
                        'label' => 'Botón - Link',
                        'name' => 'boton_link',
                        'type' => 'link',
                        'required' => 0,
                    ),
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-pagina-de-inicio',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
        'description' => '',
    ));
endif;

/* Forma de pago homepage */
if (function_exists('acf_add_local_field_group')):
    // Grupo de campos: Formas de pago y consultas
    acf_add_local_field_group(array(
        'key' => 'group_675f0a9c8ed139f99c9c2',
        'title' => 'Formas de Pago y Consultas',
        'fields' => array(
            array(
                'key' => 'field_675f0a9c_mostrar',
                'label' => 'Mostrar Componente',
                'name' => 'visible_formas_pago_consulta',//$mostrar_banner = get_field('banner_visible', 'option');
                'type' => 'true_false',
                'ui_on_text' => 'Mostrar', 
                'ui_off_text' => 'Ocultar',
                'instructions' => '📵 Activa o desactiva la visualización de este componente.',
                'default_value' => 0,
                'ui' => 1, // oculto por default
            ),
            array(
                'key' => 'field_675f0a9c0bf5c92',
                'label' => 'Bloques de información',
                'name' => 'formas_pago_consulta',
                'type' => 'repeater',
                'required' => 0,
                'button_label' => 'Añadir Bloque',
                'sub_fields' => array(
                    array(
                        'key' => 'field_675f0a9c_icono',
                        'label' => 'Icono',
                        'name' => 'icono',
                        'type' => 'text',
                        'instructions' => 'Puedes usar un emoji (💳, 📞, $) o un código SVG.',
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_675f0a9c_titulo',
                        'label' => 'Título',
                        'name' => 'titulo',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_675f0a9c_descripcion',
                        'label' => 'Descripción',
                        'name' => 'descripcion',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 0,
                    ),
                    array(
                        'key' => 'field_675f0a9c_resaltado',
                        'label' => 'Texto destacado',
                        'name' => 'resaltado',
                        'type' => 'text',
                        'instructions' => 'Ejemplo: "Pedidos con dos días de anticipación".',
                        'required' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-pagina-de-inicio',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
        'description' => 'Configura los bloques de pago y consulta que aparecen en la página de inicio.',
    ));
endif;

/* Eventos homepage */
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_eventos_especiales',
        'title' => 'Data Eventos Especiales',
        'fields' => array(
            array(
                'key' => 'field_5f0a9c0bf5654fs_mostrar',
                'label' => 'Mostrar Componente',
                'name' => 'visible_eventos_home',//$mostrar_banner = get_field('visible_eventos_home', 'option');
                'type' => 'true_false',
                'ui_on_text' => 'Mostrar', 
                'ui_off_text' => 'Ocultar',
                'instructions' => '📵 Activa o desactiva la visualización de este componente.',
                'default_value' => 0,
                'ui' => 1, // oculto por default
            ),
            array(
                'key' => 'field_eventos_titulo',
                'label' => 'Título',
                'name' => 'eventos_titulo',
                'type' => 'text',
                'instructions' => 'Título principal del bloque (h1).',
                'required' => 1,
                'default_value' => 'Catering para Eventos Especiales',
            ),
            array(
                'key' => 'field_eventos_texto',
                'label' => 'Texto destacado',
                'name' => 'eventos_texto',
                'type' => 'textarea',
                'instructions' => 'Texto descriptivo del bloque.',
                'rows' => 5,
                'default_value' => '"Eleve el estándar de sus reuniones y eventos empresariales con nuestra propuesta de catering dulce. Ofrecemos soluciones integrales de pastelería que combinan estética profesional y sabores equilibrados. Diseñamos menús adaptados a coffee breaks, lanzamientos de marca y cenas de gala, asegurando una logística impecable y una presentación que refuerza la imagen de excelencia de su empresa."',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-pagina-de-inicio',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
        'description' => 'Configura el bloque de Eventos Especiales en la página de inicio.',
    ));

endif;

/* Banner Destacado homepage */
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'field_675f0a9c0bf5x23',
        'title' => 'Data Banner Destacado',
        'fields' => array(
            array(
                'key' => 'field_5f0a9c0bf5_mostrar',
                'label' => 'Mostrar Componente',
                'name' => 'visible_banner_home',//$mostrar_banner = get_field('visible_banner_home', 'option');
                'type' => 'true_false',
                'ui_on_text' => 'Mostrar', 
                'ui_off_text' => 'Ocultar',
                'instructions' => '📵 Activa o desactiva la visualización de este componente.',
                'default_value' => 0,
                'ui' => 1, // oculto por default
            ),
            array(
                'key' => 'field_banner_titulo',
                'label' => 'Título del Banner',
                'name' => 'banner_titulo',
                'type' => 'text',
                'instructions' => 'Texto principal del banner (h1).',
                'required' => 1,
            ),
            array(
                'key' => 'field_banner_texto',
                'label' => 'Texto destacado',
                'name' => 'banner_texto',
                'type' => 'textarea',
                'instructions' => 'Texto secundario o destacado debajo del título.',
                'rows' => 2,
            ),
            array(
                'key' => 'field_banner_boton_texto',
                'label' => 'Texto del botón',
                'name' => 'banner_boton_texto',
                'type' => 'text',
                'instructions' => 'Texto que aparece en el botón.',
                'default_value' => 'Contáctanos',
            ),
            array(
                'key' => 'field_banner_boton_url',
                'label' => 'URL del botón',
                'name' => 'banner_boton_url',
                'type' => 'url',
                'instructions' => 'Enlace al que apunta el botón.',
                'default_value' => '#contacto',
            ),
            array(
                'key' => 'field_banner_imagen',
                'label' => 'Imagen de fondo',
                'name' => 'banner_imagen',
                'type' => 'image',
                'instructions' => 'Imagen de fondo del banner.',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_banner_imagen_mobile',
                'label' => 'Imagen de fondo',
                'name' => 'banner_imagen_mobile',
                'type' => 'image',
                'instructions' => 'Imagen de fondo del banner.',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-pagina-de-inicio',
                ),
            ),
        ),
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
        'description' => 'Configura el banner destacado de la página de inicio.',
    ));

endif;
