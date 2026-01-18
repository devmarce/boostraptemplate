<?php
/*
Template Name: Contacto Pastelería
*/
get_header(); ?>

<?php 
the_content();
?>

<!-- Banner -->
<section class="container-fluid p-0">
  <?php if ($banner = get_field('banner_contacto')): ?>
    <img src="<?php echo esc_url($banner); ?>"
      class="img-fluid w-100" alt="Pastelería Contacto">
  <?php endif; ?>
</section>

<!-- Card central: Formas de pago -->
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card text-center shadow">
        <div class="card-header olograma bg-black">
          <h4 class="f-serius reflejo mb-3 text-white"><?php the_field('pago_titulo'); ?></h4>
        </div>
        <div class="card-body bg-manga">
          <p style="color: white;"><?php the_field('pago_texto'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include(get_template_directory() . "/template-parts/parts-homepage/homepage-cards-formas-pago.php"); ?>

<!-- Formulario de contacto -->
<section id="form-contacto" class="container my-5">
  <h2 class="text-center mb-4 f-dulcing">Contactanos</h2>
  <?php
  $form_shortcode = get_field('form_shortcode');
  if ($form_shortcode) {
    echo do_shortcode($form_shortcode);
  }
  ?>
</section>

<!-- Sección pedidos -->
<section class="container my-5">
  <h2 class="text-center mb-4 f-dulcing">Pedidos y Entregas</h2>
  <div class="row my-5">
    <div class="col-md-6 text-center">
      <h5 class="f-serius mb-5 color-primary"><?php the_field('pedidos_titulo'); ?></h5>
      <p><?php the_field('pedidos_texto'); ?></p>
    </div>
    <div class="col-md-6 text-center">
      <h5 class="f-serius mb-5 color-primary"><?php the_field('entregas_titulo'); ?></h5>
      <p><?php the_field('entregas_texto'); ?></p>
    </div>
  </div>
  <hr>
</section>

<style type="text/css">
  .hover-custom {
    transition: all 0.6s ease-in-out;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
  }

  .hover-custom:hover {
    transform: scale(1.04) translateY(-6px);
    box-shadow: 0 18px 35px rgb(251 3 255);
  }
</style>
<!-- Sección encargos especiales -->
<section class="container my-5">
  <h2 class="text-center mb-5 py-2 f-dulcing reflejo">Encargos Especiales</h2>
  <div class="row">
    <?php if (have_rows('encargos')): ?>
      <?php while (have_rows('encargos')): the_row(); ?>
        <div class="col-md-4 mt-5">
          <div class="card mb-4 hover-custom">
            <div class="card-body border-oro bg-black text-center">
              <h2 class="card-title f-dulcing oro-leter mb-5"><?php the_sub_field('encargo_titulo'); ?></h2>
              <p class="card-text f-serius text-white"><?php the_sub_field('encargo_texto'); ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

<!-- Sección WhatsApp -->
<section class="container my-5 text-center">
  <?php
  $wa_titulo  = get_field('whatsapp_titulo');
  $wa_numero  = get_field('whatsapp_numero');
  $wa_mensaje = get_field('whatsapp_mensaje');
  ?>

  <?php if ($wa_numero): ?>
    <h2 class="mb-4 f-dulcing"><?php echo esc_html($wa_titulo); ?></h2>
    <?php echo cat_odin_ini('rgb(60, 60, 60)', ['Z','z','z','Dulcing...'], '#000',''); ?>
    
      <?php whatsapp_btn($wa_numero, $wa_mensaje) ?>

    <?php echo cat_odin_end(); ?>
  <?php endif; ?>
</section>

<?php get_footer(); ?>