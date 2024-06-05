<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.128

class Employee
{
   private static $company = '技評技術社';

 public static function getCompany()
 {
    return self::$company;
 }

 public static function setCompany($value)
 {
   self::$company = $value;
 }
}

//staticメソッド
//staticをつけて宣言されたメソッドはstaticプロパティと同様に
//インスタンス化されていなくても呼び出せる
//staticメソッドの中では$thisは使えない

//社名の出力
echo Employee::getCompany(), PHP_EOL;

//社名が変わった時
Employee::setCompany('技術評論社');
echo Employee::getCompany(), PHP_EOL;