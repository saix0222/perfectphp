<?php
//p.161 参照

$a = 10;
$b =& $a;
$c = $a;

//$bに20を入れると$aも20になる
$b = 20;
echo $a;

echo '<br>';

//参照変数の扱い
$a = 10;
$ref =& $a;
$ref = 20;
echo $a, PHP_EOL; //20

//再代入
$a = 10;
$c = 20;
$ref =& $a; // $aの参照
$ref =& $c; // $aが$cの参照となるわけではなく、参照が上書き
$ref = 30;
echo '<br>';
echo $a, PHP_EOL;
echo '<br>';
echo $c, PHP_EOL;

echo '<br>';

//配列と参照
function array_pass($array){
    $array[0] *= 2;
    $array[1] *= 2;
}

function array_pass_ref(&$array){
    $array[0] *= 2;
    $array[1] *= 2;
}

unset($a);
unset($b);

$a = 10;
$b = 20;
$array = array($a,&$b);
array_pass($array);

echo '<br>';
echo $a, PHP_EOL; //10のまま
echo '<br>';
echo $b, PHP_EOL; //40になる

echo '<br>';

unset($a);
unset($b);

$a = 10;
$b = 20;
$array = array($a,$b); //この時点でコピーされてる
array_pass_ref($array);

echo '<br>';
echo $a, PHP_EOL; //10のまま
echo '<br>';
echo $b, PHP_EOL; //20のまま

var_dump($array); //こっちは変わってる

//p.164 オブジェクトの参照
//オブジェクトは参照でしか扱えない
//new演算子でインスタンス化→変数に代入（実際にはオブジェクトの参照）
//この変数を別の変数に代入（実際にはコピーではなく、参照のコピー）

$a = new stdClass(); //オブジェクトを表すIDを保持する値への参照
$b = $a; //そのIDをコピー

$c =& $a; //オブジェクトのIDを格納してある領域を参照している

//$aも$bも$cも同じオブジェクトを参照している
//一般的にはオブジェクトは参照渡ししない

