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

function array_ref(&$array){
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
echo $a, PHP_EOL;
echo '<br>';
echo $b, PHP_EOL;