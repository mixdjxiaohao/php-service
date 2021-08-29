<?php
class file{
    static public $open=null;
    static function open($open,$power){
        self::$open=fopen($open, $power);
        return new file;
    }
    static function write($content){
        fwrite(self::$open, $content);
        fclose(self::$open);
        return ["msg"=>"写入成功"];
    }
}