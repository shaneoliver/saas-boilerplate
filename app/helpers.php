<?php

/**
 * Return the active class if is on the current page
 */
if(! function_exists('is_active_page')) {
    function is_active_page($path, $class = ' active')
    {
        return request()->is($path) ? $class : '';
    }
}