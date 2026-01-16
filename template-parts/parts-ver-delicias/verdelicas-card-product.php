  <div class="delicia-info">
    <!-- Imagen pal Delicia -->
    <div class="delicia-imagen">
      <img src="<?php echo esc_url($imagen_url); ?>" alt="<?php echo esc_attr($nombre); ?>">
    </div>
    <!-- Card Info Delicia -->
    <div class="delicia-detalles f-normal">
      <p class="f-serius"><?php echo esc_html($descripcion_corta); ?></p>
      <hr>
      <p><strong>Estado:</strong> <?php echo esc_html($estado); ?></p>
      <p><strong>Categoría:</strong> <?php echo esc_html($categoria); ?></p>

      <?php if ($precio_temporal > 0 && !empty($precio_temporal_hasta)): ?>
        <p><strong style="color: #ef00ff;">Precio: $<?php echo $precio_real; ?></strong></p>
        <p><strong>Precio oferta:</strong> <span class="precio-oferta">$<?php echo number_format($precio_temporal, 2); ?></span></p>
        <p><strong>Vigencia:</strong> hasta <?php echo date_i18n('d/m/Y', strtotime($precio_temporal_hasta)); ?></p>
        <div id="contador-<?php echo esc_attr($id); ?>" class="contador-oferta"></div>
      <?php else: ?>
        <p><strong style="color: #ef00ff;">Precio: $<?php echo $precio_real; ?></strong></p>
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