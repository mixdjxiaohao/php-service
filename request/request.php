<?php
class request{
  static public  $file=array();
  static function get($request){
        return @$_GET[$request];
  }
  static function post($request){
        return @$_POST[$request];
  }
  static function file(){
        self::$file=@$_FILES;
        return new request;
  }
  static function move($path){
      $state=array("code"=>200,"data"=>[]);
      foreach (self::$file as $item){
          if(file_exists($path . $item["name"])){
              array_push($state["data"],$item["name"]."文件上传失败");
          }else{
              move_uploaded_file($item["tmp_name"], $path . $item["name"]);
              array_push($state["data"],["msg"=>$item["name"]."文件上传成功","path"=>$path . $item["name"]]);
          }
      };
      return $state;
  }
  static function uri(){
      return  $_SERVER["REQUEST_URI"];
  }
  static function methods(){
        return  $_SERVER['REQUEST_METHOD'];
  }
  static function IP(){
        return  isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
    }
}