<?php
/*  Naming Standard:

* Classes and Traits have their own respective directories.
* Classes and Traits must be named with CapitalCamelCase.
* Namespaces must match directory structure of the Theme.

*/

function autoload($class)
{

    $namespace_root = 'CryptoExplainer';

    // Check if class has the CryptoExplainer namespace root.

    if (strpos($class, $namespace_root) !== 0) {
        return;
    }

    // Jump one dir above template directory
    // Use the namespace root name as the template directory root name.

    $template     = get_template();
    $theme_root   = get_theme_root($template);
    $path = $theme_root . '/' . strtolower($class) . '.php';

    require $path;
}

spl_autoload_register('autoload');
