<?php

/**
 * The main template file.
 * 
 * To override home page (for listing latest post) add home.php into the theme.<br>
 * If front page displays is set to static, the index.php file will be use.<br>
 * If front-page.php exists, it will be override any home page file such as home.php, index.php.<br>
 * To learn more please go to https://developer.wordpress.org/themes/basics/template-hierarchy/ .
 * 
 * @package bootstrap-basic4
 */
// begins template. -------------------------------------------------------------------------
get_header();
?>

<?php

include(get_template_directory() . "/template-parts/parts-homepage/homepage-carrusel-productos.php");
//include(get_template_directory() . "/template-parts/parts-homepage/homepage-slider.php");?>


<section class="container my-4" aria-label="Información de pagos y consultas">
  <div class="row">
    <?php if( have_rows('formas_pago_consulta', 'option') ): ?>
      <?php while( have_rows('formas_pago_consulta', 'option') ): the_row(); 
        $icono      = get_sub_field('icono');
        $titulo     = get_sub_field('titulo');
        $descripcion= get_sub_field('descripcion');
        $resaltado  = get_sub_field('resaltado');
        $slug       = sanitize_title($titulo);
      ?>
      <div class="col-md-6 col-lg-4 mb-3">
        <article class="border rounded p-3 d-grid" role="group" aria-labelledby="<?php echo esc_attr($slug); ?>" style="height: 100%;">
          <div class="d-inline-flex align-items-center justify-content-center rounded" style="width:48px;height:48px;font-size:1.35rem;">
            <?php echo esc_html($icono); ?>
          </div>
          <h3 id="<?php echo esc_attr($slug); ?>" class="h6 text-uppercase mt-2 mb-1">
            <?php echo esc_html($titulo); ?>
          </h3>
          <p class="mb-0 text-muted">
            <?php echo esc_html($descripcion); ?>
            <?php if ($resaltado): ?>
              <strong class="text-dark"><?php echo esc_html($resaltado); ?></strong>
            <?php endif; ?>
          </p>
        </article>
      </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>


  <!-- Banner -->
  <div class="jumbotron jumbotron-fluid text-center bg-primary text-white mb-0">
    <div class="container">
      <h1 class="display-4 f-dulcing">Catering para Eventos Especiales</h1>
      <p class="lead f-serius">Este es un banner con Bootstrap 4, ideal para destacar contenido.</p>
      <a href="#servicios" class="btn btn-light btn-lg">Ver más</a>
    </div>
  </div>

  <?php $img_envios = get_template_directory_uri() . '/assets/img/marca/envios.jpg'; ?>
  <style>
  .banner {
    background: url('<?php echo $img_envios; ?>') center center/cover no-repeat;
    color: white;
    padding: 120px 20px;
  }
</style>

<div class="banner text-center">
  <h1 class="display-4">Tu Banner con Imagen</h1>
  <p class="lead">Texto destacado sobre la imagen.</p>
  <a href="#contacto" class="btn btn-primary btn-lg">Contáctanos</a>
</div>


<?php
get_footer();

?>

