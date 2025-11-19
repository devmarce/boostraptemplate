<?php

/**
 * The main template file.
 * 
 * To override home page (for listing latest post) add home.php into the theme.<br>
 * If front page displays is set to static, the index.php file will be use.<br>
 * If front-page.php exists, it will be override any home page file such as home.php, index.php.<br>
 * To learn more please go to https://developer.wordpress.org/themes/basics/template-hierarchy/ .
 * 
 * @package bootstrap-basic4
 */
// begins template. -------------------------------------------------------------------------
get_header();
?>
<style type="text/css">
  .bg-img-campo {
    background: url('<?php echo get_template_directory_uri(); ?>/assets/img/cultivo-creciendo.png') top/cover no-repeat;
  }

  @media screen and (max-width: 767.9px) {
    .bg-img-campo {
      background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/cultivo-creciendo.png');
    }
  }
</style>
<?php

include(get_template_directory() . "/template-parts/parts-homepage/homepage-slider.php");

echo '<div class="bg-img-campo">';

include(get_template_directory() . "/template-parts/parts-homepage/homepage-machines.php");

include(get_template_directory() . "/template-parts/parts-homepage/homepage-cards-services.php");

echo "</div>";

include(get_template_directory() . "/template-parts/parts-homepage/homepage-last-events.php");

include(get_template_directory() . "/template-parts/parts-homepage/homepage-banner-repuestos.php");

include(get_template_directory() . "/template-parts/parts-homepage/homepage-banner-usados.php");

get_footer();

?>