<?php

    // controller

  require_once 'models/User.php';

    //セッション開始
    session_start();

    //セッションからフラッシュメッセージの取得、削除
    $flash_message = $_SESSION['flash_message'];

    $_SESSION['flash_message'] = null;

    //注目している投稿のＩＤを取得
    $id = $_GET['id'];

    //指定されたid値からUserインスタンスを取得

    $user = User::find($id);

    //userインスタンスが存在しなければ
    if ($user === false) {
        //空のエラー配列を作成
        $errors = array();
        $errors[] = 'そのようなユーザーは存在しません';
        //セッションにエラーメッセージを保存
        $_SESSION['errors'] = $errors;
        //リダイレクト
        header('Location: index.php');
        exit;
    } else {
        // CSRF対策
        $token = session_id();
        // view の表示
        include_once 'views/show_view.php';
    }









