<?php

if (!function_exists('random_strings')) {
    // return string
    function  random_strings()
    {
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');

        $digits = range(0, 9);

        $special = ['!', '@', '#', '$', '%', '^', '*'];
        $chars = array_merge($lowercase, $uppercase, $digits, $special);

        $length = 6;

        do {
            $password = array();

            for ($i = 0; $i <= $length; $i++) {
                $int = rand(0, count($chars) - 1);
                $password[] = $chars[$int];
            }
        } while (empty(array_intersect($special, $password)));

        return implode('', $password);
    }
}
