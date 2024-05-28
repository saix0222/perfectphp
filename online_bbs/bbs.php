<?php
$errors = array();

var_dump($_SERVER['REQUEST_METHOD']);

//POSTなら保存処理実行
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 名前が正しく入力されているかチェック
    $name = null;
    if(!isset($_POST['name']) || !strlen($_POST['name'])){
        $erros['name'] = '名前を入力してください';
    }else if(strlen($_POST['name']) > 40){
        $error['name'] = '名前は40文字以内で入力してください';
    }else{
        $name = $_POST['name'];
    }

    //ひとことが正しく入力されているかチェック
    $comment = null;
    if(!isset($_POST['comment']) || !strlen($_POST['comment'])){
        $error['comment'] = 'ひとことを入力してください';
    }else if(strlen($_POST['comment']) > 200){
        $errors['comment'] = 'ひとことは200文字以内で入力してください';
    }else{
        $comment = $_POST['comment'];
    }

    //データベースに接続 古の書き方
/*
$link = mysql_connect('localhost', 'root', '');
if(!$link){
    die('データベースに接続できません：' . mysql_error());
}
//データベースを選択する
mysql_select_db('online_bbs', $link);
*/

//PDOで書き直し
$db['host'] = 'localhost';
$db['db_name'] = 'online_bbs';
$db['user'] = 'root';
$db['password'] = '';

try {
    $pdo = new PDO(
        "mysql:host={$db['host']};dbname={$db['db_name']};charset=utf8",
        $db['user'],
        $db['password'],
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //エラーがなければ保存
    if(count($errors) === 0){
        //保存するためのSQL文を作成
        $sql = "INSERT INTO 'post' ('name', 'comment', 'crated_at') VALUES(?,?,
            '". date('Y-m-d H:i:s') . "')";
            echo $sql;
            $stmt = $pdo->prepare($sql);
            $flag = $stmt->execute(array($name,$comment));
        }
    }
    catch (Exception $e) {
        echo 'データベースに接続できません：' . mb_convert_encoding($e->getMessage(), 'UTF-8', 'ASCII,JIS,UTF-8,CP51932,SJIS-win');
    }



}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset=utf-8" />
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>

    <form action="bbs.php" method="post">
        名前：<input type="text" name="name" /><br />
        ひとこと：<input type="text" name="comment" size="60" /><br />
        <input type="submit" name="submit" value="送信" />
</body>
</html>