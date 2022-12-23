<?php

/**
 * Template part - categories & tags
 *
 * To be used inside of WordPress The Loop.
 *
 * @package CryptoExplainer
 */


$the_post_id   = get_the_ID();
$post_tags = wp_get_post_terms($the_post_id, ['post_tag']);
if (empty($post_tags) || !is_array($post_tags)) {
    return;
}

?>

<?php
foreach ($post_tags as $key => $post_tag) : ?>
    <a class="tag-link rnd b gap gapy" href="<?php echo esc_url(get_term_link($post_tag)) ?>">
        <?php
        echo  esc_html($post_tag->name);
        ?>
    </a>
<?php endforeach
?>