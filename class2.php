<?php
#ヒューマンクラスを作成
class Human
{
    public static $class_call_count = 0;
    public static $str = null;
    public static $num = 0;
   
   
    static $class_name = "Human";
    function init(){
        $this->name = null;
        $this->address = null;
    }
    public function show() {
        print($this->name."\n");
        print($this->address);
    }
     #Humanクラスのインスタンスが作られるたびに、class_call_countが増えていく

     function __construct(){
        self::$class_call_count += 1;
    }
   
   
}
#ヒューマンクラスのインスタンスを作成
$human = new human();
#ヒューマンクラスのインスタンス変数nameに大泉という文字列を追加する。
$human->name = "大泉";

$human->show();
// #ターミナルには「大泉」と出される
print(human::$class_name);
#ターミナルにはHumanと出される
new Human();
print Human::$class_call_count;
#=2
new Human();
print Human::$class_call_count;
#=3
new Human();
print Human::$class_call_count;

#=4
Human::$str ="Hello";
Human::$num =42;

print(Human::$str."\n");
print(Human::$num);

class Hoge
{
    function __construct(){
        $this->name = "田中";
        $this->age = 46;
    }

}

$hoge =new Hoge();
$hoge->name = "山田";
$hoge->age = 54;

print($hoge->name);
print($hoge->age);
$hoge2 =new Hoge();
$hoge2 ->name = "藤村";
print($hoge2->name);

class Actor extends Human{}
$actor = new Actor();
$actor ->name = "大泉";
$actor ->address = "北海道";

$actor ->show();


?>