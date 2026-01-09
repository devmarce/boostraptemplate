<?php if ($galeria && is_array($galeria)): ?>
  <!-- Gallery images Delicia -->
  <div class="gallery-image-products">
    <h2 class="f-dulcing color-primary">Galería</h2>
    <div class="gallery">
      <?php foreach ($galeria as $index => $src): ?>
        <img src="<?= htmlspecialchars($src['url']) ?>" 
             alt="<?= !empty($src['alt']) ? htmlspecialchars($src['alt']) : htmlspecialchars($src['title']) ?>" 
             class="gallery-item" 
             onclick="openModal(<?= $index ?>)">
      <?php endforeach; ?>
    </div>
  </div>

  <script>
    const title_product = <?= json_encode($nombre) ?>;
    const images = <?= json_encode($galeria) ?>;
    let currentIndex = 0;

    function openModal(index) {
      currentIndex = index;
      updateModal();
      document.getElementById("modal").style.display = "flex";
    }

    function closeModal() {
      document.getElementById("modal").style.display = "none";
    }

    function prevImage() {
      currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
      updateModal();
    }

    function nextImage() {
      currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
      updateModal();
    }

    function updateModal() {
      const imgData = images[currentIndex];
      document.getElementById("modal-img").src = imgData.url;
      document.getElementById("modal-img").alt = imgData.alt || imgData.title;
      document.getElementById("modal-caption").innerText = title_product;
    }
  </script>

  <style type="text/css">
    /* Masonry estilo Pinterest */
    .gallery {
      column-count: 3;   /* número de columnas */
      column-gap: 10px;  /* espacio entre columnas */
    }

    .gallery-item {
      width: 100%;
      margin-bottom: 10px;
      display: block;
      border-radius: 5px;
      cursor: pointer;
      object-fit: cover;
    }

    .modal-gallery-produc {
      position: relative;
      display: contents; 
    }

    .modal-gallery {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgb(255 0 120 / 72%);
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .modal-img {
      max-width: 90%;
      max-height: 90%;
      border: 4px solid white;
      border-radius: 8px;
    }

    .close {
      position: absolute;
      top: 20px; right: 30px;
      font-size: 24px;
      color: white;
      cursor: pointer;
    }

    .nav {
      background: none;
      border: none;
      font-size: 32px;
      color: white;
      cursor: pointer;
      margin: 0 20px;
    }

    #modal-caption {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      font-weight: bold;
      max-width: 80%;
      text-align: center;
    }

    /* Responsive Masonry */
    @media (max-width: 768px) {
      .gallery {
        column-count: 2;
      }
    }

    @media (max-width: 480px) {
      .gallery {
        column-count: 1;
      }
    }

    /* =====COMP: homepage-eventos-home */
    @media (max-width: 556px) {
      .nav-gallery-left, 
      .nav-gallery-right {
        position: absolute;
        top: 85%;
        transform: translateY(-50%);
      }

      .nav-gallery-left {
        left: 30%;
      }
      .nav-gallery-right {
        right: 30%;
      }
    }
  </style>

  <!-- Modal Gallery -->
  <div id="modal" class="modal-gallery">
    <span onclick="closeModal()" class="close">&times;</span>
    
    <button onclick="prevImage()" class="nav nav-gallery-left">⟨</button>
    
    <div class="modal-gallery-produc">
      <img id="modal-img" src="" alt="" class="modal-img">
      <div id="modal-caption" class="bg-oro-manga f-normal"></div>
    </div>
    
    <button onclick="nextImage()" class="nav nav-gallery-right">⟩</button>
  </div>

<?php endif; ?>
