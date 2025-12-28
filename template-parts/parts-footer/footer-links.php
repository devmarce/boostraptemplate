<!-- Legal Links -->
<?php if (have_rows('footer_links', 'option')): ?>
  <div class="row py-3">
    <div class="col-md-12 text-center">
      <ul class="list-inline mb-0 legal-links">
        <?php
        $links = get_field('footer_links', 'option');
        $total = count($links);
        $count = 0;

        while (have_rows('footer_links', 'option')): the_row();
          $link = get_sub_field('link');
          if ($link):
            $title  = esc_html($link['title']);
            $url    = esc_url($link['url']);
            $target = $link['target'] ? esc_attr($link['target']) : '_self';
        ?>
            <li class="list-inline-item">
              <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="text-white">
                <?php echo $title; ?>
              </a>
            </li>
            <?php
            $count++;
            if ($count < $total): ?>
              <li class="list-inline-item separator">|</li>
            <?php endif; ?>
        <?php endif;
        endwhile; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>