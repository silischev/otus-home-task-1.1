<?php

namespace  Asil\Otus\HomeTask_1_1\Helpers;


class CleanLineHelper
{
    /**
     * Clean string from valid special characters
     * @param string $line
     * @return string
     */
    public static function clean(string $line)
    {
        $specialCharacters = ['\\t', '\\n', '\\r', ' ', chr(13), chr(10)];
        return str_replace($specialCharacters, '', $line);
    }
}