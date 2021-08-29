<?php
class RedisConfig{
  static  public  $connect=unll;
  static function run(){
      $redis = new Redis();
      $redis->connect('127.0.0.1', 6379);
      self::$connect=$redis;;
  }
  static function set($key,$value){
      self::$connect->set($key, $value);
  }
    static function get($key){
       return self::$connect->get($key);
    }
}