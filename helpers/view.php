<?php

if(! function_exists("isActiveRoute"))
{
    function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }

        return '';
    }
}

if(! function_exists("canActiveRoute"))
{
    function canActiveRoute($path, $output = 'active')
    {
        if(strpos(url()->current(), $path) !== false) {
            return $output;
        }

        return '';
    }
}

if(! function_exists("routeQuery"))
{
    function routeQuery($route)
    {
        $phone = Request::has('phone') ? Request::get('phone') : '';

        $query['phone'] = $phone;

        return route($route).'?'.http_build_query($query);
    }
}

if(! function_exists("parseSex"))
{
    function parseSex($input)
    {
        return $input === 1 ? '<span class="label bg-success">Nam</span>': '<span class="label bg-danger">Nữ</i></span>';
    }
}

if (!function_exists('formatMoney')) {
    function formatMoney($input) {
        return number_format($input, 0, '.', ','). ' VNĐ';
    }
}

if (!function_exists('sumArrayColumn')) {
    function sumArrayColumn($array, $column) {
        return array_sum(array_column($array, $column));
    }
}