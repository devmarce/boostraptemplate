<?php
if (function_exists('acf_add_local_field_group')):

acf_add_local_field_group(array(
    'key' => 'group_campos_productos_pasteleria',
    'title' => '🧁 Campos de Producto de Pastelería',
    'fields' => array(

        array(
            'key' => 'field_titulo_producto',
            'label' => 'Título del producto',
            'name' => 'titulo_producto',
            'type' => 'text',
            'instructions' => 'Título del producto<br>Precio<br>Descripción corta<br>Descripción larga<br>Imagen del producto<br>Stock disponible<br>URL para pedido<br><br><br>Ej: Promo Día de la madre! - Oferta del Día',
            'required' => 1,
        ),

        array(
            'key' => 'field_precio_producto',
            'label' => 'Precio',
            'name' => 'precio_producto',
            'type' => 'number',
            'instructions' => 'Ej: 1200',
            'required' => 1,
        ),

        array(
            'key' => 'field_descripcion_corta',
            'label' => 'Descripción corta',
            'name' => 'descripcion_corta',
            'type' => 'textarea',
            'instructions' => 'Texto breve para mostrar en listados o cards',
            'required' => 0,
        ),

        array(
            'key' => 'field_descripcion_larga',
            'label' => 'Descripción larga',
            'name' => 'descripcion_larga',
            'type' => 'wysiwyg',
            'instructions' => 'Descripción completa del producto',
            'required' => 0,
        ),

        array(
            'key' => 'field_imagen_producto',
            'label' => 'Imagen del producto',
            'name' => 'imagen_producto',
            'type' => 'image',
            'instructions' => 'Subí la imagen del producto',
            'return_format' => 'url',
            'preview_size' => 'medium',
            'required' => 0,
        ),

        array(
            'key' => 'field_stock_producto',
            'label' => 'Stock disponible',
            'name' => 'stock_producto',
            'type' => 'number',
            'instructions' => 'Ej: 10',
            'required' => 0,
        ),
        array(
            'key' => 'field_url_pedido_producto',
            'label' => 'Botón de Referencia/Pedido',
            'name' => 'link_ref_producto', // Cambiado el 'name' para reflejar que ahora es un enlace (opcional)
            'type' => 'link', // ⬅️ ¡Este es el cambio clave!
            'instructions' => 'Define el texto del botón, la URL (WhatsApp, formulario, tienda, etc.) y si se abre en una nueva pestaña.',
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post', // 👈 se asigna a las Entradas (posts)
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => 1,
    'description' => 'Campos básicos para cargar productos de pastelería en entradas',
));

endif;
?>