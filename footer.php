<?php

/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>
</div><!--.site-content-->

<!-- test @borrar -->
<style type="text/css">
    /* Tamaño por defecto (mobile) */
    .logo-footer {
        max-width: 120px;
        /* ajusta según lo que necesites */
    }

    /* A partir de pantallas medianas (≥768px) */
    @media (min-width: 768px) {
        .logo-footer {
            max-width: 6rem;
        }
    }

    /* A partir de pantallas grandes (≥1200px) */
    @media (min-width: 1200px) {
        .logo-footer {
            max-width: 10rem;
        }
    }
</style>
<footer id="site-footer" class="text-white pt-5 pb-0" style="background: var(--color-primary); width: 100%;">
    <div class="container">
        <div class="row">
            <!-- Logos -->
            <div class="col-md-4 mb-4 mt-1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/marca/logo.png" alt="Dulcin Pasteleria" class="mb-2 logo-footer">
            </div>

            <?php
            $locations = get_nav_menu_locations();
            $menu_id = isset($locations['primary']) ? $locations['primary'] : false;

            if ($menu_id) {
                $menu_items = wp_get_nav_menu_items($menu_id);
                $parents = [];

                foreach ($menu_items as $item) {
                    if ($item->menu_item_parent == 0) {
                        $parents[$item->ID] = [
                            'title' => $item->title,
                            'url' => $item->url,
                            'children' => [],
                        ];
                    } else {
                        if (isset($parents[$item->menu_item_parent])) {
                            $parents[$item->menu_item_parent]['children'][] = [
                                'title' => $item->title,
                                'url' => $item->url,
                            ];
                        }
                    }
                }
            ?>
                <!-- Desktop footer layout -->
                <div class="menu-footer col-md-8 mb-5 pt-3 d-none d-sm-block">
                    <div class="row">
                        <?php foreach ($parents as $section): ?>
                            <div class="col-md-4 mb-3">
                                <details class="mb-3">
                                    <summary class="d-flex justify-content-around align-items-center font-weight-bold mb-2 h5 text-white">
                                        <span class="title-menu-footer"><?php echo esc_html($section['title']); ?></span>
                                        <span class="toggle-icon ml-2"></span>
                                    </summary>
                                    <ul class="ml-2 mt-2 pl-4">
                                        <?php foreach ($section['children'] as $child): ?>
                                            <li><a href="<?php echo esc_url($child['url']); ?>" class="text-white"><?php echo esc_html($child['title']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </details>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Mobile footer layout -->
                <div class="menu-footer-mobile col-md-8 mb-4 d-block d-sm-none">
                    <div class="row">
                        <?php foreach ($parents as $section): ?>
                            <div class="col-md-6 mb-3">
                                <details class="mb-3">
                                    <summary class="d-flex justify-content-between align-items-center font-weight-bold mb-2 h5 text-white">
                                        <span class="title-menu-footer"><?php echo esc_html($section['title']); ?></span>
                                        <span class="toggle-icon ml-2"></span>
                                    </summary>
                                    <ul class="mt-2">
                                        <?php foreach ($section['children'] as $child): ?>
                                            <li><a href="<?php echo esc_url($child['url']); ?>" class="text-white"><?php echo esc_html($child['title']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </details>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php
            } else {
                echo '<div class="col-md-8"><p class="text-white">Menú no asignado a la ubicación <code>primary</code>.</p></div>';
            }
            ?>
        </div>

        <!-- Legal Links -->
        <?php if (have_rows('footer_links', 'option')): ?>
            <div class="row py-3">
                <div class="col-md-12 text-center">
                    <ul class="list-inline mb-0 legal-links">
                        <?php
                        $links = get_field('footer_links', 'option');
                        $total = count($links);
                        $count = 0;

                        while (have_rows('footer_links', 'option')): the_row();
                            $link = get_sub_field('link');
                            if ($link):
                                $title  = esc_html($link['title']);
                                $url    = esc_url($link['url']);
                                $target = $link['target'] ? esc_attr($link['target']) : '_self';
                        ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="text-white">
                                        <?php echo $title; ?>
                                    </a>
                                </li>
                                <?php
                                $count++;
                                if ($count < $total): ?>
                                    <li class="list-inline-item separator">|</li>
                                <?php endif; ?>
                        <?php endif;
                        endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- barra black legales -->
    <div class="bg-black text-center">
        <p class="mt-3 mb-0 p-0">&copy; <?php echo date('Y'); ?> Dulcing Delicias Pastelería. Todos los derechos reservados.</p>
    </div>
    <div class="text-center">
        <p class="mt-0 mb-0 p-1 <?php echo responsive_device('desktop'); ?>" style="font-size: 0.8rem; background-color:#000; color:#fff;">
            Creado por
            <a href="https://landingweb.com.ar/" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color:#fff; align-items:center; gap:5px;">
                <span style="font-weight: 600; color: #8036a6; padding-left: 1rem;">Landing Web</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/marca/logo-negro-lw.jpg'); ?>" alt="Logo Landing Web" style="width:20px; height:auto;">
            </a>
            <span style="font-size:0.8rem; font-style:italic;">
                Creamos tu página ya! Contáctanos...
            </span>
            <a href="https://api.whatsapp.com/send/?phone=5491135003820&text=Hola+Landing%20Web%2C+queria+consultar+para+crear+mi+sitio+web...&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" style="font-size:0.8rem; color:#25D366;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/icon-whatsapp.png" alt="WhatsApp" style="width:18px; height:auto;">
                WhatsApp
            </a>
        </p>

        <p class="mt-0 mb-0 p-1 text-center <?php echo responsive_device('mobile'); ?>" style="background-color:#000; color:#fff;">
            <a href="https://landingweb.com.ar/" target="_blank" rel="noopener noreferrer" style="color:#fff;">
                Creado por <span style="font-weight: 600; color: #8036a6">Landing Web</span>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/marca/logo-negro-lw.jpg'); ?>" alt="Logo Landing Web" style="width:20px; height:auto;">
            </a>
        </p>
    </div>
</footer>
</div><!--.page-container-->

<!-- Toggle icon script -->
<script>
    const allDetails = document.querySelectorAll('details');

    allDetails.forEach(function(detail) {
        const icon = detail.querySelector('.toggle-icon');
        const title = detail.querySelector('.title-menu-footer');

        const updateState = () => {
            // cerrar los demás cuando se abre uno
            if (detail.open) {
                allDetails.forEach(function(other) {
                    if (other !== detail) {
                        other.open = false;
                        const otherTitle = other.querySelector('.title-menu-footer');
                        const otherIcon = other.querySelector('.toggle-icon');
                        if (otherTitle) {
                            otherTitle.style.borderBottom = 'none';
                            otherTitle.style.paddingBottom = '0';
                            otherTitle.style.color = 'white';
                        }
                        if (otherIcon) {
                            otherIcon.textContent = '▾';

                        }
                    }
                });
            }

            // actualizar el icono y estilo del actual
            icon.textContent = detail.open ? '▴' : '▾';
            if (detail.open) {
                title.style.borderBottom = '3px solid var(--color-secondary)';
                title.style.paddingBottom = '5px';
                title.style.color = 'white';
                icon.style.color = 'var(--color-secondary)';
            } else {
                title.style.borderBottom = 'none';
                title.style.paddingBottom = '0';
                title.style.color = 'white';
                icon.style.color = 'white';
            }
        };

        updateState();
        detail.addEventListener('toggle', updateState);
    });
</script>

<?php include(get_template_directory() . "/template-parts/forms-modales.php"); ?>
<!--WordPress footer-->
<?php wp_footer(); ?>
<!--end WordPress footer-->