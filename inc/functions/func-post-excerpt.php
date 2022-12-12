<?php

function get_cryptoexplainer_excerpt($trim_character_count = null)
{
    $post_ID = get_the_ID();

    $excerpt = wp_html_excerpt(get_the_excerpt($post_ID), $trim_character_count, '...');

    if (empty($post_ID)) {
        return null;
    }

    if (has_excerpt() || $trim_character_count = null) {

        return $excerpt;
    }

    return $excerpt;
}
