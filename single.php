<?php
/* 
Blog single page template

@package CryptoExplainer
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>

        <article id="post-<?php the_ID(); ?>">

            <?php
            the_post();
            $post_author = cryptoexplainer_post_author();
            $author_url = $post_author['author_url'];
            $author_name = $post_author['author_name'];

            $post_date = cryptoexplainer_post_time();
            $datetime_attr = $post_date['datetime_attr'];
            $datetime_val = $post_date['datetime_val'];
            $updated_datetime_attr = $post_date['updated_datetime_attr'];
            $updated_datetime_val = $post_date['updated_datetime_val'];
            $date_archive_permalink = $post_date['date_archive_permalink'];

            $post_title = wp_strip_all_tags(get_the_title());
            $post_thumbnail = get_the_post_thumbnail(null, 'post-thumbnail', array('loading' => 'lazy'));
            $excerpt = get_cryptoexplainer_excerpt($excerpt_char_limit);
            ?>

            <!-- Categories, title and excerpt -->

            <div class="mid left">
                <header class='post-header'>
                    <div class="category gap">
                        <?php // get_template_part('template-parts/meta/meta-category'); 
                        ?>
                        <?php cryptoexplainer_breadcrumbs();
                        ?>
                    </div>
                    <h2 class="post-title gap"><?php echo $post_title; ?></h2>
                    <div class=" gap"><?php echo $excerpt; ?></div>
                    <div class="post-meta gap ">
                        <p><strong>By <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo $date_archive_permalink ?>">
                                    <time class="posted-on" datetime="<?php echo $datetime_attr ?>"><?php echo $datetime_val ?></time>
                                </a>
                            </strong></p>
                    </div>
                </header>
            </div>

            <!-- Featured image -->

            <div class="mid">
                <figure class="post-featured-image">
                    <?php echo $post_thumbnail ?>
                </figure>
            </div>

            <!-- Blog post content -->
            <div class="mid">
                <div class="post-content gap">
                    <?php the_content() ?>
                </div>
            </div>


            <!-- Footer -->
            <div class="mid">
                <div class="footer gap">
                    <div class=""><em>This post was updated on <time class="updated-on" datetime="<?php echo $updated_datetime_attr ?>"><?php echo $updated_datetime_val ?></time></em></div>
                    <div class="br"></div>
                    <div class="related rnd b">
                        <p>Like what you're reading? Read more articles about these topics.</p>
                        <div class='tags'>
                            <?php get_template_part('template-parts/meta/meta-tags'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </article>

    <?php endwhile; ?>

<?php else : get_template_part('template-parts/content-none') ?>
<?php endif ?>



<?php $related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories($post->ID),
        'posts_per_page' => 3,
        'post__not_in'   => array($post->ID)
    )
);
?>

<h2>Related articles</h2>
<div class="related-posts cols col-mid">



    <?php if ($related->have_posts()) : ?>

        <?php while ($related->have_posts()) : ?>
            <article class="post-preview gap" id="post-<?php the_ID(); ?>">
                <?php $related->the_post();
                locate_template('template-parts/content/content-listing.php', true, false, [
                    'title_char_limit' => $title_char_limit,
                    'excerpt_char_limit' => $excerpt_char_limit,
                ]); ?>

            </article>

        <?php endwhile;
        wp_reset_postdata(); ?>

    <?php endif ?>

</div>
<?php get_footer(); ?>