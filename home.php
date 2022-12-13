<?php

/**
 * Blog homepage template
 * @package CryptoExplainer
 */
?>

<?php get_header(); ?>

<!-- Title and intro content -->

<header class="">
    <h1 class=" page-title mid">
        <?php single_post_title()
        ?>
    </h1>
    <p><?php echo "The blog homepage template " ?></p>
    <form action="">
        <p>Search for content on this site</p>
        <input type="search">
        <input type="submit" value="search" class="button gap">
    </form>
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

</main>

<div class="pagination mid gap"> <?php echo crexp_pagination() ?> </div>


<?php get_footer(); ?>