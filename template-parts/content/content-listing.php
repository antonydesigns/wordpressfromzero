<?php

/**
 * Template part for pages that display content previews
 *
 * To be used inside WordPress The Loop.
 *
 * @package CryptoExplainer
 */


$x = wp_parse_args(
    $args,
    [
        'title_char_limit' => 60,
        'excerpt_char_limit' => 200
    ]
) // default value
?>

<?php // Loading post meta-data

$post_author = cryptoexplainer_post_author();
$author_url = $post_author['author_url'];
$author_name = $post_author['author_name'];

$post_date = cryptoexplainer_post_time();
$datetime_attr = $post_date['datetime_attr'];
$datetime_val = $post_date['datetime_val'];
$date_archive_permalink = $post_date['date_archive_permalink'];

$post_link = esc_url(get_permalink());
$post_title = strip_tags(get_cryptoexplainer_title($x['title_char_limit']));
$post_thumbnail = get_the_post_thumbnail(null, 'post-thumbnail', array('loading' => 'lazy'));
$excerpt = get_cryptoexplainer_excerpt($x['excerpt_char_limit']);
?>

<!-- The Markup -->

<div class="gap">
    <a href="<?php echo $post_link; ?>">
        <figure class="post-thumbnail">
            <?php echo $post_thumbnail; ?>
        </figure>
    </a>

</div>

<div class="post-info gap">
    <a href="<?php echo $post_link ?>" class="post-preview-title gapy">
        <h2><?php echo $post_title ?></h2>
    </a>
    <div class="post-preview-content gapy">
        <p><?php echo $excerpt ?></p>
    </div>
    <div class="post-preview-meta gapy">
        <p>&mdash;&mdash;
            <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>,
            <a href="<?php echo $date_archive_permalink ?>">
                <time class="posted-on" datetime="<?php echo $datetime_attr ?>"><?php echo $datetime_val ?>
                </time>
            </a>
        </p>
    </div>
</div>