<?php
require_once ("file.php");
class log{
  static function write($path,$str){
      file::open("log/".date("Y-m-d").".log","a")->write($path."=>".date("Y-m-d h:i:sa")."=>".$str."\n");
  }
}