<?php
/* 
Template part for if blog has no post or no such post exists.

@package CryptoExplainer
*/
?>

<div class="not-found">
    <h2>Nothing found</h2>
    <?php
    if (is_home() && current_user_can('publish_posts')) {
    ?>
        <p>
            <?php
            printf(
                wp_kses(
                    __('Ready to publish your first post? <a href="%s">Get started here</a>', 'cryptoexplainer'),
                    [
                        'a' => [
                            'href' => []
                        ]
                    ]
                ),
                esc_url(admin_url('post-new.php'))
            )
            ?>
        </p>
    <?php
    } elseif (is_search()) {
    ?>
        <p><?php esc_html_e('Sorry but nothing matched your search item. Please try again with some different keywords', 'cryptoexplainer'); ?></p>
    <?php
        get_search_form();
    } else {
    ?>
        <p><?php esc_html_e('It seems that we cannot find what you are looking for . Perhaps search can help', 'cryptoexplainer'); ?></p>
    <?php
        get_search_form();
    }
    ?>


</div>