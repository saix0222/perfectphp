<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.134
//標準クラスとキャスト

//stdClassはプロパティやメソッドを持たない標準クラス
$obj = new stdClass(); //初期化
$obj->some_member = 1;

//他の型からオブジェクト型へキャストするとインスタンスになる
//スカラー値（整数型や文字列型）をキャストするとscalarというプロパティに値が入る
$var = 1;
$var_obj = (object)$var;
echo $var_obj->scalar, PHP_EOL;

//配列型をキャストすると配列のキーがプロパティ名になって値が入る
$array = array(
   'foo' => 2,
   'bar' => 3,
);
$array_obj = (object)$array;
echo $array_obj->foo, PHP_EOL;
//オブジェクト内のプロパティを調べる
var_dump(get_object_vars($array_obj));