<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
// 各変数の定義
$KEYID="f78811949d0a0fff24892518995269f5";
$HIT_PER_PAGE = 100;
$PREF = "PREF13";
$FREEWORD_CONDITION =1;
$FREWORD = "渋谷駅";

$PARAMS = array("keyid"=> $KEYID, "hit_per_page"=>$HIT_PER_PAGE, "pref"=>$PREF, "freeword_condition"=>$FREEWORD_CONDITION, "freeword"=>$FREWORD);
// 関数の定義引数＄params/
function write_data_to_csv($params){

    // 配列restrantsを作る
     $restaurants = [];
    //  インスタンスを作成
     $client = new Client();
    //  API情報を獲得
        try{
            $json_res = $client->request('GET',"https://api.gnavi.co.jp/RestSearchAPI/v3/",['query'=>$params])->getBody();
            // 処理が例外の場合はエラーを返す
        }catch(Exception $e){

            return print("エラーが発生しました");
        }
        // 数値を配列化して変数に入れる

        $response = json_decode($json_res,true);
        // 数値がエラーの場合はエラー表示を返す
        if(isset($response["error"])){
            return(print("エラーが発生しました!"));
        }
        // 項目ごとに配列のデータ
        foreach($response["rest"]as &$restaurant){
            $resutaurant_name= $restaurant["name"];
            $restaurants[] = $resutaurant_name;
        }
        $handle = fopen("restaurants_list.csv","wb");
        fputcsv($handle,$restaurants);
        fclose($handle);

        return print_r($restaurants);

        
    


    }
 

write_data_to_csv($PARAMS)
?>
