<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (function_exists('acf_add_local_field_group')):
    // Slider homepage
    acf_add_local_field_group(array(
        'key' => 'group_5e3c096c8ed139f99c9c1',
        'title' => 'Slider y Botones Página de inicio',
        'fields' => array(
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
                        'instructions' => 'Tamaño Horizontal (1920x650)',
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

if (function_exists('acf_add_local_field_group')):
    // Cards Services
    acf_add_local_field_group(array(
        'key' => 'group_cards_services',
        'title' => 'Cards Services □□□□',
        'fields' => array(
            array(
                'key' => 'field_cards_services_repeater',
                'label' => 'Cards Services',
                'name' => 'cards_services',
                'type' => 'repeater',
                'required' => 0,
                'button_label' => 'Añadir Card',
                'max' => 4,
                'sub_fields' => array(
                    array(
                        'key' => 'field_card_icono',
                        'label' => 'Icono / Imagen',
                        'name' => 'icono',
                        'type' => 'image',
                        'instructions' => 'Sube un ícono o imagen (48x48 recomendado)',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'button_label' => 'Añadir Imagen',
                    ),
                    array(
                        'key' => 'field_card_titulo',
                        'label' => 'Título',
                        'name' => 'titulo',
                        'type' => 'text',
                        'required' => 1,
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
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1,
        'description' => 'Grupo de campos para las Cards Services',
    ));
endif;

if (function_exists('acf_add_local_field_group')):
    // Banner Repuestos
    acf_add_local_field_group(array(
        'key' => 'group_banner_repuestos',
        'title' => 'Banner Repuestos',
        'fields' => array(
            array(
                'key' => 'field_banner_icono',
                'label' => 'Ícono',
                'name' => 'icono',
                'type' => 'image',
                'instructions' => 'Sube el ícono del banner (ej: 80x80px). <br>Si no, usa un icono por default (icon-agro.png)',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'button_label' => 'Añadir Ícono',
            ),
            array(
                'key' => 'field_banner_imagen',
                'label' => 'Imagen Principal',
                'name' => 'imagen',
                'type' => 'image',
                'instructions' => 'Imagen principal del banner (ej: repuestos1.png)',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'button_label' => 'Añadir Imagen',
            ),
            array(
                'key' => 'field_banner_titulo',
                'label' => 'Título',
                'name' => 'titulo',
                'type' => 'text',
                'instructions' => 'Texto principal del banner',
                'required' => 1,
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
        'description' => 'Campos para configurar el Banner de Repuestos',
    ));

endif;

if (function_exists('acf_add_local_field_group')):
    // Banner Usados y Servicios
    acf_add_local_field_group(array(
        'key' => 'group_banner_usados',
        'title' => 'Banner Usados y Servicios',
        'fields' => array(
            array(
                'key' => 'field_banner_usados_titulo',
                'label' => 'Título',
                'name' => 'titulo_sados',
                'type' => 'text',
                'instructions' => 'Texto principal del banner',
                'required' => 1,
            ),
            array(
                'key' => 'field_banner_usados_imagen_principal',
                'label' => 'Imagen Principal',
                'name' => 'imagen_principal',
                'type' => 'image',
                'instructions' => 'Imagen principal del banner (ej: máquina usada)',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_banner_usados_bloques',
                'label' => 'Bloque Botones',
                'name' => 'bloques',
                'type' => 'repeater',
                'instructions' => 'Añade los bloques con ícono, título y botón',
                'required' => 0,
                'button_label' => 'Añadir Bloque',
                'sub_fields' => array(
                    array(
                        'key' => 'field_bloque_icono',
                        'label' => 'Ícono (64*64)',
                        'name' => 'icono',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_bloque_titulo',
                        'label' => 'Título',
                        'name' => 'titulo',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_boton_href',
                        'label' => 'Link',
                        'name' => 'href',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ),
                ),
                'max' => 2, // opcional: limitar a 2 bloques como en tu ejemplo
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
        'description' => 'Campos para configurar el Banner Usados',
    ));

endif;
