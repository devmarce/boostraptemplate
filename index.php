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

<?php include(get_template_directory() . "/template-parts/parts-homepage/homepage-cards-formas-pago.php"); ?>



  <!-- Banner -->
  <div class="jumbotron jumbotron-fluid text-center bg-lila text-white mb-0">
    <div class="container">
      <h1 class="display-4 f-dulcing">Catering para Eventos Especiales</h1>
      <p class="lead f-serius mb-5">"Eleve el estándar de sus reuniones y eventos empresariales con nuestra propuesta de catering dulce. Ofrecemos soluciones integrales de pastelería que combinan estética profesional y sabores equilibrados. Diseñamos menús adaptados a coffee breaks, lanzamientos de marca y cenas de gala, asegurando una logística impecable y una presentación que refuerza la imagen de excelencia de su empresa."</p>
      <?php
      $wa_numero  = get_field('whatsapp_delicias', 'options');
      whatsapp_btn($wa_numero, '');
      ?>
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

