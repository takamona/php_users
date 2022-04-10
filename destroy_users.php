<?php
    //Controller
    
    //外部ファイルの読み込み
    require_once 'filters/csrf_filter.php';
    require_once 'models/User.php';
    
    // フォームから飛んできたidを取得
    $id = $_POST['id'];
    
    //id値から注目してるUserインスタンスを取得
    $user = User::find($id);
    
    //User インスタンスが存在しなければ
    if($message === false){
        //空のエラー配列を作成
        $errors = array();
        $errors[] = 'そのような投稿は存在しません';
        // セッションにエラーメッセージ保存
        $_SESSION['errors'] = $errors;
        //リダイレクト
        header('Location: index.php');
        exit;
    }else{
        //データベースからデータ削除
        $flash_message = User::destroy($id);
        //フラッシュメッセージのセット
        $_SESSION['flash_message'] = $flash_message;
        //リダイレクト
        header('Location:index.php');
        exit;
        
        //viewの表示
        include_once 'views/show_view.php';
    }
    
