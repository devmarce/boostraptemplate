<?php
$args = array(
  'numberposts' => -1,          // cantidad de entradas
  'post_type'   => 'post',     // tipo de contenido (post, page, custom)
  'orderby'     => 'date',
  'order'       => 'DESC'
);

$novedades = get_posts($args);
?>

<section class="base-template mb-5">
  <div class="wrapper base-template__wrapper">
    <div class="base-template__content py-4">
      <div class="emotions-slider">

        <!-- Slider Navigation -->
        <div class="emotions-slider__nav slider-nav">
          <div tabindex="0" class="slider-nav__item slider-nav__item_prev">
            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 26L2 14L14 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div tabindex="0" class="slider-nav__item slider-nav__item_next">
            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 26L14 14L2 2" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>

        <!-- Slider Content -->
        <div class="title-last-events">
          <h2>Últimos Eventos</h2>
        </div>
        <div class="emotions-slider__slider swiper">
          <div class="emotions-slider__wrapper swiper-wrapper">
            <?php foreach ($novedades as $index => $novedad): ?>
              <div class="emotions-slider__slide swiper-slide">
                <div class="emotions-slider__item emotions-slider-item">
                  <div class="emotions-slider-item__image">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($novedad->ID, '')); ?>"
                      alt="<?php echo esc_attr('Slide ' . ($index + 1)); ?>" />
                  </div>
                  <div class="emotions-slider-item__content">
                    <div class="emotions-slider-item__footer">
                      <a class="emotions-slider-item__btn"
                        href="<?php echo esc_url(get_permalink($novedad->ID)); ?>" target="_blank">
                        <span class="emotions-slider-item__btn-text">
                          <?php echo esc_html($novedad->post_title); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>


        <!-- Slider Pagination -->

        <div class="emotions-slider__pagination slider-pagination"></div>

      </div>
    </div>
  </div>
</section>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll(".emotions-slider");

    if (!sliders.length) return;

    const list = [];

    sliders.forEach((element) => {
      const [slider, prevEl, nextEl, pagination] = [
        element.querySelector(".swiper"),
        element.querySelector(".slider-nav__item_prev"),
        element.querySelector(".slider-nav__item_next"),
        element.querySelector(".slider-pagination")
      ];

      list.push(
        new Swiper(slider, {
          loop: true,
          slidesPerView: 3,
          spaceBetween: 1,
          speed: 600,
          observer: true,
          watchOverflow: true,
          watchSlidesProgress: true,
          centeredSlides: true,
          initialSlide: 0,
          navigation: {
            nextEl,
            prevEl,
            disabledClass: "disabled"
          },
          pagination: {
            el: pagination,
            type: "bullets",
            modifierClass: "slider-pagination",
            bulletClass: "slider-pagination__item",
            bulletActiveClass: "active",
            clickable: true
          },
          breakpoints: {
            0: {
              slidesPerView: 1.2,
              centeredSlides: true,
              spaceBetween: 10
            },
            768: {
              slidesPerView: 2.5,
              centeredSlides: true,
              spaceBetween: 20
            },
            1024: {
              slidesPerView: 3,
              centeredSlides: true,
              spaceBetween: 30
            }
          }


        })
      );
    });
  });
</script>