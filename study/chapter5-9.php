<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.135
//抽象クラス

//抽象クラス＝共通の機能をまとめた親クラス
//特有の機能は子クラスで実装するような場合に使う
abstract class Employee
{
   //abstractをつけたメソッドは宣言のみ、実装はしない
   abstract public function work();

   //通常のメソッドも書ける
   public function sleep()
   {
      echo "寝てます", PHP_EOL;
   }
}

class Programmer extends Employee
{
   public function work()
   {
      echo "働いてます", PHP_EOL;
   }
}

//抽象クラス自体はインスタンス化できない
//$yamada = new Employee();

$yamada = new Programmer();
$yamada->work();

//通常のメソッドも、継承してインスタンス化して使用
$yamada->sleep();