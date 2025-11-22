<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (function_exists('acf_add_local_field_group')):
    // Campos ACF de Sucursales y WhatsApp del header
    acf_add_local_field_group(array(
        'key' => 'group_5e3c09gfgfyh9f99c9c4',
        'title' => '📍Enlaces especiales del Header',
        'fields' => array(
            array(
                'key' => 'field_whatsapp_number',
                'label' => 'Número de WhatsApp',
                'name' => 'whatsapp_number_header',
                'type' => 'text',
                'instructions' => 'Ingresar el número en formato. Ej: 541122000025',
                'required' => 1,
                'wrapper' => array(
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'field_whatsapp_message',
                'label' => 'Mensaje',
                'name' => 'whatsapp_message_header',
                'type' => 'textarea',
                'instructions' => 'Texto se puede armar en <a href="https://crear.wa.link/" target="_blank">Aquí 👈</a>',
                'required' => 0,
                'wrapper' => array(
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'field_linkespecial',
                'label' => 'Link Especial 🔥',
                'name' => 'link_especial',
                'type' => 'link',
                'instructions' => 'Seleccione o ingrese el link Especial',
                'required' => 0,
                'wrapper' => array(
                    'width' => '34', // un puntito más para completar el 100%
                ),
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-configuracion',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
endif;


if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_5e3c09gfgfyh9f99c9c5',
        'title' => '📍Enlaces del Footer',
        'fields' => array(
            array(
                'key' => 'field_footer_links_repeater',
                'label' => 'Enlaces para agergar en el Footer',
                'name' => 'footer_links',
                'type' => 'repeater',
                'instructions' => 'Agrega hasta 6 enlaces legales para el footer',
                'required' => 0,
                'collapsed' => 'field_footer_link',
                'min' => 0,
                'max' => 6, // límite de filas
                'layout' => 'row',
                'button_label' => '➕ Agregar enlace',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_link',
                        'label' => '↗ Link Footer',
                        'name' => 'link',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 1,
                        'return_format' => 'array',
                        'wrapper' => array(
                            'width' => '100',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-configuracion',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
endif;
