<?php
function get_cryptoexplainer_title($trim_character_count = null)
{
    $post_ID = get_the_ID();

    $title = wp_html_excerpt(get_the_title($post_ID), $trim_character_count, '...');

    return $title;
}
