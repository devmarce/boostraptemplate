<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_pasteleria_datos',
        'title' => 'Datos del producto de pastelería 📋',
        'fields' => array(
            array(
                'key' => 'field_nombre',
                'label' => '🩷 Nombre',
                'name' => 'nombre',
                'type' => 'text',
            ),
            array(
                'key' => 'field_descripcion_corta',
                'label' => '🩷 Descripción corta',
                'name' => 'descripcion_corta',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_descripcion',
                'label' => '🩷 Descripción',
                'name' => 'descripcion',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 0,
            ),
            array(
                'key' => 'field_categoria',
                'label' => '🎂 Categoría',
                'name' => 'categoria',
                'type' => 'select',
                'choices' => array(
                    'tortas'     => 'Tortas',
                    'tartas'     => 'Tartas',
                    'alfajores'  => 'Alfajores',
                    'postres'    => 'Postres',
                    'otros'      => 'Otros',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
            ),
            array(
                'key' => 'field_imagen',
                'label' => '📸 Imagen principal',
                'name' => 'imagen',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_galeria',
                'label' => '🖼️ Galería de imágenes',
                'name' => 'galeria',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_video',
                'label' => '🎞️ Video',
                'name' => 'video',
                'type' => 'url',
            ),
            array(
                'key' => 'field_precio',
                'label' => '🤑 Precio',
                'name' => 'precio',
                'type' => 'number',
                'prepend' => '$',
                'step' => '0.01',
            ),
            array(
                'key' => 'field_precio_temporal',
                'label' => '⏲️ Precio temporal',
                'name' => 'precio_temporal',
                'type' => 'number',
                'prepend' => '$',
                'step' => '0.01',
            ),
            array(
                'key' => 'field_descuento',
                'label' => '📱 Descuento (%)',
                'name' => 'descuento',
                'type' => 'number',
                'min' => 0,
                'max' => 100,
            ),
            array(
                'key' => 'field_estado',
                'label' => '✅ Estado',
                'name' => 'estado',
                'type' => 'select',
                'choices' => array(
                    'activo'   => 'Activo',
                    'pausado'  => 'Pausado',
                    'agotado'  => 'Agotado',
                ),
                'allow_null' => 0,
                'ui' => 1,
            ),
            array(
                'key' => 'field_promo',
                'label' => '🏷️ Promo / etiqueta',
                'name' => 'promo',
                'type' => 'text',
            ),
            array(
                'key' => 'field_stock',
                'label' => '📋 Stock disponible',
                'name' => 'stock',
                'type' => 'number',
                'min' => 0,
            ),
            array(
                'key' => 'field_unidad',
                'label' => '⚖️ Unidad de venta',
                'name' => 'unidad',
                'type' => 'select',
                'choices' => array(
                    'unidad'   => 'Unidad',
                    'docena'   => 'Docena',
                    'kilo'     => 'Kilo',
                ),
                'allow_null' => 0,
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'productos_pasteleria',
                ),
            ),
        ),
    ));

endif;
