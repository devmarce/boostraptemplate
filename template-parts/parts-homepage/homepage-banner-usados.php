<?php
$banner_usados = array(
  'titulo' => get_field('titulo_sados', 'option'),
  'imagen_principal' => get_field('imagen_principal', 'option'),
  'bloques' => get_field('bloques', 'option'),
);
?>

<!-- Versión desktop -->
<section class="usados-banner py-5 d-none d-sm-block">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 text-center mb-4 mb-md-0">
        <?php if (!empty($banner_usados['imagen_principal'])): ?>
          <img src="<?php echo esc_url($banner_usados['imagen_principal']['url']); ?>" alt="Taraborelli maquinaria" class="img-fluid left-image">
        <?php endif; ?>
      </div>
      <div class="col-md-8 text-center">
        <h2 class="mb-4 font-weight-bold"><?php echo esc_html($banner_usados['titulo']); ?></h2>
        <div class="row justify-content-center">
          <?php if (!empty($banner_usados['bloques'])): ?>
            <?php foreach ($banner_usados['bloques'] as $bloque): ?>
              <div class="col-md-6 mb-4">
                <?php if (!empty($bloque['icono'])): ?>
                  <img src="<?php echo esc_url($bloque['icono']['url']); ?>" alt="<?php echo esc_attr($bloque['titulo']); ?>" class="mb-3 img-fluid" style="max-height: 80px;">
                <?php endif; ?>
                <h5 class="font-weight-bold"><?php echo esc_html($bloque['titulo']); ?></h5>
                <?php if (!empty($bloque['href'])): ?>
                  <a href="<?php echo esc_url($bloque['href']['url']); ?>" class="btn btn-block-custom<?php echo strtolower($bloque['titulo']) === 'servicios' ? ' btn-service' : ' btn-usados text-white'; ?>">
                    <?php echo esc_html($bloque['href']['title']); ?>
                  </a>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Versión mobile -->
<section class="usados-banner-mobile py-5 d-block d-sm-none">
  <div class="container text-center">
    <?php if (!empty($banner_usados['imagen_principal'])): ?>
      <img src="<?php echo esc_url($banner_usados['imagen_principal']['url']); ?>" alt="Taraborelli maquinaria" class="img-fluid left-image mb-4">
    <?php endif; ?>
    <h2 class="mb-4 font-weight-bold"><?php echo esc_html($banner_usados['titulo']); ?></h2>

    <?php if (!empty($banner_usados['bloques'])): ?>
      <?php foreach ($banner_usados['bloques'] as $index => $bloque): ?>
        <div class="<?php echo $index === 0 ? 'mb-5' : ''; ?>">
          <?php if (!empty($bloque['icono'])): ?>
            <img src="<?php echo esc_url($bloque['icono']['url']); ?>" alt="<?php echo esc_attr($bloque['titulo']); ?>" class="mb-3 img-fluid" style="max-height: 80px;">
          <?php endif; ?>
          <h5 class="font-weight-bold"><?php echo esc_html($bloque['titulo']); ?></h5>
          <?php if (!empty($bloque['href'])): ?>
            <a href="<?php echo esc_url($bloque['href']['url']); ?>" class="btn btn-block-custom mt-3 <?php echo strtolower($bloque['titulo']) === 'servicios' ? ' btn-service' : ' btn-usados text-white'; ?>">
              <?php echo esc_html($bloque['href']['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>