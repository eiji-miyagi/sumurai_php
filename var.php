<?php
$name = "変数の練習 ";
function hoge(){
    global $name;
    print($name);
}
print($name."\n");
hoge();
$data =[1,399,"仁","義"];
foreach($data as &$d){
    print($d."\n");
}
function triangle_area($a,$h){
    return  $a*$h/2;
}

print(triangle_area(2,3));

$file_list = [];

function addlist($hoge){
global $file_list;
$file_name = $hoge.".php";
array_push($file_name);
}

for($i=1; $i <=100; $i++ ){
    if($i%3==0){
        print("bazz"."\n");
    }
    if($i%5==0){
        print("fizz"."\n");
    }else{
        print($i."\n");

    }
}
class Hoge{
    public function hello(){
        print("hello PHP!");
    }
}
?>