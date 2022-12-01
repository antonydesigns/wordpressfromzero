<?php
/*
Loads all the theme classes

@package CryptoExplainer 
*/

namespace CryptoExplainer\Inc\Classes;

use CryptoExplainer\Inc\Traits\Singleton;

class ThemeControl
{
    use Singleton;

    protected function __construct()
    {

        Assets::instantiate();
        Menus::instantiate(); // we need this to enable editing the menu in Customizer

        $this->hooks();
    }

    protected function hooks()
    {
        add_action('after_setup_theme', [$this, 'theme_supports']);
    }

    public function theme_supports()
    {
        add_theme_support('title-tag');

        add_theme_support('custom-logo');

        add_theme_support('custom-background', [
            'default-color' => '#CBCBCB',
        ]);

        add_theme_support('post-thumbnails');

        /* add_image_size("featured-thumbnail", 350, 233, true); */

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support(
            'html5',
            ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']
        );

        add_editor_style();

        add_theme_support('align-wide');

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }
    }
}
