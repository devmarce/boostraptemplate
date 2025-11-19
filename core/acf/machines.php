<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_machines_datos',
        'title' => 'Datos del vehículo',
        'fields' => array(
            array(
                'key' => 'field_marca',
                'label' => 'Marca',
                'name' => 'marca',
                'type' => 'select',
                'choices' => array(
                    'new-holland' => 'New Holland',
                    'mercedes-benz' => 'Mercedes-Benz',
                    'ford'          => 'Ford',
                    'new-holland'   => 'New Holland',
                    'wirtgen'       => 'Wirtgen',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
            ),
            array(
                'key' => 'ficategoria',
                'label' => 'Categoria',
                'name' => 'categoria',
                'type' => 'select',
                'choices' => array(
                    'tractores'         => 'Tractores',
                    'pulverizadores'    => 'Pulverizadores',
                    'cosechadores'      => 'Cosechadores',
                    'segadoras'         => 'Segadoras',
                    'usados'            => 'Usados',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
            ),
            array(
                'key' => 'field_modelo',
                'label' => 'Modelo',
                'name' => 'modelo',
                'type' => 'text',
            ),
            /*array(
                'key' => 'field_capacidad',
                'label' => 'Capacidad de carga',
                'name' => 'capacidad',
                'type' => 'text',
            ),
            array(
                'key' => 'field_carroceria',
                'label' => 'Tipo de carrocería',
                'name' => 'carroceria',
                'type' => 'text',
            ),
            array(
                'key' => 'field_dimensiones',
                'label' => 'Dimensiones útiles',
                'name' => 'dimensiones',
                'type' => 'text',
            ),
            array(
                'key' => 'field_potencia',
                'label' => 'Potencia del motor',
                'name' => 'potencia',
                'type' => 'text',
            ),*/
            array(
                'key' => 'field_combustible',
                'label' => 'Combustible',
                'name' => 'combustible',
                'type' => 'select',
                'choices' => array(
                    'nafta'     => 'Nafta',
                    'diesel'    => 'Diésel',
                    //'electrico' => 'Eléctrico',
                    'hibrido'   => 'Híbrido',
                ),
                'allow_null' => 1,
                'ui' => 1,
            ),
            /*array(
                'key' => 'field_rendimiento',
                'label' => 'Rendimiento',
                'name' => 'rendimiento',
                'type' => 'text',
            ),
            array(
                'key' => 'field_traccion',
                'label' => 'Tipo de tracción',
                'name' => 'traccion',
                'type' => 'select',
                'choices' => array(
                    '4x2' => '4x2',
                    '4x4' => '4x4',
                    '6x4' => '6x4',
                ),
                'allow_null' => 1,
                'ui' => 1,
                ),*/
            array(
                'key' => 'field_anio',
                'label' => 'Año',
                'name' => 'anio',
                'type' => 'number',
                'min' => 1990,
                'max' => 2099,
            ),
            array(
                'key' => 'field_imagen',
                'label' => 'Imagen del vehículo',
                'name' => 'imagen',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_enlace_cotizar',
                'label' => 'Enlace para cotizar',
                'name' => 'enlace_cotizar',
                'type' => 'url',
            ),
            array(
                'key' => 'field_enlace_solicitar',
                'label' => 'Enlace para solicitar cotización',
                'name' => 'enlace_solicitar',
                'type' => 'text',
            ),
        ),
    'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'machines',
      ),
    ),
  ),
));


endif;
