<?php
$errors = array();

//POSTなら保存処理実行
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 名前が正しく入力されているかチェック
    $name = null;
    if(!isset($_POST['name']) || !strlen($_POST['name'])){
        $errors['name'] = '名前を入力してください';
    }else if(strlen($_POST['name']) > 40){
        $errors['name'] = '名前は40文字以内で入力してください';
    }else{
        $name = $_POST['name'];
    }

    //ひとことが正しく入力されているかチェック
    $comment = null;
    if(!isset($_POST['comment']) || !strlen($_POST['comment'])){
        $errors['comment'] = 'ひとことを入力してください';
    }else if(strlen($_POST['comment']) > 200){
        $errors['comment'] = 'ひとことは200文字以内で入力してください';
    }else{
        $comment = $_POST['comment'];
    }
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
    if($_SERVER['REQUEST_METHOD'] === 'POST' && count($errors) === 0){
        //保存するためのSQL文を作成 SQLインジェクション対策
        $sql = "INSERT INTO `post` (`id`,`name`, `comment`, `created_at`) VALUES('',?,?,
            '". date('Y-m-d H:i:s') . "')";
        $stmt = $pdo->prepare($sql);
        $flag = $stmt->execute(array($name,$comment));
        //header('Location: http://' .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']);
    }
    // 投稿された内容を取得するSQLを作成して結果を取得
    $sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";
    $stmt = $pdo->prepare($sql);
    $flag = $stmt->execute();
    $posts = $stmt->fetchAll();
}
catch (Exception $e) {
        echo 'データベースに接続できません：' . mb_convert_encoding($e->getMessage(), 'UTF-8', 'ASCII,JIS,UTF-8,CP51932,SJIS-win');
}

include 'views/bbs_view.php';
