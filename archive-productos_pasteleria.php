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
<!-- test @borrar -->
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

  .zocalo-category .title-categoria {
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

  .card-text small.text-success {
    font-weight: 600;
    color: #28a745 !important;
  }

  .card-text small.text-muted {
    color: #6c757d !important;
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
                <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <!-- Pestaña TODOS -->
                    <a class="d-none nav-item nav-link active"
                      id="tab-todos-tab"
                      data-toggle="tab"
                      href="#tab-todos"
                      role="tab"
                      aria-controls="tab-todos"
                      aria-selected="true">
                      Todos
                    </a>
                    <!-- Pestañas por categoría -->
                    <?php foreach ($productos_grouped as $categoria => $items) : ?>
                      <?php $tab_id = 'tab-' . sanitize_title($categoria); ?>
                      <a class="nav-item nav-link"
                        id="<?php echo esc_attr($tab_id); ?>-tab"
                        data-toggle="tab"
                        href="#<?php echo esc_attr($tab_id); ?>"
                        role="tab"
                        aria-controls="<?php echo esc_attr($tab_id); ?>"
                        aria-selected="false">
                        <?php echo esc_html($categoria); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </nav>

                <div class="tab-content py-3 px-2 px-sm-0" id="nav-tabContent">
                  <!-- TAB TODOS -->
                  <div class="tab-pane fade show active"
                    id="tab-todos"
                    role="tabpanel"
                    aria-labelledby="tab-todos-tab">
                    <?php foreach ($productos_grouped as $categoria => $items) : ?>
                      <div class="zocalo-category" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/custom/category-back.png');">
                        <div>
                          <h2 class="title-categoria text-white text-uppercase"><?php echo esc_html($categoria); ?></h2>
                        </div>
                        <div><img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/custom/category-back.png" alt=""></div>
                      </div>
                      <div class="row">
                        <?php foreach ($items as $item) : ?>
                          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 px-4">
                            <div class="card h-100 producto-wrapper bg-light">

                              <img
                                class="card-img-top img-fluid"
                                src="<?php echo !empty($item['imagen']) ? esc_url($item['imagen']) : esc_url(get_template_directory_uri() . '/assets/img/placeholder.png'); ?>"
                                alt="<?php echo esc_attr($item['nombre']); ?>">

                              <div class="card-body">
                                <h5 class="card-title"><?php echo esc_html($item['nombre']); ?></h5>

                                <?php if (!empty($item['promo'])) : ?>
                                  <span class="badge badge-warning"><?php echo esc_html($item['promo']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($item['precio'])) : ?>
                                  <p class="card-text">
                                    Precio: $<?php echo esc_html(number_format($item['precio'], 2)); ?>
                                    <?php if (!empty($item['precio_temporal'])) : ?>
                                      <br><small class="text-success">Oferta: $<?php echo esc_html(number_format($item['precio_temporal'], 2)); ?></small>
                                    <?php endif; ?>
                                  </p>
                                <?php endif; ?>

                                <?php if (!empty($item['estado'])) : ?>
                                  <p><small class="text-muted">Estado: <?php echo esc_html($item['estado']); ?></small></p>
                                <?php endif; ?>

                                <?php if (!empty($item['descripcion_corta'])) : ?>
                                  <p class="card-text"><?php echo esc_html($item['descripcion_corta']); ?></p>
                                <?php endif; ?>
                                <?php if ($item['modal_form']) : ?>
                                  <a
                                    href="<?php echo !empty($item['link_ext']) ? esc_url($item['link_ext']) : '#'; ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-primary <?php echo !empty($item['modal_form']) ? 'js-cotizar-delicia' : ''; ?>"
                                    data-model-id="<?php echo esc_attr($item['id']); ?>"
                                    data-model-name="<?php echo esc_attr($item['nombre']); ?>"
                                    data-model-category="<?php echo esc_attr($item['categoria']); ?>">
                                    Encargar
                                  </a>
                                <?php endif; ?>

                                <?php $wa_delicias  = get_field('whatsapp_delicias', 'option'); ?>
                                <a
                                  href="<?php echo whatsapp_delicias(esc_attr($item['nombre']) ? esc_attr($item['nombre'])  : 'nombre del producto', $wa_delicias); ?>"
                                  target="_blank"
                                  rel="noopener noreferrer"
                                  class="btn btn-whatsapp">
                                  por WhatsApp
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <!-- TABS POR CATEGORÍA -->
                  <?php foreach ($productos_grouped as $categoria => $items) : ?>
                    <?php $tab_id = 'tab-' . sanitize_title($categoria); ?>
                    <div class="tab-pane fade"
                      id="<?php echo esc_attr($tab_id); ?>"
                      role="tabpanel"
                      aria-labelledby="<?php echo esc_attr($tab_id); ?>-tab">
                      <div class="zocalo-category" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/custom/category-back.png');">
                        <div>
                          <h2 class="title-categoria text-white text-uppercase"><?php echo esc_html($categoria); ?></h2>
                        </div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-blanco.png" alt="Logo"></div>
                      </div>
                      <div class="row">
                        <?php foreach ($items as $item) : ?>
                          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 px-4">
                            <div class="card h-100 producto-wrapper bg-light">

                              <img
                                class="card-img-top img-fluid"
                                src="<?php echo !empty($item['imagen']) ? esc_url($item['imagen']) : esc_url(get_template_directory_uri() . '/assets/img/placeholder.png'); ?>"
                                alt="<?php echo esc_attr($item['nombre']); ?>">

                              <div class="card-body">
                                <h5 class="card-title"><?php echo esc_html($item['nombre']); ?></h5>

                                <?php if (!empty($item['promo'])) : ?>
                                  <span class="badge badge-warning"><?php echo esc_html($item['promo']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($item['precio'])) : ?>
                                  <p class="card-text">
                                    Precio: $<?php echo esc_html(number_format($item['precio'], 2)); ?>
                                    <?php if (!empty($item['precio_temporal'])) : ?>
                                      <br><small class="text-success">Oferta: $<?php echo esc_html(number_format($item['precio_temporal'], 2)); ?></small>
                                    <?php endif; ?>
                                  </p>
                                <?php endif; ?>

                                <?php if (!empty($item['estado'])) : ?>
                                  <p><small class="text-muted">Estado: <?php echo esc_html($item['estado']); ?></small></p>
                                <?php endif; ?>

                                <?php if (!empty($item['descripcion_corta'])) : ?>
                                  <p class="card-text"><?php echo esc_html($item['descripcion_corta']); ?></p>
                                <?php endif; ?>
                                <?php if ($item['modal_form']) : ?>
                                  <a
                                    href="<?php echo !empty($item['link_ext']) ? esc_url($item['link_ext']) : '#'; ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-primary <?php echo !empty($item['modal_form']) ? 'js-cotizar-delicia' : ''; ?>"
                                    data-model-id="<?php echo esc_attr($item['id']); ?>"
                                    data-model-name="<?php echo esc_attr($item['nombre']); ?>"
                                    data-model-category="<?php echo esc_attr($item['categoria']); ?>">
                                    Encargar
                                  </a>
                                <?php endif; ?>

                                <?php $wa_delicias  = get_field('whatsapp_delicias', 'option'); ?>
                                <a
                                  href="<?php echo whatsapp_delicias(esc_attr($item['nombre']) ? esc_attr($item['nombre'])  : 'nombre del producto', $wa_delicias); ?>"
                                  target="_blank"
                                  rel="noopener noreferrer"
                                  class="btn btn-whatsapp">
                                  por WhatsApp
                                </a>

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

<?php get_footer(); ?>