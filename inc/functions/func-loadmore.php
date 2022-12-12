<?php
function more_post_ajax($title_char_limit = 60, $excerpt_char_limit = 200)
{

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();

            locate_template('template-parts/content/content-listing.php', true, false, [
                'title_char_limit' => $title_char_limit,
                'excerpt_char_limit' => $excerpt_char_limit,
            ]);

        endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
