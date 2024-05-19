<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.149 名前空間
//名前空間をつけることで名前の衝突を避けられる

//cake.phpをprogram.phpから参照

//名前空間の区切りはバックスラッシュ
//先頭にバックスラッシュをつけてグローバルな名前空間から参照

//名前空間の影響を受けるのはクラス、関数、定数（const）

namespace Project\Module;
class Directory {}   //Project\Module\Directory クラス
function file () {}  //Project\Module\file 関数
const E_ALL = 0x01;  //Project\Module\E_ALL 定数
$var = 0x01;

//上記はPHPによって定義済みの内容と名前が衝突している
//名前空間をつけることにより使える

// Project/Module/Directory.php から呼び出し

// 別の名前空間からの呼び出し　Other.php

// 名前空間のないところからの呼び出し　nospace.php

// 1つのファイルに複数の名前空間を定義
// twospace1.php、twospace2.php
// 2の方がよさそう