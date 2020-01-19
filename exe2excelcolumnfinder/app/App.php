<?php

namespace app;

class App
{
    public static function NumToLetters($num, $uppercase = true) {
        $letters = '';
        while ($num > 0) {
            $code = ($num % 26 == 0) ? 26 : $num % 26;
            $letters .= chr($code + 64);
            $num = ($num - $code) / 26;
        }
        return ($uppercase) ? strtoupper(strrev($letters)) : strrev($letters);
    }

    public static function LettersToNum($letters) {
        $num = 0;
        $arr = array_reverse(str_split($letters));
    
        for ($i = 0; $i < count($arr); $i++) {
            $num += (ord(strtolower($arr[$i])) - 96) * (pow(26,$i));
        }
        return $num;
    }
}