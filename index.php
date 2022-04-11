<?php
    //コントローラー(C)
    //外部ファイルの読み込み
    require_once "models/User.php";
    session_start();

    //モデルを使ってMYSQLから全データ取得
    $users = User::all();
    //セッションから$flash_messageを取得,削除
    $flash_message = $_SESSION["flash_message"];
    $_SESSION['flash_message'] = null;
    
    
    // セッションからエラーメッセージの取得、削除
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    

    //HTMLファイルを表示
    include_once "views/index.view.php"; 