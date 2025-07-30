<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

if (!function_exists('setSidebar')) {
    function setSidebar(array $routes)
    {
        foreach ($routes as $route) {
            if (str_contains(Route::currentRouteName(), $route)) {
                return 'mm-active';
            }
        }
        return '';
    }
}

if (!function_exists('getCategories')) {
    function getCategories()
    {
        return Category::all();
    }
}

if (!function_exists('getCourseCategories')) {
    function getCourseCategories()
    {
        return Category::all(); // تستخدم نفس الموديل الموجود
    }
}
