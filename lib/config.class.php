<?php

class Config {
   
    protected static $settings = array();
  
    public static function get($key){
        return isset(self::$settings[$key]) ? self::$settings[$key] : NULL;
    }
    public static function set($key, $value){
        return self::$settings[$key] = $value;
    }
}