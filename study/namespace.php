<?php
//p.155 名前解決
// namespace.php

namespace Project\Module;

// 下記ファイルにクラスが定義されているものとする
require_once 'Foo/Bar/Baz.php';
require_once 'Hoge/Fuga.php';
require_once 'Module/Klass/Some.php';

use Foo\Bar as BBB;
use Hoge\Fuga;

class Piyo {    
    //コンストラクタ
    public function __construct()
    {
     echo ' Piyo ';
    }}

function some_func(){
    echo ' some_func ';
}

const SOME_CONST = 'SOME_CONST';

$obj1 = new \directory();
var_dump($obj1);
// 完全修飾なので、グローバルのDirectoryクラス

$obj2 = new BBB\Baz();
// エイリアスに基づいてコンパイル字にFoo\Bar\Bazクラスになる

$obj3 = new Fuga();
// use Hoge\Fuga;しているので
// インポートルールに基づいてコンパイル時にHoge\Fugaクラスになる

$obj4 = new Klass\some();
// 修飾名で該当するインポートルールがないため、
// コンパイル時に現在の名前空間である
// Project\Moduleが先頭につけられ、
// Project\Module\Klass\Someクラスと解釈される

$obj5 = new Piyo();
// 非修飾名で該当するインポートルールがないため、
// コンパイル時の変換はない
// 実行時に現在の名前空間が先頭に付与された
// Project\Module\Piyoクラスと解釈される

some_func();
// 実行時にProject\Module\some_func()関数を探し、
// なければグローバル関数を実行

echo BBB\SOME_CONST;

echo SOME_CONST;
