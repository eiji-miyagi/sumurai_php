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

?>