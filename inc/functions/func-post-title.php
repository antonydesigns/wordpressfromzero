<?php
function get_cryptoexplainer_title($trim_character_count = null)
{

    $title = wp_html_excerpt(get_the_title(), $trim_character_count, '...');

    return $title;
}
