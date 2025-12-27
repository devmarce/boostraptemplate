<?php
$mostrar = get_field('visible_banner_home', 'option');
$titulo = get_field('banner_titulo', 'option');
$texto  = get_field('banner_texto', 'option');
$boton_texto = get_field('banner_boton_texto', 'option');
$boton_url   = get_field('banner_boton_url', 'option');
$imagen      = get_field('banner_imagen', 'option');
?>

<?php if ($mostrar): ?>

  <style type="text/css">
  .title_bananer {
      color: #00d6fb;
      font-weight: bolder;
      background: #0012ff30; 
  }   
  </style>


  <div class="banner text-center"
    style="background-image: url('<?php echo esc_url($imagen['url']); ?>'); 
              background-size: cover;
              background-position: center; 
              padding: 100px 100px; 
              color: #fff;">

    <?php if ($titulo): ?>
      <h1 class="display-4 f-dulcing title_bananer"><?php echo esc_html($titulo); ?></h1>
    <?php endif; ?>

    <?php if ($texto): ?>
      <p class="lead f-normal"><?php echo esc_html($texto); ?></p>
    <?php endif; ?>

    <?php if ($boton_texto && $boton_url): ?>
      <a href="<?php echo esc_url($boton_url); ?>" target="_blank"
        class="btn btn-primary btn-lg">
        <?php echo esc_html($boton_texto); ?>
      </a>
    <?php endif; ?>
  </div>

<?php endif; ?>