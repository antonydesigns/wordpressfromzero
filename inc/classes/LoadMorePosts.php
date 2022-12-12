<?php

/**
 * 
 * Load more posts
 * 
 * @package CryptoExplainer
 */

namespace CryptoExplainer\Inc\Classes;

use CryptoExplainer\Inc\Traits\Singleton;
use \WP_Query;

class LoadMorePosts
{

    use Singleton;

    public function __construct()
    {
        $this->hooks();
    }

    public function hooks()
    {
        add_action('wp_ajax_nopriv_loadmore', [$this, 'ajax_script_loadmore']);
        add_action('wp_ajax_loadmore', [$this, 'ajax_script_loadmore']);
    }

    public function ajax_script_loadmore($initial_request = false)
    {
        // Check if it's an ajax call.
        $is_ajax_request = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        /**
         * Page number.
         * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
         * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
         */
        $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
        $page_no = !empty($_POST['page']) ? filter_var($_POST['page'], FILTER_VALIDATE_INT) + 1 : $page_no;


        // Default Argument.
        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 3, // Number of posts per page - default
            'paged'          => $page_no,
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            // Loop Posts.
            while ($query->have_posts()) {
                $query->the_post();
                // require_once(get_template_directory() . "./inc/functions/a-user-defined-vars.php");
                locate_template('template-parts/content/content-listing.php', true, false, [
                    'title_char_limit' => 60,
                    'excerpt_char_limit' => 200,
                ]);
            }

            // Pagination for Google.
            /* if (!$is_ajax_request) :
                $total_pages = $query->max_num_pages;
                get_template_part('template-parts/common/pagination', null, [
                    'total_pages'  => $total_pages,
                    'current_page' => $page_no,
                ]);
            endif; */
        } else {
            // Return response as zero, when no post found.
            wp_die('0');
        }

        wp_reset_postdata();

        // Check if its an ajax call, and not initial request

        if ($is_ajax_request && !$initial_request) {
            wp_die();
        }
    }

    /**
     * Initial posts display
     */
    public function post_script_load_more()
    {

        // Initial Post Load.
?>
        <div class="load-more-content-wrap">
            <div id="load-more-content" class="row">
                <?php
                $this->ajax_script_loadmore(true);

                // If user is not in editor and on page one, show the load more.
                ?>
            </div>
            <button id="load-more" data-page="1" class="load-more-btn my-4 d-flex flex-column mx-auto px-4 py-2 border-0 bg-transparent">
                <span><?php esc_html_e('Loading...', 'text-domain'); ?></span>
                <?php // get_template_part('template-parts/svgs/loading'); 
                ?>
            </button>
        </div>
<?php }
}
