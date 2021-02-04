<?php
require 'vendor/autoland.php';

use Guzzlehttp\Client;

function wite_data_to_csv(){
 $restaurants = [];
 $response = "hugahuga";
 if(isset($response["error"])){
     return print("エラーが発生しました");
 }
 if(isset($response["rest"])){
     foreach($response["rest"] as &$i){
     $resutaurant_name = $i["name"];
     $response[] = $resutaurant_name;
    }
 }
 return var_dump($restaurants);
}

wite_data_to_csv()
?>
