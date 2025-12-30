<?php
$titulo      = get_field('eventos_titulo', 'option');
$texto       = get_field('eventos_texto', 'option');
$mostrar_ventos = get_field('visible_eventos_home', 'option');
?>

<?php if ($mostrar_ventos): ?>
  <div id="component-events" class="jumbotron jumbotron-fluid text-center bg-black text-white mb-0">
    <div class="container">
      <?php if ($titulo): ?>
        <h2 class="display-4 f-dulcing oro-leter mb-5"><?php echo esc_html($titulo); ?></h2>
      <?php endif; ?>

      <?php if ($texto): ?>
        <p class="lead f-serius mb-5"><?php echo esc_html($texto); ?></p>
      <?php endif; ?>

        <?php
        $wa_numero  = get_field('whatsapp_delicias', 'options');
        whatsapp_btn($wa_numero, '');
        ?>
    </div>
  </div>
<?php endif; ?>
