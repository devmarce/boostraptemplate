<?php

/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>
</div><!--.site-content-->


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

            <?php include(get_template_directory() . '/template-parts/parts-footer/footer-logo.php'); ?>

            <?php include(get_template_directory() . '/template-parts/parts-footer/footer-menu.php'); ?>

        </div><!-- }row -->

        <?php include(get_template_directory() . '/template-parts/parts-footer/footer-links.php'); ?>

    </div><!-- }container -->

    <?php include(get_template_directory() . '/template-parts/content-redes.php'); ?>
    
    <?php include(get_template_directory() . '/template-parts/parts-footer/footer-legales.php'); ?>
    
    <?php include(get_template_directory() . '/template-parts/parts-footer/footer-create-by.php'); ?>

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