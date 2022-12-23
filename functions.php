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
require_once(get_template_directory() . "./inc/functions/func-search-exclude.php");
get_template_part("inc/functions/func-ajax-google-me");
get_template_part("inc/functions/func-ajax-loadmore");
get_template_part("template-parts/meta/meta-breadcrumbs");
