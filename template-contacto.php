<?php
/*
Template Name: Contacto Pastelería
*/
get_header(); ?>

<!-- Banner -->
<section class="container-fluid p-0">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-contacto.jpg" 
       class="img-fluid w-100" alt="Pastelería Contacto">
</section>

<!-- Card central: Formas de pago -->
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card text-center shadow">
        <div class="card-header bg-danger text-white">
          <h4>Formas de Pago</h4>
        </div>
        <div class="card-body">
          <p>Aceptamos efectivo, tarjetas de crédito/débito y transferencias bancarias.</p>
          <p>También podés pagar con apps como MercadoPago.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Formulario de contacto -->
<section class="container my-5">
  <h2 class="text-center mb-4">Contactanos</h2>
  <?php
    // Aquí podés insertar un shortcode de Contact Form 7 o WPForms
    echo do_shortcode('[contact-form-7 id="123" title="Formulario de contacto"]');
  ?>
</section>

<!-- Sección pedidos -->
<section class="container my-5">
  <h2 class="text-center mb-4">Pedidos y Entregas</h2>
  <div class="row">
    <div class="col-md-6">
      <h5>⏰ Tiempos</h5>
      <p>Los pedidos deben realizarse con al menos 48 horas de anticipación.</p>
    </div>
    <div class="col-md-6">
      <h5>🚚 Entregas</h5>
      <p>Realizamos entregas a domicilio en toda la ciudad. También podés retirar en nuestro local.</p>
    </div>
  </div>
</section>

<!-- Sección encargos especiales -->
<section class="container my-5">
  <h2 class="text-center mb-4">Encargos Especiales</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Eventos</h5>
          <p class="card-text">Pastelería personalizada para cumpleaños, aniversarios y celebraciones.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Catering</h5>
          <p class="card-text">Opciones dulces y saladas para reuniones y fiestas.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Empresas</h5>
          <p class="card-text">Mesas dulces y regalos corporativos para tus clientes y empleados.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
