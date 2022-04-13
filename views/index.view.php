<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>ユーザー一覧</title>
</head>
<body>
        <!--ビュー(V)-->
        <div class="container">
            <div class="row mt-3">
                <h1 class=" col-sm-12 text-center">ユーザー一覧</h1>
        </div>
        
        <?php if($flash_message !==null): ?>
        <div class="row mt-2">
            <h2 class="text-center col-sm-12"><?= $flash_message ?></h2>
        </div>
        <?php endif; ?>
        
        <?php if(count($users) !== 0): ?>
        <div class="row mt-2">
            <h2 class="text-center col-sm-12">現在のユーザーは<?= count($users) ?>人です</h2>
        </div>
        
         <table class="col-sm-12 table table-bordered table-striped">
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
        
        
        
        
        
        <div class="row mt-5">
        <p><a href="create_users.php">新規ユーザー登録</a></p>
        </div> 
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html> 