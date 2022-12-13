<?php

/**
 * Search results page
 * 
 * @package CryptoExplainer
 */
?>

<?php
get_header();
global $wp_query;
?>

<!-- Title and intro content -->

<header class="">
    <h1 class="page-title mid">
        Found <?php echo $wp_query->found_posts; ?> results for
    </h1>
    <h1 class="page-title mid">"<?php the_search_query(); ?>"</h1>
</header>

<!-- All posts by date -->

<main>
    <div class="latest-posts cols col-mid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post() ?>

                <article class="post-preview gap" id="post-<?php the_ID(); ?>">

                    <!-- Standard Content Listing template -->

                    <?php
                    locate_template('template-parts/content/content-listing.php', true, false, [
                        'title_char_limit' => $title_char_limit,
                        'excerpt_char_limit' => $excerpt_char_limit,
                    ]);
                    ?>

                </article>

            <?php endwhile; ?>
        <?php else : get_template_part('template-parts/content/content-none') ?>
        <?php endif ?>

    </div>

    <p class="mid">Not what you're looking for?</p>
    <div class="mid">
        <?php get_search_form() ?>
    </div>

</main>

<div class="pagination mid gap"> <?php echo crexp_pagination() ?> </div>


<?php get_footer(); ?>