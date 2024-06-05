<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.136
//インターフェイス

//インターフェイスとは、複数のクラスに共通の機能を実装するため
//実体を定義することなく指定する仕組みのこと

interface Reader
{
   //実体のあるメソッドは定義できない
   public function read();
}

interface Writer
{
   public function write($value);
}

//implementsキーワードで呼び出し　複数でもOK
class Configure implements Reader, Writer
{
   public function write($value)
   {
      //書き込みの処理
   }

   public function read()
   {
      //読み込みの処理
   }
}

//implementsしたら、そのメソッドを実装しないとエラーになる

//定義済インターフェイスには下記のようなものがあるよ
//iterator
//Recursiveiterator
//ArrayAccesss
//Serializable
//Countable

//インターフェイスのチェック
//インターフェイスを定義して、それを実装させることにより
//それを実装したクラスのオブジェクトに必ずその機能を実装させることができる
//PHPには型宣言がないのでそれをチェックする方法がある

//タイプヒンティング
class Foo
{
   //$itrはIteratorである必要がある
   public function bar (Iterator $itr)
   {
      return $itr->next();
   }
}

$class = new Foo();
//これだとエラー
//$class->bar(1);

//Iteratorインターフェイスを使ったクラスのオブジェクトしか引数に指定できない

//型演算子を使った方法

class Foo2
{
   public function bar($itr)
   {
      if($itr instanceof Iterator === false){
         throw new InvalidArgumentException('Interface Error');
      }
   }
}

//InvalidArgumentExceptionは引数の型が期待する型と一致しなかった場合に
//スローされる例外らしい
//つまり上記はそのエラーを判定して起こしているもの

//次はp.139　クラスとオブジェクトの機能と特徴