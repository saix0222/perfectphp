<?php
namespace Project\Module2;

require_once('twospace1.php');

//ダブルクオートの場合は\がエスケープ文字としてみなされるため
//\\とする
//シングルクオートで囲う場合に末尾に名前空間区切り（\）が
//くる場合、末尾のシングルクオートのエスケープと判断されないために
//\\とする必要がある
$namespace = "Project\\Module2\\";
$class_name = "SomeClass";
$class_name_with_ns = $namespace.$class_name;

$obj = new $class_name_with_ns(); // new Project\Module2\SomeClass()