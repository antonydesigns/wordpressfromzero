<?php

add_action('wp_ajax_google_me', 'google_me');
add_action('wp_ajax_nopriv_google_me', 'google_me');

function google_me()
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
