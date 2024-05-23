<?php
namespace Project\Module;
use Project\Module2 as Another;

require_once('twospace1.php');


//use によるエイリアスを動的な名前空間にはできない
$class_name = 'Another\SomeClass';
$obj = new $class_name(); // これはエラー