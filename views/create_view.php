<!DOCTYPE html>
<html lang="ja">
    <head>
         <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>新規ユーザー登録</title>
    </head>
    <body>
        
        <div class="container">
            <div class="row mt-3">
                <h1 class="text-center col-sm-12">新規ユーザー登録</h1>
            </div>
            
        <?php if($errors !== null): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach;?>
        </ul>
        <?php endif; ?>
        
        <div class="row mt-2">
        <form action="col-sm-12" action="store_users.php" method="POST">
            <input type="hidden" name="_token" value="<?= $token ?>">
            <!-- 1行 -->
            
            <div class="form-group row">
                        <label class="col-4 col-form-label">名前</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="name" value="<?= $user->name ?>">
                        </div>
            </div>
            
            <!-- 1行 -->
            <div class="form-group row">
                        <label class="col-4 col-form-label">年齢</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="name" value="<?= $user->age ?>">
                        </div>
            </div>
    
            
            <!-- 1行 -->
            <div class="form-group row">
                        <label class="col-4 col-form-label">性別</label>
                        <div class="col-10">
                            <input type="radio" name="gender" value="male" <?php $user->gender ==="" || $user->gender==="male" ? print "checked" :print ""; ?>>男性
                            <input type="radio" name="gender" value="female"<?php $user->gender==="female"? print "checked" :print "" ?>>女性<br>
                            <input type="hidden" name= "_token" value="<?= $token ?>">
                        </div>
            </div>
            
            
            
            <div class="form-group row">
                        <div class="offset-2 col-10">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
            </div>
        </form>
        
        <p><a href="index.php">ユーザー一覧へ戻る</a></p>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>

