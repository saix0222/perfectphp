<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.122

class Employee
{
    //クラス内で宣言する変数＝プロパティ
    public $name;
    public $state = '働いている';


    public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }
}

$yamada = new Employee();
$yamada->name = '山田';
echo $yamada->state,$yamada->name, 'さん：';
$yamada->work();



