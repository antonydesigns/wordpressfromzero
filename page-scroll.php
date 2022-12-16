<?php

/**
 * Page template
 *
 * @package Aquila
 */
?>

<?php get_header(); ?>

<div class="container">
    <h1 class="mb-4">Loadmore/Infinite Scroll Demo</h1>

    <div class="load-more-content-wrap">
        <div id="load-more-content" class="row">
            <?php


            // If user is not in editor and on page one, show the load more.
            ?>
        </div>
        <button id="load-more" data-page="1" class="load-more-btn my-4 d-flex flex-column mx-auto px-4 py-2 border-0 bg-transparent">
            <span><?php esc_html_e('Loading...', 'text-domain'); ?></span>
        </button>
    </div>

</div>

<?php get_footer(); ?>