<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>投稿詳細</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <h1 class="text-center col-sm-12">id: <?= $message->id ?> の投稿詳細</h1>
            </div>
            <div class="row mt-2">
                <h2 class="text-center col-sm-12"><?= $flash_message ?></h1>
            </div>
            <div class="row mt-2">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>id</th>
                        <td><?= $message->id ?></td>
                    </tr>
                    <tr>
                        <th>名前</th>
                        <td><?= $message->name ?></td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td><?= $message->title ?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?= $message->body ?></td>
                    </tr>
                </table>
            </div> 
            
            <div class="row">
                <a href="edit.php?id=<?= $id ?>" class="col-sm-6 btn btn-primary">編集</a>
                <form class="col-sm-6" action="destroy.php" method="POST">
                    <input type="hidden" name="_token" value="<?= $token ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" class="btn btn-danger col-sm-12" onclick="return confirm('投稿を削除します。よろしいですか？')">削除</button>
                </form>
            </div>       
        
             <div class="row mt-5">
                <a href="index.php" class="btn btn-primary">投稿一覧</a>
            </div>
        </div>
    
       
    </body>
</html>