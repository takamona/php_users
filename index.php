<?php
//コントローラー(C)
//外部ファイルの読み込み
    require_once"User.php";
 //物語開始
    $kobayashi  =  new User("小林", 18, "male");//インスタンス、オブジェクト
    $shima = new User("島",49,"male");
    // //小林さんが自己紹介をする
    // $kobayashi->hello();
    // //島さんが自己紹介をする　　
    // $shima->hello();
    // //小林さんがお酒を飲む
    // $kobayashi->drink();
    // $shima->drink();
    // //　小林さんが島さんに話しかける
    // $kobayashi->talk($shima);
    // $shima->talk($kobayashi);
    
    //ユーザーの一覧作成
    $users = array();
    $users[] = $kobayashi;
    $users[] = $shima;
    $users[] = new User("山田",80,"female");
    // var_dump($users);
    //ユーザー一覧を表示
    // foreach($users as $user){
    //     print"{$user->name}\n";
    //     print"{$user->age}歳\n";
    //     print $user->drink();
    // }
    
    //HTMLファイルを表示
    include_once "index.view.php";