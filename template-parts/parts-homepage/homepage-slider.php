<?php
/* Data Homepage - Slider */
$slider_home = get_field('slider_homepage', 'option');
$mostrar_slider_home = get_field('visible_slider_homepage', 'option');
?>

<?php if ($mostrar_slider_home) : ?>

  <style type="text/css">
    /* ‖‖‖‖‖‖‖‖‖‖‖‖‖‖‖ HOMEPAGE SLIDER ‖‖‖‖‖‖‖‖‖‖‖‖‖‖‖ */
    .slider-home #mainSlider .carousel-caption,
    .slider-home #mainSliderMobile .carousel-caption {
      right: 10%;
      left: auto;
      bottom: 35%;
      text-align: left;
      padding: 1rem;
      border-radius: 0.5rem;
      max-width: 20rem;
    }

    .slider-home #mainSlider .carousel-item img,
    .slider-home #mainSliderMobile .carousel-item img {
      width: 100%;
      max-height: 650px !important;
      object-fit: cover;
      object-position: top;
    }
    .slider-home #mainSlider .carousel-indicators,
    .slider-home #mainSliderMobile .carousel-indicators,
    .slider-home #mainSlider .carousel-caption h3,
    .slider-home #mainSliderMobile .carousel-caption h3 {
      margin-bottom: 1.5rem !important;
    }

    .slider-home #mainSlider .carousel-caption a,
    .slider-home #mainSliderMobile .carousel-caption a {
      font-weight: bold;
      margin-top: 1rem;
    }

    .slider-home #mainSlider .carousel-indicators li,
    .slider-home #mainSliderMobile .carousel-indicators li {
      width: 10px;
      height: 10px;
      border: 3px solid #D9D9D9;
      opacity: 1 !important;
      border-radius: 50%;
      background-color: transparent;
      margin: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .slider-home #mainSlider .carousel-indicators .active,
    .slider-home #mainSliderMobile .carousel-indicators .active {
      background-color: #D9D9D9;
      border-color: #D9D9D9;
    }

    /* Asegurar que las flechas estén visibles y clickeables */
    .slider-home #mainSliderMobile .carousel-control-prev,
    .slider-home #mainSliderMobile .carousel-control-next {
      z-index: 10;
      /* por encima de caption e imagen */
      width: 10%;
      /* área clickeable más grande */
    }

    .slider-home #mainSliderMobile .carousel-control-prev-icon,
    .slider-home #mainSliderMobile .carousel-control-next-icon {
      background-size: 100% 100%;
      outline: none;
    }

    @media (max-width: 767.98px) {
      .slider-home #mainSliderMobile .carousel-caption {
        right: 5%;
        left: 5%;
        top: 10%;
        text-align: center;
        padding: 1rem;
        border-radius: 0.5rem;
        max-width: 100%;
      }

      .slider-home #mainSliderMobile .carousel-caption h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
      }

      .slider-home #mainSliderMobile .carousel-caption p {
        font-size: 0.95rem;
        margin-bottom: 1rem;
      }

      .slider-home #mainSliderMobile .carousel-caption a {
        font-size: 0.9rem;
        font-weight: bold;
        margin-top: 0.5rem;
        padding: 0.5rem 1rem;
      }

      .slider-home #mainSliderMobile .carousel-item img {
      max-height: 600px !important;
      object-fit: cover;
      width: 100%;
      }

      .slider-home #mainSliderMobile .carousel-indicators {
        bottom: 10px;
        margin-bottom: 1rem !important;
      }

      .slider-home #mainSliderMobile .carousel-indicators li {
        width: 10px;
        height: 10px;
        border: 3px solid #D9D9D9;
        opacity: 1 !important;
        border-radius: 50%;
        background-color: transparent;
        margin: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease, border-color 0.3s ease;
      }

      .slider-home #mainSliderMobile .carousel-indicators .active {
        background-color: #D9D9D9;
        border-color: #D9D9D9;
      }
    }

    /* END: Slider homepage */
  </style>

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

<?php endif; ?>