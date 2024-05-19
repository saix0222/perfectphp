<?php
// Project/Module/Directory.php

namespace Project\Module;

require_once('../../chapter5-14.php');
// namespaceを記載してもrequireは必要
// 参考：https://qiita.com/7968/items/1e5c61128fa495358c1f
// 名前空間とファイル名は全く関係ないものにできる
// 本に記載がないのでちょっと混乱したところ

$dir = new Directory();
// 同じ名前空間の中では、名前空間を省略できる
$dir = new \Project\Module\Directory();
// グローバルからの絶対指定もできる
