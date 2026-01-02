  <?php if ($descripcion): ?>
  <!-- Description long Delica -->
  <div class="description-long">
    <h2 class="f-dulcing color-primary">Conocé más</h2>
    <div class="f-normal"><?php echo wp_kses_post($descripcion); ?></div>
  </div>
  <?php endif; ?>