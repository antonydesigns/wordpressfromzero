<?php
/* 
Theme functions

@package CryptoExplainer
*/

// Theme classes and autoloader

require_once(get_template_directory() . "./inc/helpers/autoloader.php");

use CryptoExplainer\Inc\Classes as Classes;

function instantiate_theme()
{
    Classes\ThemeControl::instantiate();
}
instantiate_theme();

// Functions

require_once(get_template_directory() . "./inc/functions/a-user-defined-vars.php");
require_once(get_template_directory() . "./inc/functions/func-author.php");
require_once(get_template_directory() . "./inc/functions/func-post-time.php");
require_once(get_template_directory() . "./inc/functions/func-post-title.php");
require_once(get_template_directory() . "./inc/functions/func-post-excerpt.php");
require_once(get_template_directory() . "./inc/functions/func-pagination.php");

add_action('wp_ajax_php_ajax_function', 'php_ajax_function');
add_action('wp_ajax_nopriv_php_ajax_function', 'php_ajax_function');


function php_ajax_function()
{
    if (isset($_REQUEST)) {
        $name = strtolower($_REQUEST['name']);
        switch ($name) {
            case 'ursula';
                echo ucfirst($name) . " is cute!";
                break;
            case 'gio';
                echo ucfirst($name) . " is smart.";
                break;
            case 'marco';
                echo ucfirst($name) . " is creative.";
                break;
            case 'anton';
                echo ucfirst($name) . " is pecicilan.";
                break;
        }
    }

    die();
}
