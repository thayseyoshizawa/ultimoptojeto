<?php
    if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }
    }

    spl_autoload_register(function ($class_name) {
        // BASE PATH correto
        $base_path = __DIR__ . '/';
        
        if($class_name == "BD") {
            require $base_path . 'model/' . $class_name . '.php';
        }
        else if(str_contains($class_name, "DAO")) {
            require $base_path . 'model/dao/' . $class_name . '.php';
        }
        else {
            require $base_path . 'model/bean/' . $class_name . '.php';
        }
    });