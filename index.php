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

<?php

include(get_template_directory() . "/template-parts/parts-homepage/homepage-carrusel-productos.php");
//include(get_template_directory() . "/template-parts/parts-homepage/homepage-slider.php");


get_footer();

?>