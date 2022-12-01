<?php

/**
 * Template part - categories & tags
 *
 * To be used inside of WordPress The Loop.
 *
 * @package CryptoExplainer
 */


$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, ['post_tag']);
if (empty($article_terms) || !is_array($article_terms)) {
    return;
}

?>

<?php
foreach ($article_terms as $key => $article_term) : ?>
    <a class="tag-link rnd b gap gapy" href="<?php echo esc_url(get_term_link($article_term)) ?>">
        <?php
        echo  esc_html($article_term->name);
        ?>
    </a>
<?php endforeach
?>