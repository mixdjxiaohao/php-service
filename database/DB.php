<?php
require_once ("./config/database.php");
class DB{
  static public $SQL_STRING="";
  static public $wherestate=false;
  static function connect(){
     return new mysqli(
         database::config()["host"],
         database::config()["username"],
         database::config()["password"],
         database::config()["database"]
      );
  }
    //查询条件
  static function table($table,$id){
      self::$SQL_STRING="";
      foreach (["SELECT",implode(",", $id),"FROM",$table] as $key => $value){
          self::$SQL_STRING=self::$SQL_STRING. " ".$value;
      };
      return new DB;
  }
  static function where($where){
        $whereJSon=array();
        self::$wherestate=true;
        foreach ($where as $key => $value){
            array_push($whereJSon,$key."="."'".$value."'");
        };
        self::$SQL_STRING=self::$SQL_STRING." where ".implode(" and ", $whereJSon);
        return new DB;
  }
  static function like($like){
        $likeJSon=array();
        $likestate=" where ";
        foreach ($like as $key => $value){
            array_push($likeJSon,$key." like "."'%".$value."%'"." ");
        };
        if(self::$wherestate === true){
            $likestate= " and ";
        };
        self::$SQL_STRING=self::$SQL_STRING.$likestate.implode(" and ", $likeJSon);
        return new DB;
  }
    //查询条件
    //update
  static function name($table){
        self::$SQL_STRING="";
        foreach (["update",$table," set "] as $key => $value){
            self::$SQL_STRING=self::$SQL_STRING. " ".$value;
        };
        return new DB;
  }
  static function values($values){
        $valuesJSon=array();
        foreach ($values as $key => $value){
            array_push($valuesJSon,$key." = "."'".$value."'"." ");
        };
        self::$SQL_STRING=self::$SQL_STRING.implode(" , ", $valuesJSon);
        return new DB;
   }
    //update
    //add
    //INSERT INTO table_name (列1, 列2,...) VALUES (值1, 值2,....)
    static function add($table,$keys){
        self::$SQL_STRING="";
        foreach (["INSERT INTO ",$table," (guid,".implode(",", $keys).") "] as $key => $value){
            self::$SQL_STRING=self::$SQL_STRING. " ".$value;
        };
        return new DB;
    }
    static function value($values){
        self::$SQL_STRING=self::$SQL_STRING."VALUES (uuid(),'".implode("','", $values)."')";
        return new DB;
    }
    //add
    //delete DELETE FROM 表名称 WHERE 列名称 = 值
    static function delete($table){
        self::$SQL_STRING="";
        foreach (["DELETE FROM ",$table] as $key => $value){
            self::$SQL_STRING=self::$SQL_STRING. " ".$value;
        };
        return new DB;
    }
    //delete
  static function  query(){
      $rows=self::connect()->query(self::$SQL_STRING);
      $json=array();
      if($rows === true){
          return json_encode(["code"=>200,"data"=>"数据添加成功"],true);
      };
      if($rows->num_rows > 0 ) {
          while ($row = $rows->fetch_assoc()){
              array_push($json,$row);
          };
          self::connect()->close();
         return json_encode(["code"=>200,"data"=>$json],true);
      };
      return json_encode(["code"=>404,"data"=>"无数据"],true);
  }
}