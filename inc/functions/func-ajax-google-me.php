<?php

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
