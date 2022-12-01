<?php

/**
 * Template for post entry header
 *
 * @package Cryptoexplainer
 */

?>

<a href="<?php echo esc_url(get_permalink()) ?>" class="entry-title">
    <h2><?php echo strip_tags(get_the_title()) ?></h2>
</a>