<?php
$mostrar_componente_f_pagos = get_field('visible_formas_pago_consulta', 'option');
?>


<?php if ($mostrar_componente_f_pagos) : ?>
  <!-- formas de pago - component homep -->
  <div class="container mt-5" aria-label="Información de pagos y consultas">
    <h2 class="f-dulcing text-center reflejo my-5">Formas de Pago</h2>
  </div>

  <div class="container-f-pago">
    <?php if (have_rows('formas_pago_consulta', 'option')): ?>
      <?php while (have_rows('formas_pago_consulta', 'option')): the_row();
        $icono      = get_sub_field('icono');
        $titulo     = get_sub_field('titulo');
        $descripcion = get_sub_field('descripcion');
        $resaltado  = get_sub_field('resaltado');
        $slug       = sanitize_title($titulo);
      ?>
        <div class="box">
          <span></span>
          <div class="content">
            <h2 class="f-dulcing"><?php echo esc_html($titulo); ?></h2>
            <div class="d-inline-flex align-items-center justify-content-center rounded" style="width:48px;height:48px;font-size:1.35rem;">
              <?php echo esc_html($icono); ?>
            </div>
            <p class="f-normal">
              <?php echo esc_html($descripcion); ?>
              <?php if ($resaltado): ?>
                <strong class="text-dark"><?php echo esc_html($resaltado); ?></strong>
              <?php endif; ?>
            </p>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <style type="text/css">
    .container-f-pago {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    .container-f-pago .box {
      position: relative;
      width: 320px;
      height: 400px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 1rem 1rem;
      transition: 0.5s;
    }

    .container-f-pago .box::before {
      content: ' ';
      position: absolute;
      top: 0;
      left: 50px;
      width: 50%;
      height: 100%;
      text-decoration: none;
      background: #fff;
      border-radius: 8px;
      transform: skewX(15deg);
      transition: 0.5s;
    }

    .container-f-pago .box::after {
      content: '';
      position: absolute;
      top: 0;
      left: 50;
      width: 50%;
      height: 100%;
      background: #fff;
      border-radius: 8px;
      transform: skewX(15deg);
      transition: 0.5s;
      filter: blur(30px);
    }

    .container-f-pago .box:hover:before,
    .container-f-pago .box:hover:after {
      transform: skewX(0deg);
      left: 20px;
      width: calc(100% - 90px);

    }

    .container-f-pago .box:nth-child(1):before,
    .container-f-pago .box:nth-child(1):after {
      background: linear-gradient(315deg, #ffbc00, #ff0058)
    }

    .container-f-pago .box:nth-child(2):before,
    .container-f-pago .box:nth-child(2):after {
      background: linear-gradient(315deg, #03a9f4, #ff0058)
    }

    .container-f-pago .box:nth-child(3):before,
    .container-f-pago .box:nth-child(3):after {
      background: linear-gradient(315deg, #4dff03, #00d0ff)
    }

    .container-f-pago .box span {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 5;
      pointer-events: none;
    }

    .container-f-pago .box span::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 0;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      opacity: 0;
      transition: 0.1s;
      animation: animate 2s ease-in-out infinite;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08)
    }

    .container-f-pago .box:hover span::before {
      top: -50px;
      left: 50px;
      width: 100px;
      height: 100px;
      opacity: 1;
    }

    .container-f-pago .box span::after {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      opacity: 0;
      transition: 0.5s;
      animation: animate 2s ease-in-out infinite;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      animation-delay: -1s;
    }

    .container-f-pago .box:hover span:after {
      bottom: -50px;
      right: 50px;
      width: 100px;
      height: 100px;
      opacity: 1;
    }

    @keyframes animate {

      0%,
      100% {
        transform: translateY(10px);
      }

      50% {
        transform: translate(-10px);
      }
    }

    .container-f-pago .box .content {
      position: relative;
      left: 0;
      padding: 20px 40px;
      background: rgb(255 14 252 / 16%);
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 15px rgb(0 0 0 / 7%);
      border-radius: 8px;
      z-index: 1;
      transform: 0.5s;
      color: #fff;
      min-height: 20rem;
    }

    .container-f-pago .box:hover .content {
      left: -25px;
      padding: 60px 40px;
    }

    .container-f-pago .box .content h2 {
      font-size: 2em;
      color: #fff;
      margin-bottom: 10px;
    }

    .container-f-pago .box .content p {
      font-size: 1.1em;
      margin-bottom: 10px;
      line-height: 1.4em;
      min-height: 8rem;
    }

    .container-f-pago .box .content a:hover {
      background: #450be4ff;
      box-shadow: 0 1px 15px rgba(1, 1, 1, 0.2);
    }
  </style>
<?php endif; ?>