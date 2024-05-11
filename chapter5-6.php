<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.130

class Employee
{
 const PARTTIME = 0x01;
 const REGULAR = 0x02;
 const CONTRACT = 0x04;

 private $name; //名前用プロパティ
 private $type; //雇用形態用プロパティ

 //コンストラクタ
 public function __construct($name, $type)
 {
    $this->name = $name;
    $this->type = $type;
 }
}

//コンストラクタに引数を渡す
$yamada = new Employee('山田', Employee::REGULAR);

//権限はなるべく小さくする
//値が変わらないものは定数に
//変数もなるべくprivateに

//アンダースコア２つ__で始まるメソッドはマジックメソッドと呼ぶ

