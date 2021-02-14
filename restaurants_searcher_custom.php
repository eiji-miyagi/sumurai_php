<?php
// phpのファイルvendor/autoload.phpの読み込み
require 'vendor/autoload.php';

use GuzzleHttp\Client;
// 各変数の定義
$KEYID="f78811949d0a0fff24892518995269f5";
$HIT_PER_PAGE = 100;
$PREF = "PREF13";
$FREEWORD_CONDITION =1;
$FREWORD = "渋谷駅";
// 連想配列＄PARAMSの作成

$PARAMS = array("keyid"=> $KEYID, "hit_per_page"=>$HIT_PER_PAGE, "pref"=>$PREF, "freeword_condition"=>$FREEWORD_CONDITION, "freeword"=>$FREWORD);
// 関数の定義、引数＄params/
function write_data_to_csv($params){

    // 配列restrantsを作る
     $restaurants = [["名称","住所","営業日","電話番号"]];
    //  インスタンスを作成
     $client = new Client();
    //  API情報を獲得
        try{
            // メソッドリクエストで処理→サイトのクエリ（質問）に引数を代入し、表示サイトへの情報をリクエスト、ゲットボディメソットで数値を取得
            $json_res = $client->request('GET',"https://api.gnavi.co.jp/RestSearchAPI/v3/",['query'=>$params])->getBody();
            // 処理が例外の場合はエラー表示を返す
        }catch(Exception $e){

            return print("エラーが発生しました");
        }
        // Json数値を連想配列化してレスポンス変数に入れる

        $response = json_decode($json_res,true);
        // 数値が空の場合はエラー表示を返す
        if(isset($response["error"])){
            return(print("エラーが発生しました!"));
        }
        // レスポンス配列のデータrestの項目を変数resutrantに一つづつ代入
        foreach($response["rest"]as &$restaurant){
            // 変数resutaurant_namenにrestaurant項目の”namen”の項を追加
            $rest_info=[$restaurant["name"],$restaurant["address"],$restaurant["opentime"],$restaurant["tel"]];
            // 配列restantsを作成し、resutrant_nameを入力
            $restaurants[] = $rest_info;
        }
        // 変数handleの指示、CSV形式のファイルを作る、モード書き出し、バイナリモード
        $handle = fopen("restaurants_list.csv","wb");
        // csv形式にフォーマットして変数resutantsと変数handleに書き込む
        foreach($restaurants as $values) {
            fputcsv($handle,$values);
        }
        
        // 変数handleの通信を閉じる
        fclose($handle);
        // 変数restrantsの結果内容を返す

        return print_r($restaurants);

        
    


    }
 
// 関数の実行引数＄PARAMS
write_data_to_csv($PARAMS)
?>
