<?php
#パーフェクトPHP 4章

#p.110
#コールバック関数
$array = array(1, 1.5, "2", true,);
$new_array = array_map('strval', $array);
var_dump($new_array);


#p.111
#可変関数
function func_caller($name)
{
    if(function_exists($name)){
        $name();
    }
}

function foo()
{
    echo 'foo called', PHP_EOL;
}

func_caller('foo'); //foo called
$name = 'foo';
$name();

#p.112
#call_user_funcとcall_user_func_array

function add ($v1, $v2)
{
    return $v1 + $v2;
}

class Math 
{
     public function sub($v1, $v2)
     {
        return $v1 - $v2;
     }

     public static function add($v1, $v2)
     {
        return $v1 + $v2;
     }

}

echo "<br>";

// call_user func()関数
// コールバック関数の指定に続いて引数を指定する
echo call_user_func('add', 1,2);

echo "<br>";

//無名関数も指定できる
echo call_user_func(function ($v1, $v2){ return $v1 + $v2;}, 1,2);

echo "<br>";

//staticメソッドの場合　クラス名を文字列で指定できる
echo call_user_func(array('Math','add'),1,2);

echo "<br>";

//staticメソッドの場合::でも指定できる
echo call_user_func('Math::add',1,2);

echo "<br>";

//インスタンス変数とメソッド名を指定する場合
$math = new Math();
echo call_user_func(array($math, 'sub'),1,2);

echo "<br>";

//call_user_func_array()では、第二引数に配列で引数のリストを指定
echo call_user_func_array('add', array(1,2));

echo "<br>";
echo call_user_func_array(array($math, 'sub'), array(1,2));

echo "<br>";

//p.114
//参照渡し

function add_one(&$value)
{
    $value += 1;
}

$a = 10;
add_one($a);

echo $a,PHP_EOL;

function &add_one2(&$value)
{
    $value += 1;
    return $value;
}

$a = 10;
$b = &add_one2($a);
$b += 1;

echo $a, PHP_EOL;

//所感
//あんまり使いたくない
//jsで意図せず参照渡しになってて困ったことある気がする

//無名関数
$add = function($v1, $v2)
{
    return $v1 + $v2;
};

echo "<br>";
var_dump($add);

$array = array(
    '"ダブルクオート"',
    '<tag>',
    '\'シングルクオート\'',
);

$escaped = array_map(function($value){
    return htmlspecialchars($value, ENT_QUOTES);
}, $array);

var_dump($escaped);

//p.115
//クロージャ

$my_pow = function($times = 2)
{
    return function ($v) use (&$times)
    {
        return pow($v, $times);
    };
};

//3がuseに渡される
$cube = $my_pow(3);

echo '<br>';
echo $cube(1),PHP_EOL;
echo '<br>';
echo $cube(2),PHP_EOL;
echo '<br>';
echo $cube(4),PHP_EOL;
echo '<br>';
echo $cube(8),PHP_EOL;

//これは使い道ありそうだけど全然思いつかないな

//レガシーな無名関数　create_function()
$array= array(1,2,3,4,5,);
//配列を2倍にする実装　昔はこうだった
//PHP8.0で削除されたから下記は今はエラーが出るよ
//array_map(create_function('$v','return $v + 2;'), $array);

//モダン（？）と言っていいかわからんけど無名関数だとこう
var_dump(array_map(function ($v){return $v + 2;}, $array));

//次からクラスに入るよ～（10年遅い気もする）





