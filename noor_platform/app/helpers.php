<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('setSidebar')) {
    function setSidebar(array $routes)
    {
        foreach ($routes as $route) {
            if (str_contains(Route::currentRouteName(), $route)) {
            return 'mm-active'; // c
            }
        }
        return '';
    }
}