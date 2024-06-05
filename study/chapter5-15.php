<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.149 インポートルール
// useで別の名前空間やクラスをインポートできる
// asで別名をつけることができる
// 定数と関数はuseは使えない

namespace Project\Module;
use project\Module2 as AnotherModule;
// asを使わない場合は use Project\Module2 as Module2; と等価

require_once('twospace1.php');

$obj = new AnotherModule\SomeClass();


use \Directory;
// use \Directory as Directoryと等価
// グローバルなクラスに\なしでアクセスできる

$dir = new Directory('./');
var_dump($dir);

// 別の名前空間に定義されたBazクラスを
// Bazという名前でアクセスできるようにする
use Foo\Bar\Baz;

$baz = new Baz();