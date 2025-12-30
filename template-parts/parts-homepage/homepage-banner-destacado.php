<?php
$mostrar = get_field('visible_banner_home', 'option');
$titulo = get_field('banner_titulo', 'option');
$texto  = get_field('banner_texto', 'option');
$boton_texto = get_field('banner_boton_texto', 'option');
$boton_url   = get_field('banner_boton_url', 'option');

if (wp_is_mobile()) {
$imagen = get_field('banner_imagen_mobile', 'option');
} else {
  $imagen  = get_field('banner_imagen', 'option');
}
?>

<?php if ($mostrar): ?>

  <style type="text/css">
    .banner .lead, 
    .banner .title_bananer {
      color: white;
      background: #ffbe003d;
    }
    .bg-hover-dorado:hover {
      background: #f100ff8c;
    }
  </style>


  <div id="component-banner-destacado" class="banner text-center"
    style="background-image: url('<?php echo esc_url($imagen['url']); ?>');">

    <div class="bg-hover-dorado">
    <?php if ($titulo): ?>
      <h2 class="display-4 f-dulcing title_bananer mb-0"><?php echo esc_html($titulo); ?></h2>
    <?php endif; ?>

    <?php if ($texto): ?>
      <p class="lead f-normal pb-4"><?php echo esc_html($texto); ?></p>
    <?php endif; ?>
    </div>

    <?php if ($boton_texto && $boton_url): ?>
      <a href="<?php echo esc_url($boton_url); ?>" target="_blank"
        class="btn btn-primary btn-lg mt-5">
        <?php echo esc_html($boton_texto); ?>
      </a>
    <?php endif; ?>
  </div>

<?php endif; ?>