<?php
    //Controller//
    
    //外部ファイルの読み込み
    require_once 'models/User.php';
    
    //セッション開始
    session_start();
    
    //注目しているユーザーのIDを取得。
    $id = $_GET['id'];
    
    //指定されたid値からUserインスタンスを取得
    $user = User::find($id);
    
    //Userインスタンスが存在しなければ
    
    if($user === false){
        ///空のエラー配列を作成
        $errors = array();
        $errors[] = 'そのユーザーは存在しません';
        //セッションにエラーメッセージを保存
        $_SESSION['errors'] = $errors;
        //リダイレクト
        header('Location: index.php');
        exit;
    }else{
        
        //セッションからエラーメッセージの取得、削除
        $errors = $_SESSION['errors'];
        $_SESSION['errors'] = null;
        
        //CSRF対策
        $token = session_id();
        
        // viewの表示
        include_once 'views/edit_view.php';
    }
    
    


