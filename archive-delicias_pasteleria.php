<?php

/**
 * Template dinámico con tabs por categoría + pestaña "Todos los productos".
 *
 * @package bootstrap-basic4
 */

get_header();

// Obtenemos los productos agrupados
$productos_grouped = get_pasteleria_grouped_by_category();
?>

<style type="text/css">
  /* ===== Tabs ===== */
  #tabs .nav-tabs {
    border-bottom: 2px solid #f8cdda;
  }

  #tabs .nav-tabs .nav-link {
    border: none;
    color: #555;
    font-weight: 600;
    padding: 12px 20px;
    transition: all 0.3s ease;
  }

  #tabs .nav-tabs .nav-link:hover {
    color: #d63384;
  }

  #tabs .nav-tabs .nav-link.active {
    background-color: #f8cdda;
    color: #fff;
    border-radius: 5px 5px 0 0;
  }

  /* ===== Zócalo categoría ===== */
  .zocalo-category {
    background: var(--color-primary);
    background-repeat: round !important;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 25px;
    margin-bottom: 20px;
    border-radius: 8px;
  }

  .title-categoria {
    color: #ff00d4 !important;
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
  }

  /* ===== Tarjetas de producto ===== */
  .producto-wrapper {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .producto-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
  }

  .producto-wrapper .card-img-top {
    height: 220px;
    object-fit: cover;
    border-bottom: 1px solid #eee;
  }

  .producto-wrapper .card-body {
    padding: 15px;
  }

  .producto-wrapper .card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
  }

  /* ===== Badges y precios ===== */
  .badge-warning {
    background-color: #ff07bdff;
    color: #fff;
    font-size: 0.85rem;
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    display: inline-block;
  }

  .card-text {
    font-size: 0.95rem;
    color: #555;
  }

  .title-prod-category {
    background: #0a050591;
    padding: 0.5rem;
    border-radius: 0.5rem;
    border: 1px #fff solid;
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

  /* ===== Responsive ===== */
  @media (max-width: 767px) {
    .zocalo-category {
      flex-direction: column;
      text-align: center;
    }

    .zocalo-category img {
      margin-top: 10px;
    }
  }
</style>

<div class="container-fluid productos-post-container mt-3">
  <div class="row no-gutters">
    <div class="col-12 text-center">
      <section id="tabs">
        <div class="content mx-2 mx-sm-4">
          <div class="row">
            <div class="col-12">

              <?php if (!empty($productos_grouped)) : ?>

                <!-- NAV TABS -->
                <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                    <!-- Pestaña TODOS -->
                    <a class="d-none nav-item nav-link active"
                      id="tab-todos-tab"
                      data-toggle="tab"
                      href="#tab-todos"
                      role="tab"
                      aria-selected="true">Todos</a>

                    <?php foreach ($productos_grouped as $categoria => $items) : ?>
                      <?php $tab_id = 'tab-' . sanitize_title($categoria); ?>
                      <a class="nav-item nav-link"
                        id="<?php echo $tab_id; ?>-tab"
                        data-toggle="tab"
                        href="#<?php echo $tab_id; ?>"
                        role="tab">
                        <?php echo esc_html(ucfirst($categoria)); ?>
                      </a>
                    <?php endforeach; ?>

                  </div>
                </nav>

                <!-- TAB CONTENT -->
                <div class="tab-content py-3 px-2 px-sm-0" id="nav-tabContent">

                  <!-- ======================= -->
                  <!-- TAB TODOS LOS PRODUCTOS -->
                  <!-- ======================= -->

                  <div class="tab-pane fade show active"
                    id="tab-todos"
                    role="tabpanel"
                    aria-labelledby="tab-todos-tab">

                    <?php foreach ($productos_grouped as $categoria => $items) : ?>

                      <!-- Zócalo de categoría -->
                      <div class="zocalo-category"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/custom/category-back3.png');">
                        <div class="title-prod-category">
                          <h2 class="title-categoria text-white text-uppercase">
                            <?php echo esc_html(ucfirst($categoria)); ?>
                          </h2>
                        </div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/marca/logo dulcing.png" alt="Logo"></div>
                      </div>

                      <div class="row">

                        <?php foreach ($items as $item) : ?>
                          <?php
                          // Datos del producto
                          $id_producto = $item['id'];
                          $precio_real = floatval($item['precio'] ?? 0);
                          $precio_temporal = floatval($item['precio_temporal'] ?? 0);
                          $precio_temporal_hasta = $item['precio_temporal_hasta'] ?? '';
                          ?>

                          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 px-4">
                            <div class="card h-100 producto-wrapper bg-light">

                              <img class="card-img-top img-fluid"
                                src="<?php echo esc_url($item['imagen']); ?>"
                                alt="<?php echo esc_attr($item['nombre']); ?>">

                              <div class="card-body">

                                <h5 class="card-title"><?php echo esc_html($item['nombre']); ?></h5>

                                <?php if (!empty($item['tag_promo'])) : ?>
                                  <span class="badge badge-warning"><?php echo esc_html($item['tag_promo']); ?></span>
                                <?php endif; ?>

                                <!-- Precios -->
                                <div class="delicia-detalles">

                                  <?php if ($precio_temporal > 0 && !empty($precio_temporal_hasta)) : ?>

                                    <p><strong>Precio:</strong>
                                      <del class="precio-real">$<?php echo number_format($precio_real, 2); ?></del>
                                    </p>

                                    <p><strong>Precio oferta:</strong>
                                      <span class="precio-oferta">$<?php echo number_format($precio_temporal, 2); ?></span>
                                    </p>

                                    <p><strong>Vigencia:</strong> hasta
                                      <?php echo date_i18n('d/m/Y', strtotime($precio_temporal_hasta)); ?>
                                    </p>

                                    <div class="contador-oferta"
                                      id="contador-<?php echo $id_producto; ?>"
                                      data-fecha="<?php echo esc_attr($precio_temporal_hasta); ?>">
                                    </div>

                                  <?php else : ?>

                                    <p><strong>Precio:</strong> $<?php echo number_format($precio_real, 2); ?></p>

                                  <?php endif; ?>

                                  <!-- Descripción -->
                                  <?php if (!empty($item['descripcion_corta'])) : ?>
                                    <p class="card-text"><?php echo esc_html($item['descripcion_corta']); ?></p>
                                  <?php endif; ?>

                                  <!-- Botón ver delicia -->
                                  <a href="<?php echo esc_url(add_query_arg('id', $item['id'], home_url('/ver-delicia/'))); ?>"
                                    class="btn btn-primary mt-1">Ver Delicia</a>

                                  <!-- WhatsApp -->
                                  <?php
                                  $wa = get_field('whatsapp_delicias', 'option');
                                  echo whatsapp_delicias($item['nombre'], $wa);
                                  ?>

                                </div>

                              </div>
                            </div>
                          </div>

                        <?php endforeach; ?>

                      </div>

                    <?php endforeach; ?>

                  </div>

                  <!-- ======================= -->
                  <!-- TABS POR CATEGORÍA -->
                  <!-- ======================= -->

                  <?php foreach ($productos_grouped as $categoria => $items) : ?>
                    <?php $tab_id = 'tab-' . sanitize_title($categoria); ?>

                    <div class="tab-pane fade"
                      id="<?php echo $tab_id; ?>"
                      role="tabpanel"
                      aria-labelledby="<?php echo $tab_id; ?>-tab">

                      <!-- Zócalo -->
                      <div class="zocalo-category"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/custom/category-back3.png');">
                        <div class="title-prod-category">
                          <h2 class="title-categoria text-white text-uppercase">
                            <?php echo esc_html(ucfirst($categoria)); ?>
                          </h2>
                        </div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/marca/logo dulcing.png" alt="Logo"></div>
                      </div>

                      <div class="row">
                        <?php foreach ($items as $item) : ?>
                          <?php
                          $id_producto = $item['id'];
                          $precio_real = floatval($item['precio'] ?? 0);
                          $precio_temporal = floatval($item['precio_temporal'] ?? 0);
                          $precio_temporal_hasta = $item['precio_temporal_hasta'] ?? '';
                          ?>

                          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 px-4">
                            <div class="card h-100 producto-wrapper bg-light">

                              <img class="card-img-top img-fluid"
                                src="<?php echo esc_url($item['imagen']); ?>"
                                alt="<?php echo esc_attr($item['nombre']); ?>">

                              <div class="card-body">

                                <h5 class="card-title"><?php echo esc_html($item['nombre']); ?></h5>

                                <?php if (!empty($item['promo'])) : ?>
                                  <span class="badge badge-warning"><?php echo esc_html($item['promo']); ?></span>
                                <?php endif; ?>

                                <!-- Precios -->
                                <?php if ($precio_temporal > 0 && $precio_temporal_hasta) : ?>

                                  <p><del class="precio-real">$<?php echo number_format($precio_real, 2); ?></del></p>

                                  <p>
                                    <span class="precio-oferta">$<?php echo number_format($precio_temporal, 2); ?></span>
                                  </p>

                                  <div class="contador-oferta"
                                    id="contador-<?php echo $id_producto; ?>"
                                    data-fecha="<?php echo esc_attr($precio_temporal_hasta); ?>">
                                  </div>

                                <?php else : ?>

                                  <p>Precio: $<?php echo number_format($precio_real, 2); ?></p>

                                <?php endif; ?>

                                <?php if (!empty($item['descripcion_corta'])) : ?>
                                  <p class="card-text"><?php echo esc_html($item['descripcion_corta']); ?></p>
                                <?php endif; ?>

                                <!-- Botón ver delicia -->
                                <a href="<?php echo esc_url(add_query_arg('id', $item['id'], home_url('/ver-delicia/'))); ?>"
                                  class="btn btn-primary mt-1">Ver Delicia</a>

                                <?php
                                $wa = get_field('whatsapp_delicias', 'option');
                                echo whatsapp_delicias($item['nombre'], $wa);
                                ?>

                              </div>
                            </div>
                          </div>

                        <?php endforeach; ?>
                      </div>

                    </div>
                  <?php endforeach; ?>

                </div>

              <?php else : ?>
                <p>No hay productos disponibles en este momento.</p>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<!-- ======================= -->
<!-- JS UNIVERSAL PARA TODOS LOS CONTADORES -->
<!-- ======================= -->

<script>
  document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll(".contador-oferta").forEach(function(contador) {

      const precioReal = contador.closest(".delicia-detalles").querySelector("del.precio-real");
      const precioOferta = contador.closest(".delicia-detalles").querySelector(".precio-oferta");

      const fechaLimite = new Date(contador.dataset.fecha + "T23:59:59").getTime();

      function actualizar() {
        const ahora = new Date().getTime();
        const diff = fechaLimite - ahora;

        /* ============================================
          SI LA OFERTA EXPIRÓ
        ============================================ */
        if (diff <= 0) {

          // Mostrar texto de expirado
          contador.innerHTML = "<span class='expirado'>⏰ Oferta expirada</span>";

          // Restablecer precio REAL sin tachar
          if (precioReal) precioReal.style.textDecoration = "none";

          // Ocultar el precio oferta
          if (precioOferta) precioOferta.style.textDecoration = "line-through";
          if (precioOferta) precioOferta.style.color = "red";

          return;
        }

        /* ============================================
          SI LA OFERTA SIGUE VIGENTE
        ============================================ */
        // Precio real tachado
        if (precioReal) precioReal.style.textDecoration = "line-through";

        // Precio oferta normal (sin tachar)
        if (precioOferta) precioOferta.style.textDecoration = "none";
        if (precioOferta) precioOferta.style.color = "#ae10ff";
        if (precioOferta) precioOferta.style.fontWeight = "bolder";

        // Calcular tiempo restante
        const dias = Math.floor(diff / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const segundos = Math.floor((diff % (1000 * 60)) / 1000);

        contador.innerHTML = `❤️‍🔥 Quedan <strong>${dias}d ${horas}h ${minutos}m ${segundos}s</strong>`;
      }

      actualizar();
      setInterval(actualizar, 1000);
    });
  });
</script>

<?php get_footer(); ?>