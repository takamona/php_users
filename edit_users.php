<?php
//(C)

//外部ファイルの読み込み
require_once "models/User.php";

//セッション開始
sesstion_start();

//投稿IDを取得
$id = $_GET['id'];

//指定されたid値からMessageインスタンスを取得
$messeage = Message::find($id);

//Messageインスタンスが存在しなければ
if($messeage === false){
    //空のエラー配列を作成
    $errors = array();
    $errors[] = "そのような投稿は存在しません";
    //セッションにエラーメッセージを保存
    $_SESSION["errors"] = $errors;
    //リダイレクト
    header('Location: index.php');
    exit;
}else{
    //セッションからエラーメッセージの取得、削除
    $errors = $_SETTION['errors'];
    $_SETTION["errors"] = null;
    
    
    //CSRF対策
    $token = session_id();
    
    //viewの表示
    
    include_once "views/edit_users view.php";
}




