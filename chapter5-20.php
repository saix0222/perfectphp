<?php
//p.159 例外の拡張

//定義済みの基底クラスやSPLを使わなくても、
//独自の例外を作ることができる
//その場合には、Exceptionクラスを継承する

class ZeroDivisionException extends Exception
{

}

function div ($v1, $v2)
{
    if($v2 === 0){
        throw new ZeroDivisionException("arg #2 is zero.");
    }

    return $v1/$v2;
}
try{
    echo div(1,2), PHP_EOL;
    echo div(1,0), PHP_EOL; //例外の原因
    echo div(2,1), PHP_EOL; 
//複数のcatch文で例外の種類によって処理を分けている
}catch(ZeroDivisionException $e){
    echo 'Zero Division Exception!', PHP_EOL;
    echo $e->getMessage(), PHP_EOL; 
}catch(Exception $e){
    echo $e->getMessage(), PHP_EOL; 
}
