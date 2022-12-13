<?php

/**
 * The Search Bar
 * 
 * @package CryptoExplainer
 */

if (is_search()) {
    $placeholder = 'Search again';
    $value = '';
} else {
    $placeholder = 'Enter keywords';
    $value = the_search_query();
}

?>

<form action="<?php echo esc_url(home_url('/')) ?>
" class="txt-mid">
    <input type="search" placeholder="<?php echo $placeholder ?>" value="<?php the_search_query() ?>" aria-label="search" name="s" onClick="formname.reset();">
    <input type="submit" value="Search" class="button gap">
</form>