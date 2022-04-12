<?php
// (C)

//外部ファイルの読み込み
require_once "models/User.php";
//セッション開始
session_start();
//セッションからUserインスタンスを取得,削除
$user= $_SESSION["user"];
$_SESSION["user"] = null;

//セッションにUserインスタンスが保存されてなければ
if($user === null){
        // 空のインスタンスを作成
        $user = new User();
}


// セッションからエラーメッセージを取得、削除
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
//CSRF対策　(なりすまし対策)
$token = session_id();
include_once "views/create_view.php";
