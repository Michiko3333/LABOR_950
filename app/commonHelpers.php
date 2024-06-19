<?php

if (!function_exists('radioChecked')) {
    function radioChecked($v, $or)
    {
        return $v == $or ? 'checked' : '';
    }
}

if (!function_exists('err')) {
    function err($errors, $name, $i = null)
    {
        if (is_null($errors)) return '';
        if ($i !== null) {
            $name = $name . ".$i";
        }
        return $errors->has($name) ? 'error' : '';
    }
}

if (!function_exists('err_bind')) {
    function err_bind($array, $name, $i = null)
    {
        if ($i !== null) {
            $name = $name . ".$i";
        }
        return in_array($name, $array) ? 'error' : '';
    }
}
