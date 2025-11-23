<?php
// =============================
// Render Modal para el frontend
// =============================
?>

<?php $form_id = get_field('formulario_cotizacion', 'option'); ?>

<?php if ($form_id): ?>
<!-- Modal Cotización Machine -->
<div class="modal fade" id="cotizarDelicia" tabindex="-1" aria-labelledby="cotizarDeliciaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cotizarDeliciaLabel">Solicitar encargo de <span class="modal-title-destac text-uppercase"></span></h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>

      <!-- Body con el formulario -->
      <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '"]'); ?>
      </div>

    </div>
  </div>
</div>
<?php endif; ?>