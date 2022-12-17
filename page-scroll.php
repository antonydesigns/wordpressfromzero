<?php

/**
 * Page template
 *
 * @package Aquila
 */
?>

<?php get_header(); ?>


<h1>Loadmore demo</h1>

<div class="load-more-content-wrap">
    <div id="load-more-content">
        <?php

        /* 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query([
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'paged' => $paged
            ]);

            if ($query->have_posts()) {

                // Loop Posts.
                while ($query->have_posts()) {
                    $query->the_post();
                    locate_template('template-parts/content/content-listing.php', true, false, [
                        'title_char_limit' => $title_char_limit,
                        'excerpt_char_limit' => $excerpt_char_limit,
                    ]);
                }
                wp_reset_postdata();
            } else {
                // Return response as zero, when no post found.
                get_template_part('template-parts/content/content-none');
            } */
        ?>pagescroll
    </div>

    <button id="load-more" data-page="1" class="">
        <span>Load more posts</span>
    </button>
</div>


<?php get_footer(); ?>