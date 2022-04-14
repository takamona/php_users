<?php


    // Controller

    // 外部ファイルの読み込み
    require_once 'filters/csrf_filter.php';
    require_once 'models/User.php';

    // フォームからの指定されたid値を取得
    $id = $_POST['id'];

    // 注目してるユーザーインスタンスを取得
    $user = User::find($id);

    // そのようなユーザーが存在すれば
    if ($user !== false) {
        // 入力データの取得
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        // インスタンス情報の更新
        $user->name = $name;
        $user->age = $age;
        $user->gender = $gender;

        // 入力チェック
        $errors = $user->validate();

        // 入力エラーが1つもなければ
        if (count($errors) === 0) {

                // データベースの更新
                $flash_message = $user->save();

                // セッションにフラッシュメッセージを保存        
                $_SESSION['flash_message'] = $flash_message;

                // リダイレクト
                header('Location: show_users.php?id='.$id);
            exit;
        } else {
            // セッションにエラー配列をセット
            $_SESSION['errors'] = $errors;
            // リダイレクト
            header('Location: edit_users.php?id='.$id);
            exit;
        }
    } else {
        // セッションにエラーメッセージをセット
        $_SESSION['error'] = '存在しないユーザーです';
        // リダイレクト
        header('Location: index.php');
        exit;
    }
