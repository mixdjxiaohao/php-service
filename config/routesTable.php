<?php
/**
 * Created by PhpStorm.
 * User: 27606
 * Date: 2021/8/28
 * Time: 23:58
 */

class routesTable{
    static function config(){
        return [
            [
                "path"=>"login",
                "controller"=>"login/ki",
                "requestType"=>"POST"
            ],
            [
                "path"=>"name",
                "controller"=>"login/getlogin",
                "requestType"=>"GET"
            ]
        ];
    }

}