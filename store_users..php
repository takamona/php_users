<?php
    // (C)
    require_once "filters/csrf_filter.php";
    require_once "models/User.php";
    //セッション開始
    //すべてのファイルで共通して使える情報の保存箱
    //連想配列
    session_start();
    // $_POSTは連想配列
    // $_POSTスーパーグローバル変数
    //ページ間をまたいで飛んでくる連想配列
    var_dump($_POST);
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    //print $name;
    //画面から入力された値から新しいユーザー作成
    $user = new User($name,$age,$gender);
    //正しい入力がされているかチェック
    $errors = $user->validate();
    // var_dump($errors);
    //名前も年齢も正しく入力されていれば
    if(count($errors)===0){
        
        var_dump($user);
    $kobayashi = new User("小林",30,"male");
    // $userをデータベースに保存
    $flash_message = $user->save();
    // セッションに$flash_messageを保存
    $_SESSION["flash_message"] = $flash_message;
    
    
    // リダイレクト C -> C
    header("Location: index.php");
    exit;
    }else{
        // var_dump($errors);
        $_SESSION["errors"]= $errors;
        $_SESSION["user"] = $user;
        
        header("Location: create.php");
        exit;
    }
    