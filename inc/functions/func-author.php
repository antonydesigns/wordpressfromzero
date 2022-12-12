<?php
function cryptoexplainer_post_author()
{
    $post_author = [
        'author_url' => esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        'author_name' => esc_html(get_the_author())
    ];

    return $post_author;
}
