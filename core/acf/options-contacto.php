<?php


if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_675f0a9c8ed139f99c9c7',
        'title' => 'Datas page Contacto',
        'fields' => array(
            // Banner
            array(
                'key' => 'field_banner_contacto',
                'label' => 'Imagen Banner',
                'name' => 'banner_contacto',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
            ),
            // Formas de pago
            array(
                'key' => 'field_pago_titulo',
                'label' => 'Título Formas de Pago',
                'name' => 'pago_titulo',
                'type' => 'text',
            ),
            array(
                'key' => 'field_pago_texto',
                'label' => 'Texto Formas de Pago',
                'name' => 'pago_texto',
                'type' => 'textarea',
            ),
            // Formulario (shortcode)
            array(
                'key' => 'field_form_shortcode',
                'label' => 'Shortcode Formulario',
                'name' => 'form_shortcode',
                'type' => 'text',
                'instructions' => 'Ejemplo: [contact-form-7 id="123" title="Formulario de contacto"]',
            ),
            // Pedidos y entregas
            array(
                'key' => 'field_pedidos_titulo',
                'label' => 'Título Pedidos',
                'name' => 'pedidos_titulo',
                'type' => 'text',
            ),
            array(
                'key' => 'field_pedidos_texto',
                'label' => 'Texto Pedidos',
                'name' => 'pedidos_texto',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_entregas_titulo',
                'label' => 'Título Entregas',
                'name' => 'entregas_titulo',
                'type' => 'text',
            ),
            array(
                'key' => 'field_entregas_texto',
                'label' => 'Texto Entregas',
                'name' => 'entregas_texto',
                'type' => 'textarea',
            ),
            // Encargos especiales (repeater)
            array(
                'key' => 'field_encargos',
                'label' => 'Encargos Especiales',
                'name' => 'encargos',
                'type' => 'repeater',
                'button_label' => 'Agregar Encargo',
                'sub_fields' => array(
                    array(
                        'key' => 'field_encargo_titulo',
                        'label' => 'Título',
                        'name' => 'encargo_titulo',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_encargo_texto',
                        'label' => 'Descripción',
                        'name' => 'encargo_texto',
                        'type' => 'textarea',
                    ),
                ),
            ),
            // WhatsApp Contacto
            array(
                'key' => 'field_whatsapp_titulo',
                'label' => 'Título WhatsApp',
                'name' => 'whatsapp_titulo',
                'type' => 'text',
            ),
            array(
                'key' => 'field_whatsapp_numero',
                'label' => 'Número WhatsApp',
                'name' => 'whatsapp_numero',
                'type' => 'text',
                'instructions' => 'Ingresar número con código de país, ej: 5491123456789',
            ),
            array(
                'key' => 'field_whatsapp_mensaje',
                'label' => 'Mensaje WhatsApp',
                'name' => 'whatsapp_mensaje',
                'type' => 'textarea',
                'instructions' => 'Este mensaje se enviará automáticamente al abrir WhatsApp.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-contacto.php',
                ),
            ),
        ),
    ));
endif;
