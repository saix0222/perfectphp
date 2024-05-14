<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.139
//クラスとオブジェクトの機能と特徴

//マジックメソッド
//特定の条件で自動的に呼び出されるメソッドのこと
//定義しなければ何も起きない
//必ずpublicで定義

class Employee
{
   //toString　オブジェクトを文字列にキャストしようとした時に呼び出される
   //明示的なキャストではなく、自動キャストが発生した時にも呼び出される　※echoなど
   public function __toString()
   {
      return 'This Class is:'. __CLASS__;
   }
}

$yamada = new Employee();
echo $yamada;


//オーバーロード
//未実装などのプロパティやメソッドが参照されたときにエラーが発生する挙動を
//get、set、isset、unset、call、callStaticを使ってオーバーロードできる

class SomeClass
{
   private $values = array(); //privateな値を保存するコンテナ

   //privateなコンテナへのアクセサ（getter）
   public function __get($name){
      echo "get: $name", PHP_EOL;
      if (!isset($this->values[$name])){
         throw new OutOfBoundsException($name . " not found.");
      }
      return $this->values[$name];
   }

   //priavateなコンテナへのアクセサ（setter）
   public function __set($name, $value)
   {
      echo "set: $name setted to $value", PHP_EOL;
      $this->values[$name] = $value;
   }

   public function __isset($name)
   {
      echo "isset: $name", PHP_EOL;
      return isset($this->values[$name]);
   }

   public function __unset($name)
   {
      echo "unset: $name", PHP_EOL;
      unset($this->values[$name]);
   }

   public function __call($name, $args)
   {
      echo "call: $name", PHP_EOL;

      //アンダースコアをつけ、メソッド名とする
      $method_name = '_' . $name;
      if(!is_callable(array($this, $method_name))){
         throw new BadMethodCallExeption($name . "method not found.");
      }
         return call_user_func_array(array($this, $method_name), $args);
   }

   public static function __callstatic($name, $args)
   {
      echo "callStatic: $name", PHP_EOL;

      $method_name = '_'. $name;
      if(!is_callable(array('self', $method_name))){
         throw new BadMethodCallExeption($name . "method not found.");
      }
      return call_user_func_array(array('self', $method_name), $args);
   }

   private function _bar($value)
   {
      echo "bar called with arg '$value'", PHP_EOL;
   }

   private static function _staticBar($value)
   {
      echo "staticBar called with arg '$value'", PHP_EOL;
   }
}

echo "<br>";

$obj = new SomeClass();
$obj->foo = 10;

echo "<br>";

var_dump($obj->foo);

echo "<br>";

//issetは__issetメソッドが呼ばれる
var_dump(isset($obj->foo));

echo "<br>";

//emptyはissetの後に__issetと__getが呼ばれる
var_dump(empty($obj->foo));

echo "<br>";

unset($obj->foo);

echo "<br>";

var_dump(isset($obj->foo));

echo "<br>";

$obj->bar('baz');

echo "<br>";

SomeClass::staticBar('baz');

//次はp.146 遅延静的束縛