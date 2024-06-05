<?php
//パーフェクトphp 5章　クラスとオブジェクト

//p.147 オートロード
//定義されていないっクラスを使おうとしたときに
//指定されたオートロード関数が呼び出される

//本には下記で記載があるけど非推奨
/*function __autoload($name)
}
   $filename = $name. '.php';
   if(is_readable($filename)){
      require $filename;
   }
}*/
//PHP8系だとこっち
//参考：https://qiita.com/anagosan1027/items/64fc8fd0e1aa8ebce2a9
spl_autoload_register(function($name){
   echo "Want to load $name.\n";
   $filename = $name. '.php';
   if(is_readable($filename)){
      require $filename;
   }
});

$obj = new Foo();

//spl_autoload_registerにすると
//コールバック形式で指定できる
//複数のコールバック関数を指定できる→順番に実行される
//最後まで実行して該当クラスがないとエラーになる

//次はp.149 名前空間