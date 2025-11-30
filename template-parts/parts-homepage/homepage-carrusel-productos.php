<?php
$args = array(
  'numberposts' => -1,          // cantidad de entradas
  'post_type'   => 'post',     // tipo de contenido (post, page, custom)
  'orderby'     => 'date',
  'order'       => 'DESC'
);

$novedades = get_posts($args);
?>
<!-- test @borrar -->
<style type="text/css">
   /* ‖‖‖‖‖‖‖‖‖‖‖‖‖‖‖ HOMEPAGE ÚLTIMOS EVENTOS ‖‖‖‖‖‖‖‖‖‖‖‖‖‖‖ */
.base-template {
  background: linear-gradient(180deg, rgba(0, 0, 0, 1) 50%, rgb(250 7 166) 62%, rgb(255 253 253) 100%);
}

.base-template__wrapper {
  max-width: 1560px;
}

.base-template__text {
  margin-bottom: 60px;
}

/**
 * Slider Instance
 */

.swiper {
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.emotions-slider {
  --color-gray: #818181;
  --color-gray-dark: transparent;

  padding-inline: 98px;
  position: relative;
}

.emotions-slider__slide {
  display: flex;
  align-items: center;
}

@media screen and (max-width: 767.9px) {
  .emotions-slider {
    padding: 0;
  }
}

.slider-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  position: absolute;
  top: 50%;
  left: 0;
  translate: 0 -50%;
  z-index: 1;
  pointer-events: none;
}

.slider-nav__item {
  display: flex;
  align-items: center;
  justify-content: center;
  aspect-ratio: 1;
  width: 48px;
  pointer-events: auto;
  cursor: pointer;
  transition: all 0.3s ease-out;
}

.slider-nav__item.disabled {
  cursor: default;
  opacity: 0.5;
}

.slider-nav__item path {
  stroke: currentColor;
}

@media (hover: hover) and (pointer: fine) {
  .slider-nav__item:not(.disabled):hover {
    color: var(--color-blue);
  }
}

@media (hover: none) {
  .slider-nav__item:not(.disabled):active {
    color: var(--color-blue);
  }
}

@media screen and (max-width: 767.9px) {
  .slider-nav {
    display: none;
  }
}

.slider-pagination {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 8px;
  padding-top: 40px;
}

.swiper-pagination-lock {
  display: none !important;
}

.slider-pagination__item {
  width: 8px;
  height: 8px;
  border-radius: 99px;
  background: #002458;
  transition: all 0.3s ease-out;
  opacity: 0.7;
}

.slider-pagination__item.active {
  background: #ffd01e;
  width: 30px;
  opacity: 1;
}

/**
 * Slider Item
 */
.swiper-slide {
  width: auto;
  height: auto;
}

@keyframes btn-arrow-move {
  0% {
    translate: 0;
  }

  100% {
    translate: 100% -100%;
  }
}

.emotions-slider-item {
  --border-radius: 10px;
  max-width: 400px;
  background: var(--color-gray-dark);
  border-radius: var(--border-radius);
  position: relative;
  overflow: hidden;
}


.emotions-slider-item__image {
  aspect-ratio: 100 / 100;
  overflow: hidden;
}

.emotions-slider-item__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.emotions-slider-item__content {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.emotions-slider-item__header,
.emotions-slider-item__footer {
  background:  var(--color-secondary);
  max-height: 50px;
  overflow: hidden;
  transition: max-height 0.6s ease-in;
}

.emotions-slider-item__header-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 20px;
}

.emotions-slider-item__btn {
  display: flex;
  align-items: center;
  gap: 4px;
  font-weight: 500;
  font-size: 18px;
  color: var(--color-primary);
  text-decoration: none;
  justify-content: center;
}

.emotions-slider-item__btn:hover {
  color: #fff;
}

.emotions-slider-item__btn-icon {
  flex-shrink: 0;
  display: block;
  aspect-ratio: 1;
  width: 24px;
  position: relative;
  overflow: hidden;
}

.emotions-slider-item__btn-icon::before,
.emotions-slider-item__btn-icon::after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
}

.emotions-slider-item__btn-icon::after {
  position: absolute;
  top: 100%;
  right: 100%;
}

.emotions-slider__slide:not(.swiper-slide-active) .emotions-slider-item__header,
.emotions-slider__slide:not(.swiper-slide-active) .emotions-slider-item__footer {
  max-height: 0;
}

@media (hover: hover) and (pointer: fine) {

  .emotions-slider-item__btn:hover .emotions-slider-item__btn-icon::before,
  .emotions-slider-item__btn:hover .emotions-slider-item__btn-icon::after {
    animation: btn-arrow-move 0.4s ease forwards;
  }
}

@media (hover: none) {

  .emotions-slider-item__btn:active .emotions-slider-item__btn-icon::before,
  .emotions-slider-item__btn:active .emotions-slider-item__btn-icon::after {
    animation: btn-arrow-move 0.4s ease forwards;
  }
}

.emotions-slider__nav.slider-nav svg {
  color: var(--color-secondary);
}

.title-last-events {
  color: #fff;
  margin-block: 3rem;
  text-align: center;
}

/* END: Últimos Eventos homepage */
</style>
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
          <h2>Mis Delicias</h2>
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