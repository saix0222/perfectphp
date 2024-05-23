<?php
//p.160 PHPのエラーと例外

//PHPには5系になるまで例外がなかった
//組み込み関数は例外ではなくエラーを報告する
//PDOなどで例外が使われている

//設定によってい標準のエラーを例外に変換することもできる

/*set_error_handler(function ($errno, $errstr, $errfile, $errline)
{
    echo "error";
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

try{
    strpos();
}catch(ErrorException $e){
    var_dump($e);
    //echo 'Error occured!', PHP_EOL;
    //echo $e->getMessage(), PHP_EOL;
    //echo 'Stack Trace:', PHP_EOL;
    //echo $e->getTraceAsString();
}*/

/*function exception_error_handler(int $errno, string $errstr, string $errfile = null, int $errline) {
    echo "ttt";
    if (!(error_reporting() & $errno)) {
        // このエラーコードが error_reporting に含まれていない場合
        return;
    }
    throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler(exception_error_handler(...));*/
// PHP 8.1.0 より前のバージョン、つまり 第一級callableを生成する記法 が実装される前は、下記の呼び出しが必要です
// set_error_handler(__NAMESPACE__ . "\\exception_error_handler");

/* 例外を発生させます */
//strpos();

//https://www.php.net/manual/ja/class.errorexception.php

//次回、上記で何が起きてるのか理解するところから！