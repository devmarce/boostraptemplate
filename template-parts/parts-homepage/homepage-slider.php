<?php
/* Data Homepage - Slider */ 
$slider_home = get_field('slider_homepage', 'option');
?>

<!-- Slider Desktop -->
<div class="content slider-home d-none d-md-block">
  <div id="mainSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach ($slider_home as $i => $slide): ?>
        <li data-target="#mainSlider" data-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
      <?php endforeach; ?>
    </ol>

    <div class="carousel-inner">
      <?php foreach ($slider_home as $i => $slide): ?>
        <?php 
          $imagen = $slide['imagen']; 
          $titulo = $slide['titulo'];
          $descripcion = $slide['descripcion'];
          $boton = $slide['boton_link'];
        ?>
        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
          <?php if (!empty($imagen)): ?>
            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>">
          <?php endif; ?>
          <div class="carousel-caption">
            <?php if (!empty($titulo)): ?>
              <h3><?php echo esc_html($titulo); ?></h3>
            <?php endif; ?>
            <?php if (!empty($descripcion)): ?>
              <p><?php echo esc_html($descripcion); ?></p>
            <?php endif; ?>
            <?php if (!empty($boton)): ?>
              <a href="<?php echo esc_url($boton['url']); ?>" target="<?php echo esc_attr($boton['target']); ?>" class="btn btn-bg-white">
                <?php echo esc_html($boton['title']); ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
</div>

<!-- Slider Mobile -->
<div class="content slider-home d-block d-md-none">
  <div id="mainSliderMobile" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach ($slider_home as $i => $slide): ?>
        <li data-target="#mainSliderMobile" data-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
      <?php endforeach; ?>
    </ol>

    <div class="carousel-inner">
      <?php foreach ($slider_home as $i => $slide): ?>
        <?php 
          $imagen_mobile = $slide['imagen_mobile']; 
          $titulo = $slide['titulo'];
          $descripcion = $slide['descripcion'];
          $boton = $slide['boton_link'];
        ?>
        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
          <?php if (!empty($imagen_mobile)): ?>
            <img src="<?php echo esc_url($imagen_mobile['url']); ?>" alt="<?php echo esc_attr($imagen_mobile['alt']); ?>">
          <?php else: ?>
            <?php if (!empty($slide['imagen'])): ?>
              <img src="<?php echo esc_url($slide['imagen']['url']); ?>" alt="<?php echo esc_attr($slide['imagen']['alt']); ?>">
            <?php endif; ?>
          <?php endif; ?>
          <div class="carousel-caption">
            <?php if (!empty($titulo)): ?>
              <h3><?php echo esc_html($titulo); ?></h3>
            <?php endif; ?>
            <?php if (!empty($descripcion)): ?>
              <p><?php echo esc_html($descripcion); ?></p>
            <?php endif; ?>
            <?php if (!empty($boton)): ?>
              <a href="<?php echo esc_url($boton['url']); ?>" target="<?php echo esc_attr($boton['target']); ?>" class="btn btn-bg-white">
                <?php echo esc_html($boton['title']); ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <a class="carousel-control-prev" href="#mainSliderMobile" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#mainSliderMobile" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
</div>
