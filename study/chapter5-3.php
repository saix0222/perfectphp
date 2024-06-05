<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.124

class Employee
{
    public $name;
    private $state = '働いている';
    //privateなのでクラスの内側からしかアクセスできないようにする
    public static $company = '技評技術社';
    //staticなのでダブルコロンでインスタンス化しなくても呼べる

    //privateなプロパティを呼び出す
    public function getState()
    {
        return $this->state;
    }

    //privateなプロパティを書きかえる
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCompany()
    {
        return self::$company;
        //return Employee::$company;  こうでもOK
        //staticは$this->company;では呼び出せない
    }

    public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }
}

$yamada = new Employee();
$yamada->name = '山田';
$yamada->setState('休憩している');
echo $yamada->name, 'さんは',$yamada->getstate(),PHP_EOL;

//クラス定義字に宣言してないプロパティ
$yamada->job = 'プログラマ';
//publicになる　あんまりやらない方がいい

//staticプロパティ
//インスタンス化しなくても読み書きすることができる
//ダブルコロン::をつけてアクセス

echo '従業員はみんな',Employee::$company,'に努めています', PHP_EOL;

//Singletonパターンでインスタンスを保持するために利用される等
//↑よくわかんない
//調べた　デザインパターンの1つで、インスタンスを1つにしたい時に使えるっぽい
//Gang of Four（以下GoF）
//『オブジェクト指向における再利用のためのデザインパターン』
//今じゃなくてよさそうだけどいつか勉強したい

echo $yamada->getCompany();