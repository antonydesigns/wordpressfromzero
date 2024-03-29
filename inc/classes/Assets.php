<?php
/*
Assets (Styles and Scripts)

@package CryptoExplainer 
*/

namespace CryptoExplainer\Inc\Classes;

use CryptoExplainer\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {


        $this->hooks();
    }

    protected function hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_register_style('starter', get_template_directory_uri() . '/assets/starter.css', [], filemtime(get_template_directory() . '/assets/starter.css'), 'all');
        wp_register_style('style', get_template_directory_uri() . '/assets/style.css', [], filemtime(get_template_directory() . '/style.css'), 'all');

        wp_enqueue_style('starter');
        wp_enqueue_style('style');
    }

    public function register_scripts()
    {

        wp_register_script('main', get_template_directory_uri() . '/assets/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/main.js'), true);
        wp_register_script('loadmore', get_template_directory_uri() . '/assets/loadmore.js', ['jquery'], filemtime(get_template_directory() . '/assets/loadmore.js'), true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('main');
        wp_enqueue_script('loadmore');


        wp_localize_script(
            'main',
            'ajax',
            array('ajaxurl' => admin_url('admin-ajax.php'))
        );

        wp_localize_script(
            'loadmore',
            'ajax',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'ajaxnonce' => wp_create_nonce('loadmore_nonce')
            )
        );
    }
}
