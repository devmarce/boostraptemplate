<?php
$locations = get_nav_menu_locations();
$menu_id = isset($locations['primary']) ? $locations['primary'] : false;

if ($menu_id) {
  $menu_items = wp_get_nav_menu_items($menu_id);
  $parents = [];

  foreach ($menu_items as $item) {
    if ($item->menu_item_parent == 0) {
      $parents[$item->ID] = [
        'title' => $item->title,
        'url' => $item->url,
        'children' => [],
      ];
    } else {
      if (isset($parents[$item->menu_item_parent])) {
        $parents[$item->menu_item_parent]['children'][] = [
          'title' => $item->title,
          'url' => $item->url,
        ];
      }
    }
  }
?>
  <!-- Desktop footer layout -->
  <div class="menu-footer col-md-8 mb-5 pt-3 d-none d-sm-block">
    <div class="row">
      <?php foreach ($parents as $section): ?>
        <?php if (count($section['children']) > 1) : ?>
          <div class="col-md-4 mb-3">
            <details class="mb-3">
              <summary class="d-flex justify-content-around align-items-center font-weight-bold mb-2 h5 text-white">
                <span class="title-menu-footer"><?php echo esc_html($section['title']); ?></span>
                <span class="toggle-icon ml-2"></span>
              </summary>
              <ul class="ml-2 mt-2 pl-4">
                <?php foreach ($section['children'] as $child): ?>
                  <li><a href="<?php echo esc_url($child['url']); ?>" class="text-white"><?php echo esc_html($child['title']); ?></a></li>
                <?php endforeach; ?>
              </ul>
            </details>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Mobile footer layout -->
  <div class="menu-footer-mobile col-md-8 mb-4 d-block d-sm-none">
    <div class="row">
      <?php foreach ($parents as $section): ?>
        <?php if (count($section['children']) > 1) : ?>
          <div class="col-md-6 mb-3">
            <details class="mb-3">
              <summary class="d-flex justify-content-between align-items-center font-weight-bold mb-2 h5 text-white">
                <span class="title-menu-footer"><?php echo esc_html($section['title']); ?></span>
                <span class="toggle-icon ml-2"></span>
              </summary>
              <ul class="mt-2">
                <?php foreach ($section['children'] as $child): ?>
                  <li><a href="<?php echo esc_url($child['url']); ?>" class="text-white"><?php echo esc_html($child['title']); ?></a></li>
                <?php endforeach; ?>
              </ul>
            </details>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

<?php } ?>