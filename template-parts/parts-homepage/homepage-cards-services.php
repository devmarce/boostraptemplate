<?php
$data_card_services = get_field('cards_services', 'option');
if ($data_card_services): ?>
  <div class="container py-4 cards-services">
    <div class="row justify-content-center text-center">
      <?php foreach ($data_card_services as $tarjeta): ?>
        <div class="col-6 col-md-3 mb-4 d-flex">
          <div class="card-service w-100">
            <?php if (!empty($tarjeta['icono'])): ?>
              <img src="<?php echo esc_url($tarjeta['icono']['url']); ?>" alt="<?php echo esc_attr($tarjeta['titulo']); ?>" class="mb-2" style="width:48px; height:auto;">
            <?php endif; ?>
            <div class="card-service-text"><?php echo esc_html($tarjeta['titulo']); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>