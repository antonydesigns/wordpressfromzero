<?php

/**
 * Exclude all pages from search results
 */
if (!is_admin()) {
    function search_filter_pages($query)
    {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts', 'search_filter_pages');
}
