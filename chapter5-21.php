<?php
//p.160 PHPのエラーと例外

//PHPには5系になるまで例外がなかった
//組み込み関数は例外ではなくエラーを報告する
//PDOなどで例外が使われている

//設定によって標準のエラーを例外に変換することもできる

//本に記載のあるErrorのキャッチ方法はPHP5系まで
/*set_error_handler(function ($errno, $errstr, $errfile, $errline)
{
    throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
});

try{
    new Closure();
    strpos();
}catch(\Error $e){
    echo 'Error occured!', PHP_EOL;
    echo $e->getMessage(), PHP_EOL;
    echo 'Stack Trace:', PHP_EOL;
    echo $e->getTraceAsString();
}
*/

//PHp7以降、PHPエンジンのエラーの一部が/Errorに変換されるようになった
//PHPバージョンに応じて/Errorの適用範囲が増えている
try{
    strpos();
}catch(\Error $e){
    var_dump($e->getMessage());
}

//下記はこの部分のバージョン差を理解するのにめちゃくちゃ助かった参考文献
//https://fortee.jp/phperkaigi-2021/proposal/e1e0ebd8-d60c-42ed-b6e6-9a7602258d42