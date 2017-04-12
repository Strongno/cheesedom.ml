<?php
//var_dump(ROOT);
function __autoload($class_name)
{
    # List all the class directories in the array.
    $array_paths = array(
        '/codels/',
        '/components/',
		'/models/'
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
		
		//print_r($path);
        if (is_file($path)) {
            include_once $path;
        }
    }
}