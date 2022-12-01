<?php

/**
 * Archive Page template 
 * 
 * Displays posts of similar categories and tags
 *
 * @package CryptoExplainer
 */
get_header();
?>

<!-- Title and intro content -->

<header class="">
    <h1 class="single-term-title mid">
        <?php
        if (!empty(single_term_title())) {
            single_term_title();
        }
        ?>
    </h1>
    <p class="archive-description">
        <?php
        if (!empty(get_the_archive_description())) {
            the_archive_description();
        } ?>
    </p>
</header>

<!-- The list of posts -->

<main class="cols col-mid">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>

            <article class="post-preview gap" id="post-<?php the_ID(); ?>">

                <!-- Content Listing template -->

                <?php locate_template('template-parts/content/content-listing.php', true, false, [
                    'title_char_limit' => $title_char_limit,
                    'excerpt_char_limit' => $excerpt_char_limit,
                ]); ?>

            </article>
        <?php endwhile; ?>
    <?php else : get_template_part('template-parts/content-none') ?>
    <?php endif ?>
</main>


<?php

get_footer();
