<?php 
$banner_repuestos = array(
  'icono'   => get_field('icono', 'option'),
  'imagen'  => get_field('imagen', 'option'),
  'titulo'  => get_field('titulo', 'option'),
);
?>

<!-- test @borrar -->
<style type="text/css">
  .banner-repuestos_mobile, .banner-repuestos {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/Regillablue.png');
  }
</style>

<!-- VERSIÓN DESKTOP -->
<div class="container banner-repuestos my-5 d-none d-sm-block">
  <div class="card mb-3">
    <div class="row g-0 align-items-center">
      <div class="col-md-6">
        <div class="card-body">
          <div class="logo-text">
            <?php if (!empty($banner_repuestos['icono'])): ?>
              <img src="<?php echo esc_url($banner_repuestos['icono']['url']); ?>" alt="<?php echo esc_attr($banner_repuestos['titulo']); ?>">
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-agro.png">
            <?php endif; ?>
          </div>
          <h1><?php echo esc_html($banner_repuestos['titulo']); ?></h1>
        </div>
      </div>
      <div class="col-md-6 image-col">
        <?php if (!empty($banner_repuestos['imagen'])): ?>
          <img src="<?php echo esc_url($banner_repuestos['imagen']['url']); ?>" alt="<?php echo esc_attr($banner_repuestos['titulo']); ?>">
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- VERSIÓN MOBILE -->
<div class="container banner-repuestos_mobile d-block d-sm-none">
  <div class="logo-text">
    <?php if (!empty($banner_repuestos['icono'])): ?>
      <img src="<?php echo esc_url($banner_repuestos['icono']['url']); ?>" alt="<?php echo esc_attr($banner_repuestos['titulo']); ?>">
    <?php endif; ?>
  </div>
  <h1><?php echo esc_html($banner_repuestos['titulo']); ?></h1>
  <div class="image-col">
    <?php if (!empty($banner_repuestos['imagen'])): ?>
      <img src="<?php echo esc_url($banner_repuestos['imagen']['url']); ?>" alt="<?php echo esc_attr($banner_repuestos['titulo']); ?>">
    <?php endif; ?>
  </div>
</div>