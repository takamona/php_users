<!DOCTYPE html>
<html lang="ja">
    <head>
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
        <?php  foreach($users as $user): ?>
        <ul>
            <li><?= $user->name ?></li>
            <li><?=$user->age ?>歳</li>
            <li><?=$user->gender === "male"? "男性" : "女性" ?></li>
            <li><?=$user->drink() ?></li>
        </ul>
        <?php endforeach; ?>
        <?php else: ?>
        <p>ユーザーはまだ一人もいません</p>
        <?php endif;?>
        
         <?php if($messages !== null): ?>
                <?php if(count($messages) !== 0): ?> 
                <table>
                    <tr>
                        <th>ID</th>
                        <th>ユーザ名</th>
                        <th>年齢</th>
                        <th>性別</th>
                        <th>投稿時間</th>
                    </tr>
                    </tr>
                    <?php foreach($messages as $message): ?>
                    <tr>
                        <td><a href="show.php?id=<?= $message->id ?>"><?= $message->id ?></a></td>
                        <td><?= $message->name ?></td>
                        <td><?= $message->title ?></td>
                        <td><?= $message->body ?></td>
                        <td><?= $message->created_at ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
        <p><a href="create.php">新規ユーザー登録</a></p>
    </body>
</html>