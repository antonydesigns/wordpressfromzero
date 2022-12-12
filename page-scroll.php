<?php

/**
 * Blog loadmore page
 * 
 * @package CryptoExplainer
 */

use CryptoExplainer\Inc\Classes\LoadMorePosts;

$loadmore = LoadMorePosts::instantiate();
?>

<?php get_header(); ?>

<?php $loadmore->post_script_load_more() ?>

<?php get_footer(); ?>