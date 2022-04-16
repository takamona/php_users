<?php
    // (C)
    require_once 'filters/csrf_filter.php';
    require_once 'models/User.php';
    //セッション開始
    //すべてのファイルで共通して使える情報の保存箱
    //連想配列
    // $_POSTは連想配列
    // $_POSTスーパーグローバル変数
    //ページ間をまたいで飛んでくる連想配列
    $id = $_POST['id'];

    $user = User::find($id);

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    //print $name;
    //画面から入力された値から新しいユーザー作成
    $user->name = $name;
    $user->age = $age;
    $user->gender = $gender;

    // var_dump($user);

    //正しい入力がされているかチェック
    $errors = $user->validate();
    // var_dump($errors);
    //名前も年齢も正しく入力されていれば
    if (count($errors) === 0) {

        // $userをデータベースに保存
        $flash_message = $user->save();
        // セッションに$flash_messageを保存
        $_SESSION['flash_message'] = $flash_message;

        // リダイレクト C -> C
        header('Location: show_users.php?id=' . $id);
        exit;

    } else {
        // var_dump($errors);
        $_SESSION['errors'] = $errors;
        $_SESSION['user'] = $user;

        header('Location: edit_users.php?id=' . $id);
        exit;
    }

