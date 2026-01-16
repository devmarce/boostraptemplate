<?php if ($promo): ?>
  <span class="badge badge-success my-1"><?php echo esc_html($promo); ?></span>
<?php endif; ?>

<?php if ($tag_promo): ?>
  <span class="badge badge-success my-1"><?php echo esc_html($tag_promo); ?></span>
<?php endif; ?>

<?php if ($hot_sale): ?>
  <span class="badge badge-danger my-1">🔥 Hot Sale</span>
<?php endif; ?>