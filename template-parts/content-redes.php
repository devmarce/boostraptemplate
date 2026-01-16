<?php
// Lista de redes sociales definidas en ACF
$redes = array('instagram','facebook','whatsapp','email','youtube','especial', 'especial2');
?>

<!-- Vista Desktop -->
<div class="social-icons-row d-none d-md-flex flex-row align-items-center justify-content-center gap-3 mb-2">
    <?php foreach ($redes as $red): 
        $link   = get_field($red . '_link', 'option');
        $text   = get_field($red . '_text', 'option');
        $icon   = get_field($red . '_icon', 'option');
        $check  = get_field($red . '_checkbox', 'option'); // checkbox "mostrar"

        if ($check && $link): 
            $url    = is_array($link) ? $link['url'] : $link;
            $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
    ?>
        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="d-flex align-items-center text-decoration-none mr-2">
            <?php if ($icon && isset($icon['url'])): ?>
                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($text); ?>" class="me-2 rounded-circle" style="width:32px;height:32px;">
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/estrella.png'; ?>" alt="<?php echo esc_attr($text); ?>" class="me-2 rounded-circle" style="width:28px;height:28px;">
            <?php endif; ?>
            <?php if ($text): ?>
                <span><?php echo esc_html($text); ?></span>
            <?php endif; ?>
        </a>
    <?php endif; endforeach; ?>
</div>

<!-- Vista Mobile -->
<div class="social-icons-row d-flex d-md-none flex-row align-items-center justify-content-center gap-3 mb-2">
    <?php foreach ($redes as $red): 
        $link   = get_field($red . '_link', 'option');
        $text   = get_field($red . '_text', 'option');
        $icon   = get_field($red . '_icon', 'option');
        $check  = get_field($red . '_checkbox', 'option');

        if ($check && $link): 
            $url    = is_array($link) ? $link['url'] : $link;
            $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
    ?>
        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="d-flex align-items-center text-decoration-none mr-2">
            <?php if ($icon && isset($icon['url'])): ?>
                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($text); ?>" class="me-2 rounded-circle" style="width:28px;height:28px;">
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/estrella.png'; ?>" alt="<?php echo esc_attr($text); ?>" class="me-2 rounded-circle" style="width:28px;height:28px;">
            <?php endif; ?>
            <?php if ($text): ?>
                <span class="small"><?php echo esc_html($text); ?></span>
            <?php endif; ?>
        </a>
    <?php endif; endforeach; ?>
</div>
