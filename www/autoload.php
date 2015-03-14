<?php

    require __DIR__ . '/../vendor/autoload.php';

    function my_autoload($class)
    {
        if (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
            require __DIR__  . '/classes/' . $class . '.php';
        }
        if (file_exists(__DIR__ . '/views/' . $class . '.php')) {
            require __DIR__ . '/views/' . $class . '.php';
        }
        if (file_exists(__DIR__ . '/models/' . $class . '.php')) {
            require __DIR__ . '/models/' . $class . '.php';
        }
        if (file_exists(__DIR__ . '/controllers/' . $class . '.php')) {
            require __DIR__ . '/controllers/' . $class . '.php';
        }
        else {
            $classParts = explode('\\', $class);
            $classParts[0] = __DIR__;
            $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
            if (file_exists($path))
            {
                require $path;
            }
        }
    }

    spl_autoload_register('my_autoload');