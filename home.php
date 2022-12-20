<?php

/**
 * Blog homepage template
 * @package CryptoExplainer
 */
?>

<?php get_header();

// Preparing for a custom WP Query...

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$query = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'paged' => $paged
]);


$pagination_args = [
    'before_page_number' => '<span class="pagination-number gap">',
    'after_page_number' => '</span>',
    'total' => $query->max_num_pages,
    'current' => $paged
];
?>

<!-- Title and intro content -->

<header class="">
    <h1 class=" page-title mid">
        <?php single_post_title() ?>
    </h1>
    <p><?php echo "The blog homepage template " ?></p>
    <div class="mid">
        <?php get_search_form() ?>
    </div>
</header>

<!-- Show only 3 most recent posts -->

<main>
    <div class="latest-posts cols col-mid" id="load-more-content">

        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post() ?>

                <article class="post-preview gap">

                    <!-- Initial content listing -->

                    <?php
                    locate_template('template-parts/content/content-listing.php', true, false, [
                        'title_char_limit' => $title_char_limit,
                        'excerpt_char_limit' => $excerpt_char_limit,
                    ]);
                    ?>


                </article>

                <!-- New appended content listing goes here -->

            <?php endwhile;

            // Pagination for Google if is NOT ajax request

            wp_reset_postdata(); ?>

        <?php else : get_template_part('template-parts/content/content-none') ?>
        <?php endif ?>

    </div>

    <div class="mid">
        <div id="load-more" data-page="<?php echo $paged ?>" class="load-more-btn" data-max-pages="<?php echo $query->max_num_pages ?>">
            <span>Loading..</span>
        </div>
    </div>

    <?php
    $is_ajax_request = !empty($_POST['page']);
    if (!$is_ajax_request) :
    ?>

        <div class="mid" id="home-pagination">
            <?php echo paginate_links($pagination_args); ?>
        </div>

    <?php endif ?>



</main>

<?php get_footer(); ?>