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

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

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

    <header class="page-header page-header-sitebrand-topbar">
        <?php if (has_nav_menu('primary') || is_active_sidebar('navbar-right')) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark" style="padding: 1.5rem 1rem;">
                <div class="container-fluid d-flex align-items-center justify-content-between">

                    <!-- Logo -->
                    <?php $logo = get_template_directory_uri() . '/assets/img/logo-blanco.png'; ?>
                    <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url(home_url('/')); ?>" style="width: 75% !important">
                        <img src="<?php echo esc_url($logo); ?>" alt="Taraborelli Agro" class="img-fluid">
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
                            'menu_class'     => 'navbar-nav',
                            'walker'         => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu(),
                        ]);
                        ?>
                    </div>

                    <!-- Buscador + íconos -->
                    <div class="d-none d-lg-flex align-items-center">
                        <form class="form-inline search-bar">
                            <input class="form-control search-input" type="search" placeholder="Buscar" aria-label="Buscar">
                        </form>

                        <ul class="navbar-nav ml-lg-3">
                            <?php
                            // Obtener el link de sucursal de Configuración del sitio - header
                            $sucursal_link_header = get_field('sucursal_link', 'option');

                            if (!empty($sucursal_link_header) && !empty($sucursal_link_header['url'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo esc_url($sucursal_link_header['url']); ?>"
                                        <?php if (!empty($sucursal_link_header['target'])) : ?>
                                        target="<?php echo esc_attr($sucursal_link_header['target']); ?>"
                                        <?php endif; ?>>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-location.png'); ?>" alt="Sucursales">
                                        <?php echo esc_html($sucursal_link_header['title'] ?: 'Sucursales'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php
                            // Obtener datos de WA de Configuración del sitio - header
                            $wa_number_header  = get_field('field_whatsapp_number', 'option');
                            $wa_message_header = get_field('field_whatsapp_message', 'option');

                            if (!empty($wa_number_header)) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://wa.me/<?php echo esc_attr($wa_number_header); ?>?text=<?php echo urlencode($wa_message_header); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-whatsapp.png" alt="WhatsApp">
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