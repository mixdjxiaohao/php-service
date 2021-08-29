<?php
require_once ("redirect.php");
require_once ("./config/routesTable.php");
require_once ("./file/log.php");
  class  config{
      static function config_route(){
          $url_path= explode("/", request::uri())[count(explode("/", request::uri()))-1];
          log::write(request::uri(),"[".request::methods()."]"."==>".request::IP());
          foreach (routesTable::config() as $item){
              if($url_path === $item["path"]){
                  redirect::router($item["path"],$item["controller"],$item["requestType"]);
              };
          }
      }
  }
?>