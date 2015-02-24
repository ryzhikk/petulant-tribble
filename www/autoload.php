<?php

function __autoload($class) {
    if (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
        require __DIR__  . '/classes/' . $class . '.php';
    }
    if (file_exists(__DIR__ . '/view/' . $class . '.php')) {
        require __DIR__ . '/view/' . $class . '.php';
    }
    if (file_exists(__DIR__ . '/models/' . $class . '.php')) {
        require __DIR__ . '/models/' . $class . '.php';
    }
}