<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー詳細</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <h1 class="text-center col-sm-12">id: <?= $user->id ?> ユーザー詳細</h1>
            </div>
            <div class="row mt-2">
                <h2 class="text-center col-sm-12"><?= $flash_message ?></h1>
            </div>
            <div class="row mt-2">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>id</th>
                        <td><?= $user->id ?></td>
                    </tr>
                    <tr>
                        <th>名前</th>
                        <td><?= $user->name ?></td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td><?= $user->age ?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?= $user->gender　==="male"? "男性" :"女性" ?></td>
                    </tr>
                    
                    <th>登録時間</th>
                        <td><?= $user->created_at ?></td>
                    </tr>
                </table>
            </div> 

            <div class="row">
                <a href="edit_users.php?id=<?= $id ?>" class="col-sm-6 btn btn-primary">編集</a>
                <form class="col-sm-6" action="destroy_users.php" method="POST">
                    <input type="hidden" name="_token" value="<?= $token ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" class="btn btn-danger col-sm-12" onclick="return confirm('ユーザーを削除します。よろしいですか？')">削除</button>
                </form>
            </div>       
        
             <div class="row mt-5">
                <a href="index.php" class="btn btn-primary">ユーザー一覧</a>
            </div>
        </div>
    </body>
</html>