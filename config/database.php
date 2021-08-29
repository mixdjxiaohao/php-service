<?php
/**
 * Created by PhpStorm.
 * User: 27606
 * Date: 2021/8/29
 * Time: 0:02
 */

class database{
   static function  config(){
       return [
          "host"     => "localhost",
          "username" => "root",
          "password" => "root",
          "database" => "shopping",
          "charset"  => "utf8"
       ];
   }
}