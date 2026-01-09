<?php
$data_title = get_field('title_feed_instagram', 'option');
// Recupera el shortcode dinámico desde ACF
$shortcode_feed_instagram = get_field('shortcode_feed_instagram', 'option');
?>

<style type="text/css">
  /* Contenedor general */
  .instagram-section {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
  }

  /* Título opcional */
  .instagram-section::before {
    content: "<?php echo $data_title; ?>";
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
  }

  /* Ajustes de las imágenes del feed */
  .instagram-section .sbi_item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
  }

  .instagram-section .sbi_item img {
    border-radius: 10px;
    width: 100%;
    height: auto;
    display: block;
  }

  /* Hover elegante */
  .instagram-section .sbi_item:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
  }

  /* Grid responsivo */
  .instagram-section .sbi_item {
    margin: 10px;
  }

  .instagram-section .sbi_item:nth-child(odd) {
    background: #fafafa;
  }

  #sb_instagram {
    padding: 1.2rem !important;
    border-radius: 1.2rem;
  }
</style>

<!-- Contenedor del feed -->
<?php if( $shortcode_feed_instagram ) : ?>
  <div class="instagram-section">
    <?php echo do_shortcode( $shortcode_feed_instagram ); ?>
  </div>
<?php endif; ?>