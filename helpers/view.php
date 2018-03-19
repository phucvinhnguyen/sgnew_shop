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
        $access_token = Request::has('access_token') ? Request::get('access_token') : '';
        $query = Request::all();

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