<?php
namespace Project\Module2;

require_once('twospace1.php');

//可変変数や可変関数や動的なクラス名など、変数に文字列を代入して
//動的に利用できるように、名前空間も動的に利用できる
$class_name = 'Project\Module2\SomeClass';
$obj = new $class_name(); // new Project\Module2\SomeClass()