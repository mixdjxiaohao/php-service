<?php
require_once("./database/DB.php");
require_once("./redis/RedisConfig.php");
class login{
   static function ki($request){
       //DB::name("help_category")->values(["name"=>"Administration"])->where(["help_category_id"=>2])->query();
       //DB::add("commodity_category",["name"])->value(["name"=>"jjjj"])->query()
       //DB::delete("commodity_category")->where(["name"=>"jjjj"])->query();
       //DB::table("commodity_category",["*"])->like(["id"=>"6"])->query();
       //$request->file()->move("upload/")
       //  return DB::table("commodity_category",["*"])->like(["id"=>"6"])->query();
//       RedisConfig::run();
//       RedisConfig::get("guid");
//       RedisConfig::set("guid","hhhhhh");
       return "我是登录接口";
   }
   static function getlogin(){
       return "";
   }
}