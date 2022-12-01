<?php

/**
 * Template part -- The site logo
 * 
 * @package CryptoExplainer 
 */


if (function_exists('the_custom_logo')) {
    $id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($id); // returns array[] of image data
    $logo_src = $logo[0];
} ?>
<div class="mid contains-logo">
    <a href="<?php echo esc_url(get_home_url()) ?>"><img src="<?php echo $logo_src ?>" class="logo gap" alt="the logo"></a>
</div>