<?php

function get_cryptoexplainer_excerpt($trim_character_count = null)
{

    $excerpt = wp_html_excerpt(get_the_excerpt(), $trim_character_count, '...');

    if (empty($post_ID)) {
        return null;
    }

    if (has_excerpt() || $trim_character_count = null) {

        return $excerpt;
    }

    return $excerpt;
}
