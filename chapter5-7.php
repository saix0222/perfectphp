<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.132
//継承

class Employee
{
   const PARTTIME = 0x01;
   const REGULAR = 0x02;
   const CONTRACT = 0x04;

   private $name; //名前用プロパティ
   private $type; //雇用形態用プロパティ

   public $salary = 20;
  
   //コンストラクタ
   public function __construct($name, $type)
   {
      $this->name = $name;
      $this->type = $type;
   }

   public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }

    public function getName()
    {
       return $this->name;
    }

    //finalキーワード
    //派生クラスでオーバーライドできなくなる
    public final function getSalary()
    {
      return $this->salary;
    }
}

class Programmer extends Employee
{
   public function __construct($name, $type)
   {
      //parentキーワード　親クラスを示す
      parent::__construct($name,$type);
   }

   //オーバーライド　親クラスのメソッドを子クラスで定義すること
   public function work($show = 'コンピュータで')
   //↓は親メソッドに引数がないからエラーになる
   //public function work($show)
   {
       echo $show,'プログラムを書いています', PHP_EOL;
   }

   //getSalaryはfinalがついているのでオーバーライドできない
   /*public function getSalary()
   {

   }*/
   
}

//継承するとprivateではないメソッドやプロパティを参照できる
//継承想定のものはprotectedにする→protectedでも外部からは呼べない

$yamada = new Programmer("山田",Programmer::CONTRACT);
$yamada->work();
echo $yamada->getName();