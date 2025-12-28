<?php
  $mostrar_componente_f_pagos = get_field('visible_formas_pago_consulta', 'option');
?>


<?php if ($mostrar_componente_f_pagos) : ?>
  <!-- formas de pago - component homep -->
  <section class="container my-5" aria-label="Información de pagos y consultas">
    <h2 class="f-dulcing text-center reflejo my-5">Formas de Pago</h2>
    <div class="row">
      <?php if( have_rows('formas_pago_consulta', 'option') ): ?>
        <?php while( have_rows('formas_pago_consulta', 'option') ): the_row(); 
          $icono      = get_sub_field('icono');
          $titulo     = get_sub_field('titulo');
          $descripcion= get_sub_field('descripcion');
          $resaltado  = get_sub_field('resaltado');
          $slug       = sanitize_title($titulo);
        ?>
        <div class="col-md-6 col-lg-4 mb-3">
          <article class="rounded p-3 d-grid bg-oro-dulcing" role="group" aria-labelledby="<?php echo esc_attr($slug); ?>" style="height: 100%;">
            <div class="d-inline-flex align-items-center justify-content-center rounded" style="width:48px;height:48px;font-size:1.35rem;">
              <?php echo esc_html($icono); ?>
            </div>
            <h3 id="<?php echo esc_attr($slug); ?>" class="h6 text-uppercase mt-2 mb-1 f-serius">
              <?php echo esc_html($titulo); ?>
            </h3>
            <p class="mb-0 f-normal" style="color: white;">
              <?php echo esc_html($descripcion); ?>
              <?php if ($resaltado): ?>
                <strong class="text-dark"><?php echo esc_html($resaltado); ?></strong>
              <?php endif; ?>
            </p>
          </article>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>