<?php $data_machine = get_machines_grouped_by_category(); ?>

<!-- Desktop layout -->
<div class="container component-machines img-degrade d-none d-sm-block">
  <div class="row selector-container">
    <div class="col-sm-8 mb-3 mb-sm-0">
      <div class="card border-0 bg-transparent">
        <div class="card-body d-flex pr-0">
          <div class="vertical-text" id="verticalText">
            <span class="filled"></span>
            <span class="outlined"></span>
          </div>
          <div class="machine-image pl-5">
            <div id="machineCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" id="carouselInner"></div>
              <a class="carousel-control-prev" href="#machineCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#machineCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card border-0 bg-transparent">
        <div class="card-body">
          <div class="menu-options">
            <?php foreach ($data_machine as $categoria => $items): ?>
              <?php $title = strtoupper($categoria); ?>
              <button class="option-btn<?php echo $categoria === array_key_first($data_machine) ? ' active' : ''; ?>"
                data-title="<?php echo $title; ?>"
                data-categoria="<?php echo esc_attr($categoria); ?>">
                <?php echo esc_html($categoria); ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mobile layout -->
<div class="container componet-machines-mobile d-block d-sm-none pt-3">
  <div class="row justify-content-center">
    <div class="col-12 text-center">
      <div class="vertical-text mb-2" id="verticalTextMobile">
        <span class="filled"></span>
        <span class="outlined"></span>
      </div>
      <div class="machine-image">
        <div id="machineCarouselMobile" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" id="carouselInnerMobile"></div>
          <a class="carousel-control-prev" href="#machineCarouselMobile" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#machineCarouselMobile" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-3">
    <div class="col-12">
      <div class="menu-options-mobile" id="menuOptionsMobile">
        <?php foreach ($data_machine as $categoria => $items): ?>
          <?php $title = strtoupper($categoria); ?>
          <button class="option-btn-mobile<?php echo $categoria === array_key_first($data_machine) ? ' active' : ''; ?>"
            data-title="<?php echo $title; ?>"
            data-categoria="<?php echo esc_attr($categoria); ?>">
            <?php echo esc_html($categoria); ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<script>
  const dataMachine = <?php echo json_encode($data_machine, JSON_UNESCAPED_UNICODE); ?>;

  // Desktop
  const buttons = document.querySelectorAll('.option-btn');
  const verticalText = document.getElementById('verticalText');
  const carouselInner = document.getElementById('carouselInner');

  function updateCarousel(categoria) {
    carouselInner.innerHTML = '';
    const items = dataMachine[categoria];
    items.forEach((item, index) => {
      const imgSrc = item.imagen;
      const activeClass = index === 0 ? 'active' : '';
      const slide = `
        <div class="carousel-item ${activeClass}">
          <img src="${imgSrc}" class="d-block animating" alt="${item.nombre}">
          <h5 class="mt-2">${item.nombre}</h5>
        </div>`;
      carouselInner.insertAdjacentHTML('beforeend', slide);
    });
  }

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const categoria = btn.dataset.categoria;
      const title = btn.dataset.title;
      verticalText.classList.remove('animating');
      void verticalText.offsetWidth;
      verticalText.querySelectorAll('span').forEach(s => s.textContent = title);
      verticalText.classList.add('animating');
      updateCarousel(categoria);
    });
  });

  const firstCategoria = Object.keys(dataMachine)[0];
  verticalText.querySelectorAll('span').forEach(s => s.textContent = firstCategoria.toUpperCase());
  updateCarousel(firstCategoria);

  // Mobile
  const buttonsMobile = document.querySelectorAll('.option-btn-mobile');
  const verticalTextMobile = document.getElementById('verticalTextMobile');
  const carouselInnerMobile = document.getElementById('carouselInnerMobile');

  function updateCarouselMobile(categoria) {
    carouselInnerMobile.innerHTML = '';
    const items = dataMachine[categoria];
    items.forEach((item, index) => {
      const imgSrc = item.imagen;
      const activeClass = index === 0 ? 'active' : '';
      const slide = `
        <div class="carousel-item ${activeClass}">
          <img src="${imgSrc}" class="d-block animating" alt="${item.nombre}">
          <h5 class="mt-2 color-white">${item.nombre}</h5>
        </div>`;
      carouselInnerMobile.insertAdjacentHTML('beforeend', slide);
    });
  }

  buttonsMobile.forEach(btn => {
    btn.addEventListener('click', () => {
      buttonsMobile.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const categoria = btn.dataset.categoria;
      const title = btn.dataset.title;
      verticalTextMobile.classList.remove('animating');
      void verticalTextMobile.offsetWidth;
      verticalTextMobile.querySelectorAll('span').forEach(s => s.textContent = title);
      verticalTextMobile.classList.add('animating');
      updateCarouselMobile(categoria);
    });
  });

  verticalTextMobile.querySelectorAll('span').forEach(s => s.textContent = firstCategoria.toUpperCase());
  updateCarouselMobile(firstCategoria);
</script>
