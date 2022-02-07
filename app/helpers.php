<?php

use Illuminate\Support\Str;

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'show' : '';
}

function activeClassByRoute($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

function slug($string)
{
    return Str::slug($string);
}

function unSlug($slug)
{
    return str_replace('-', ' ', $slug);
}

function badgeBool($val, $color = '', $text = '')
{
    if ($val) {
        $text = $text !== '' ? $text : 'Ya';
        $color = $color !== '' ? $color : 'success';
        return '<span class="badge badge-' . $color . '">' . $text . '</span>';
    }

    $text = $text !== '' ? $text : 'Tidak';
    $color = $color !== '' ? $color : 'dark';
    return '<span class="badge badge-' . $color . '">' . $text . '</span>';
}

function badge($color = '', $text = '')
{
    return '<span class="badge badge-' . $color . '">' . $text . '</span>';
}