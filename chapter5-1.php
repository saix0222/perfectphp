<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.119

//クラス名はアッパーキャメル　※単語ごとに最初の1文字を大文字にする
//MyModuleというモジュールのコントローラ
class MyModule_Controller{}

class Employee
{
    public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }
}

//呼び出し
$yamada = new Employee(); //クラスをインスタンス化
$yamada->work(); //アロー演算子

$suzuki = $yamada; //参照渡し

//複製したい場合はこうする
$suzuki = clone $yamada;
//所感　これいつ使うんだろう？

//アクセス修飾子
// public $yamada->work()のようにクラスの外で呼べる
// private クラスの内側からのみ
// protected クラスの内側、継承したクラスの内側からのみ




