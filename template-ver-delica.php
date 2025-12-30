<?php

/**
 * Template Name: Ver Delicia
 * Description: Muestra un producto de pastelería según el ID recibido por GET (?id=123)
 */

get_header();

//https://www.w3schools.com/css/tryit.asp?filename=trycss_image_modal_js

// Si no hay ID, avisamos
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$id = $id ?: 0;

if ($id <= 0) {
  wp_redirect(home_url('/delicias_pasteleria/'));
  exit;
}

// Obtenemos el post
$post = get_post($id);

if (!$post || $post->post_type !== 'delicias_pasteleria') {
  echo "<div class='container'><h2>🚫 La delicia no existe.</h2></div>";
  get_footer();
  return;
}

// Datos ACF (sanitizados)
$nombre                 = get_field('nombre', $id);
$descripcion            = get_field('descripcion', $id);
$descripcion_corta      = get_field('descripcion_corta', $id);
$estado                 = get_field('estado', $id);
$categoria              = get_field('categoria', $id);
$precio_real            = floatval(get_field('precio', $id));
$precio_temporal        = floatval(get_field('precio_temporal', $id));
$precio_temporal_hasta  = get_field('precio_temporal_hasta', $id);
$descuento              = intval(get_field('descuento', $id));
$stock                  = intval(get_field('stock', $id));
$unidad                 = get_field('unidad', $id);
$promo                  = get_field('promo', $id);
$modal_form             = get_field('modal_form', $id);
$enlace_solicitar       = get_field('enlace_solicitar', $id);
$hot_sale               = get_field('hot_sale', $id);

// Imagen principal
$imagen_principal = get_field('imagen', $id);
$imagen_url = ($imagen_principal && isset($imagen_principal['url']))
  ? $imagen_principal['url']
  : get_stylesheet_directory_uri() . '/assets/img/default.png';

// Galería
$galeria = get_field('galeria', $id);

// WhatsApp desde opciones
$wa_delicias = get_field('whatsapp_delicias', 'option');
?>

<style>
  .ver-delicia {
    margin-top: 40px;
    margin-bottom: 60px;
    font-family: 'Segoe UI', Roboto, sans-serif;
    color: #333;
  }

  .ver-delicia h1 {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #fd04c7;
    text-align: center;
  }

  .ver-delicia h2 {
    font-size: 1.6rem;
    margin-top: 40px;
    margin-bottom: 20px;
    border-bottom: 2px solid #eee;
    padding-bottom: 5px;
    color: #444;
  }

  .badge {
    display: inline-block;
    padding: 6px 12px;
    font-size: 0.9rem;
    border-radius: 20px;
    margin: 0 5px;
  }

  .badge-success {
    background-color: #ae10ff;
    color: #fff;
  }

  .badge-danger {
    background-color: #dc3545;
    color: #fff;
  }

  .delicia-info {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 25px;
  }

  .delicia-imagen {
    flex: 1 1 300px;
    text-align: center;
  }

  .delicia-imagen img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .delicia-detalles {
    border: 1px solid #ef00ff;
    flex: 1 1 300px;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  }

  .delicia-detalles p {
    margin-bottom: 10px;
    font-size: 1rem;
  }

  .delicia-detalles strong {
    color: #555;
  }

  .btn {
    display: inline-block;
    margin-top: 10px;
    margin-right: 8px;
    padding: 10px 18px;
    font-size: 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn-primary {
    background-color: #b23c3c;
    color: #fff;
    border: none;
  }

  .btn-primary:hover {
    background-color: #922d2d;
    transform: translateY(-2px);
  }

  .btn-secondary {
    background-color: #ccc;
    color: #666;
    border: none;
  }

  .btn-whatsapp {
    background-color: #25D366;
    color: #fff;
    border: none;
  }

  .btn-whatsapp:hover {
    background-color: #1ebe5d;
    transform: translateY(-2px);
  }

  .galeria {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 15px;
    margin-top: 20px;
  }

  .galeria-item {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .galeria-item:hover {
    transform: scale(1.05);
  }

  .contador-oferta {
    margin-top: 10px;
    font-size: 1rem;
    font-weight: bold;
    color: #ae10ff;
  }

  .contador-oferta .expirado {
    color: #dc3545;
  }

  .contador-oferta {
    margin-top: 10px;
    font-size: 1rem;
    font-weight: bold;
    color: #ae10ff;
  }

  .contador-oferta .expirado {
    color: #dc3545;
  }
</style>

<div class="container ver-delicia">

  <h1 class="f-dulcing"><?php echo esc_html($nombre); ?></h1>

  <?php if ($promo): ?>
    <span class="badge badge-success my-1"><?php echo esc_html($promo); ?></span>
  <?php endif; ?>

  <?php if ($hot_sale): ?>
    <span class="badge badge-danger my-1">🔥 Hot Sale</span>
  <?php endif; ?>

  <div class="delicia-info">

    <div class="delicia-imagen">
      <img src="<?php echo esc_url($imagen_url); ?>" alt="<?php echo esc_attr($nombre); ?>">
    </div>

    <div class="delicia-detalles f-normal">
      <p class="f-serius"><?php echo esc_html($descripcion_corta); ?></p>
      <hr>
      <p><strong>Estado:</strong> <?php echo esc_html($estado); ?></p>
      <p><strong>Categoría:</strong> <?php echo esc_html($categoria); ?></p>

      <?php if ($precio_temporal > 0 && !empty($precio_temporal_hasta)): ?>
        <p><strong>Precio:</strong> <del>$<?php echo number_format($precio_real, 2); ?></del></p>
        <p><strong>Precio oferta:</strong> <span class="precio-oferta">$<?php echo number_format($precio_temporal, 2); ?></span></p>
        <p><strong>Vigencia:</strong> hasta <?php echo date_i18n('d/m/Y', strtotime($precio_temporal_hasta)); ?></p>
        <div id="contador-<?php echo esc_attr($id); ?>" class="contador-oferta"></div>
      <?php else: ?>
        <p><strong>Precio:</strong> $<?php echo number_format($precio, 2); ?></p>
      <?php endif; ?>

      <?php if ($descuento > 0): ?>
        <p><strong>Descuento:</strong> <?php echo $descuento; ?>%</p>
      <?php endif; ?>

      <p><strong>Stock disponible:</strong> <?php echo $stock; ?> (<?php echo esc_html($unidad); ?>)</p>

      <hr>

      <!-- Botones de acción -->
      <?php if ($modal_form): ?>
        <a
          href="<?php echo !empty($enlace_solicitar) ? esc_url($enlace_solicitar) : '#'; ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="btn btn-primary-form <?php echo !empty($modal_form) ? 'js-cotizar-delicia' : ''; ?>"
          data-model-id="<?php echo esc_attr($id); ?>"
          data-model-name="<?php echo esc_attr($nombre); ?>"
          data-model-category="<?php echo esc_attr($categoria); ?>">
          Encargar
        </a>
      <?php endif; ?>

      <!-- btn whatsapp -->
      <?php echo whatsapp_delicias(esc_attr($nombre), $wa_delicias); ?>
    </div>
  </div>

  <h2 class="f-dulcing color-primary">Conocé más</h2>
  <div class="f-normal"><?php echo wp_kses_post($descripcion); ?></div>

  <h2 class="f-dulcing color-primary">Galería</h2>
  <div class="galeria">
    <?php
    if ($galeria && is_array($galeria)):
      foreach ($galeria as $img):
        if (!empty($img['url'])): ?>
          <img src="<?php echo esc_url($img['url']); ?>" class="galeria-item" alt="<?php echo esc_attr($nombre); ?>">
    <?php endif;
      endforeach;
    endif;
    ?>
  </div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const contador = document.getElementById("contador-<?php echo esc_attr($id); ?>");

  // Si no hay precio temporal no ejecutamos nada
  if (!contador) return;

  // Elementos de precios dentro del bloque actual
  const precioReal   = contador.closest(".delicia-detalles").querySelector("del");
  const precioOferta = contador.closest(".delicia-detalles").querySelector(".precio-oferta");

  // Fecha límite desde PHP
  const fechaLimite = new Date("<?php echo esc_js($precio_temporal_hasta); ?>T23:59:59").getTime();

  function actualizar() {
    const ahora = new Date().getTime();
    const diff = fechaLimite - ahora;

    /* =====================================================
       ❌ OFERTA EXPIRADA
    ===================================================== */
    if (diff <= 0) {

      // Mensaje
      contador.innerHTML = "<span class='expirado'>⏰ Oferta expirada</span>";

      // Precio real → sin tachar
      if (precioReal) precioReal.style.textDecoration = "none";

      // Precio oferta → rojo y tachado
      if (precioOferta) {
        precioOferta.style.textDecoration = "line-through";
        precioOferta.style.color = "red";
      }

      return;
    }

    /* =====================================================
       ✔ OFERTA VIGENTE
    ===================================================== */
    if (precioReal) precioReal.style.textDecoration = "line-through";

    if (precioOferta) {
      precioOferta.style.textDecoration = "none";
      precioOferta.style.color = "#ae10ff";
      precioOferta.style.fontWeight = "bolder";
    }

    // Cálculo de tiempo restante
    const dias = Math.floor(diff / (1000 * 60 * 60 * 24));
    const horas = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((diff % (1000 * 60)) / 1000);

    contador.innerHTML = `❤️‍🔥 Quedan <strong>${dias}d ${horas}h ${minutos}m ${segundos}s</strong>`;
  }

  actualizar();
  setInterval(actualizar, 1000);
});
</script>


<?php get_footer(); ?>