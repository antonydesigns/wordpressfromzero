<?php

/**
 * Template part for author info
 *
 * @package CryptoExplainer
 */

$post_author = cryptoexplainer_post_author();
$author_url = $post_author['author_url'];
$author_name = $post_author['author_name'];
?>

<div class="author">
    <a href="<?php echo $author_url ?>"><?php echo $author_name ?></a>
</div>