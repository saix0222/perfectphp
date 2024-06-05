<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.127

class Employee
{
 //定数はconstで定義
 const PARTTIME = 0x01;
 const REGULAR = 0x02;
 const CONTRACT = 0x04;

 public function getCONTRACT()
 {
    return self::CONTRACT;
 }
}

//クラス定数はダブルコロンで呼び出し
echo Employee::REGULAR;

$yamada = new Employee();
echo $yamada->getCONTRACT();