<?php

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

// دالة لجعل النص أول حرف منه كبير والباقي صغير
if (!function_exists('title_case')) {
    function title_case($string)
    {
        return Str::title($string);
    }
}

// دالة ترجع الوقت الحالي بتنسيق معين
if (!function_exists('current_time')) {
    function current_time($format = 'Y-m-d H:i:s')
    {
        return Carbon::now()->format($format);
    }
}

// دالة لفحص إذا الرابط يبدأ بـ http
if (!function_exists('is_valid_url')) {
    function is_valid_url($url)
    {
        return Str::startsWith($url, ['http://', 'https://']);
    }
}
