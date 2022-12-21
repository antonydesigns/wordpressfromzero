<?php

/* 
Theme header

@package CryptoExplainer
*/

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Crypto Explainer</title> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    };
    ?>

    <?php // LOGO  
    get_template_part("template-parts/logo"); ?>

    <?php // NAVBAR
    get_template_part("template-parts/navbar"); ?>

    <main class="global-container">

        <?php if (is_page('series')) : ?>
            <h3>This is the series page.</h3>
        <?php endif ?>