<?php

/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- meta basic -->
    <!-- Título SEO -->
    <title>Dulcing | Pastelería artesanal casera en Buenos Aires</title>

    <!-- Meta descripción -->
    <meta name="description" content="Dulcing, pastelería artesanal casera de Ingrid Ruiz. Tortas, postres y dulces para fiestas, eventos y ventas por menor y mayor en Buenos Aires.">

    <!-- Palabras clave -->
    <meta name="keywords" content="pastelería artesanal, tortas caseras, postres para fiestas, dulces por encargo, repostería Buenos Aires, Ingrid Ruiz, Dulcing, pastelería por mayor, pastelería por menor, promos de pastelería, presupuestos tortas">

    <!-- Autor -->
    <meta name="author" content="Ingrid Ruiz - Dulcing.com.ar">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Open Graph básico -->
    <meta property="og:title" content="Dulcing | Pastelería artesanal casera en Buenos Aires">
    <meta property="og:description" content="Tortas y postres caseros elaborados por Ingrid Ruiz. Dulces para fiestas, catering, celebraciones y ventas por menor y mayor.">
    <meta property="og:url" content="https://www.dulcing.com.ar">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php 
        $og_image = get_field('og_image', 'option'); 
        if ($og_image) {
            echo esc_url($og_image['url']); 
        } else {
            echo get_template_directory_uri() . '/assets/img/marca/logo-dulcing.png';
        }
    ?>">

    <meta property="og:locale" content="es_AR">



    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <!--WordPress head-->
    <?php wp_head(); ?>
    <!--end WordPress head-->
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>

    <!-- test @borrar -->
    <style type="text/css">
        .page-header {
            margin-bottom: 0px !important;
        }

        /* Tamaño por defecto (mobile) */
        .logo-header {
            max-width: 120px;
            /* ajusta según lo que necesites */
        }

        /* A partir de pantallas medianas (≥768px) */
        @media (min-width: 768px) {
            .logo-header {
                max-width: 220px;
            }
        }

        /* A partir de pantallas grandes (≥1200px) */
        @media (min-width: 1200px) {
            .logo-header {
                max-width: 145px;
            }
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgb(251 251 251) !important;
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: rgb(65 0 149) !important;
        }
    </style>
    <header class="page-header page-header-sitebrand-topbar bg-header">
        <?php if (has_nav_menu('primary') || is_active_sidebar('navbar-right')) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid d-flex align-items-center justify-content-between">


                    <?php $logo = get_template_directory_uri() . '/assets/img/marca/logo.png'; ?>

                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo); ?>" alt="Dulcing"
                            class="img-fluid logo-header">
                    </a>


                    <!-- Botón responsive ▤ -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
                        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Menú wp principal -->
                    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'depth'          => 2,
                            'container'      => false,
                            'menu_class'     => 'navbar-nav f-serius',
                            'walker'         => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu(),
                        ]);
                        ?>
                    </div>

                    <!-- Buscador + íconos -->
                    <div class="d-lg-flex align-items-center d-none d-sm-flex">
                        <ul class="navbar-nav ml-lg-3">
                            <?php
                            // Obtener el link de sucursal de Configuración del sitio - header
                            $link_especial = get_field('link_especial', 'option');

                            if (!empty($link_especial) && !empty($link_especial['url'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo esc_url($link_especial['url']); ?>"
                                        <?php if (!empty($link_especial['target'])) : ?>
                                        target="<?php echo esc_attr($link_especial['target']); ?>"
                                        <?php endif; ?>>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/icon-tag.png'); ?>" alt="ir a" style="width: 20%;">
                                        <?php echo esc_html($link_especial['title'] ?: 'Sucursales'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php
                            // Obtener datos de WA de Configuración del sitio - header
                            $wa_number_header  = get_field('field_whatsapp_number', 'option');
                            $wa_message_header = get_field('field_whatsapp_message', 'option');

                            if (!empty($wa_number_header)) : ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="https://wa.me/<?php echo esc_attr($wa_number_header); ?>?text=<?php echo rawurlencode($wa_message_header); ?>"
                                        rel="noopener noreferrer" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/icon-whatsapp.png" alt="WhatsApp">
                                        WhatsApp
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </nav>
        <?php } ?>
    </header>


    <div class="content">