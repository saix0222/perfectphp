<?php
//p.157 例外

//例外はtryで囲むと補足できる
//tryには対応したcatchが必要
//例外の種類ごとに複数のcatchを書ける

//最も簡単な例外：Exceptionクラスを使う
//Exceptionクラスにひあエラーメッセージやエラーコードを取得する
//メソッドが含まれる
//例外が発生した場合はそこで処理が中断され、一番手前のtry-catchまでジャンプする

//ゼロによる蒸散が発生するときに例外を発生させるコード

function div($v1, $v2)
{
    if($v2 === 0){
        throw new Exception(("arg #2 is zero.")); //例外
    }
    return $v1/$v2;
}

try{
    echo div(1,2), PHP_EOL;
    echo div(1,0), PHP_EOL; //例外の原因
    echo div(2,1), PHP_EOL; //中断されるためここは実行されない
} catch (Exception $e){
    echo 'Exception!', PHP_EOL;
    echo $e->getMessage(), PHP_EOL;
}