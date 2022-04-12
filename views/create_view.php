<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
        <h1>新規ユーザー登録</h1>
        <link rel="stylesheet" href="css/style.css">
        <?php if($errors !== null): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach;?>
        </ul>
        <?php endif; ?>
        
        <form action="store_users.php" method="POST">
            名前: <input type="text" name="name" value="<?= $user->name?>"><br>
            年齢: <input type="text" name="age" value="<?= $user->age?>"><br>
            性別: <input type="radio" name="gender" value="male" <?php $user->gender ==="" || $user->gender==="male" ? print  "checked" :print ""; ?>>男性　
            <input type="radio" name="gender" value="female" <?php $user->gender === "female" ? print "checked" : print ""  ?>>女性<br>
            <input type="hidden" name= "_token" value="<?= $token ?>">
            <button type="submit">登録</button>
        </form>
        
        <p><a href="index.php">ユーザー一覧へ戻る</a></p>
    </body>
</html>

