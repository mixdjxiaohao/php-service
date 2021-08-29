<?php
require_once("./request/request.php");
require_once ("./error/error.php");
class redirect{
  static public  $list=array();
  static function  router($path,$method,$state){
      $url_path= explode("/", request::uri())[count(explode("/", request::uri()))-1];
      if($state === request::methods() && $path === $url_path){
          self::$list=scandir('./application');
          $methodbody =explode("/",$method)[0];
          $method=explode("/",$method)[count(explode("/",$method))-1];
          foreach (self::$list as $key => $value){
              if($methodbody === explode(".",$value)[0]){
                  require_once("./application/".$value);
                  echo $methodbody::$method(new request);
              }
          }
      }else{
          echo error::router_error();
          return;
      }
  }
}