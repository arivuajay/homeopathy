<?php

class Myclass extends CController {

    public static function encrypt($value) {
        return hash("sha512", $value);
    }

    public static function refencryption($str) {
        return base64_encode($str);
    }

    public static function refdecryption($str) {
        return base64_decode($str);
    }

    public static function t($str = '', $params = array(), $dic = 'app') {
        return Yii::t($dic, $str, $params);
    }

    public static function getRandomString($length = 16) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //length:36
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function slugify($text) {
// replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
// trim
        $text = trim($text, '-');
// transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
// lowercase
        $text = strtolower($text);
// remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function getMedicineUnit($key=NULL) {
        $units = array('1' => 'ml', '2' => 'gms');
        if(isset($key) && $key != NULL)
            return $units[$key];
        
        return $units;
    }

}
