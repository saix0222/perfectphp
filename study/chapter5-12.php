<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.146 遅延静的束縛
//継承されたクラスのメソッドを親クラスで解決するための機能

class Foo{
   public function helloGateway()
   {
      //下記だと子メソッドから呼んだ時にオーバーライドしたメソッドが呼べない
      //self::hello();
      //下記にするとオーバーライドしたメソッドを親から呼べる
      static::hello();
   }

   public static function hello()
   {
      echo __CLASS__, 'hello!foo', PHP_EOL;
   }
}

class Bar extends Foo{
   public static function hello()
   {
      //Fooを継承しているのにBarではなくFooが表示される
      echo __CLASS__, 'hello!bar', PHP_EOL;
   }
}

$bar = new Bar();
$bar->helloGateway();