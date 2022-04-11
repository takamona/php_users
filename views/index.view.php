<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!--ビュー(V)-->
        <h1>ユーザー一覧</h1>
        <?php if($flash_message !==null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <?php if(count($users) !== 0): ?>
        <p>現在のユーザーは<?= count($users) ?>人です</p>
        
        <table>
            <tr>
                <th>ID</th>
                <th>ユーザ名</th>
                <th>年齢</th>
                <th>性別</th>
                <th>登録時間</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <td><a href="show_users.php?id=<?= $user->id ?>"><?= $user->id ?></a></td>
                <td><?= $user->name ?></td>
                <td><?= $user->age ?></td>
                <td><?= $user->gender   ==="male"? "男性" : "女性"?></td>
                <td><?= $user->created_at ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>ユーザーはまだ一人もいません</p>
        <?php endif;?>
        
        <p><a href="create_users.php">新規ユーザー登録</a></p>
    </body>
</html> 