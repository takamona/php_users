<?php

    require_once 'models/Model.php';
    // モデル(M)
    // ユーザーの設計図
    class User extends Model
    {
        // プロパティ
        public $id; // ID
        public $name; // 名前
        public $age; // 年齢
        public $gender; // 性別
        public $created_at; // 登録日時
        // コンストラクタ
        public function __construct($name = '', $age = '', $gender = '')
        {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
            // print "{$this->name}が生まれた\n";
        }
        // 自己紹介をするメソッド（関数）
        public function hello()
        {
            print "私の名前は{$this->name}で年齢は{$this->age}歳です\n";
        }
        // お酒を飲むメソッド
        public function drink()
        {
            // 20歳以上ならば
            if ($this->age >= 20) {
                return "私{$this->name}はお酒大好き\n";
            } else {
                $year = 20 - $this->age;
                return "私{$this->name}は{$this->age}歳なので、あと{$year}年お酒は飲めない\n";
            }
        }
        // 友達に話しかけるメソッド
        public function talk($you)
        {
            print "{$you->name}よ、お前は{$you->age}歳なのか\n";
            print "俺様{$this->name}は{$this->age}歳だ\n";
        }
        // 全テーブル情報を取得するメソッド
        public static function all()
        {
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->query('SELECT * FROM users ORDER BY id DESC');
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
                $users = $stmt->fetchAll();
                self::close_connection($pdo, $stmt);
                // Userクラスのインスタンスの配列を返す
                return $users;
            } catch (PDOException $e) {
                return 'PDO exception: '.$e->getUser();
            }
        }
        //id値から一件分の投稿データを抜き出すメソッド
        public static function find($id)
        {
            try {
                // データベースに接続
                $pdo = self::get_connection();
                // SQL文の準備
                $stmt = $pdo->prepare('SELECT * FROM users WHERE id=:id');
                // バインド処理
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
                // 投稿データをUserクラスのインスタンスとして抜き出す
                $user = $stmt->fetch();
                // データベースとの接続を切る
                self::close_connection($pdo, $stmt);
                // Userクラスのインスタンスを返す
                return $user;
            } catch (PDOException $e) {
                return;
            }
        }
        
        
        
        
         // データを1件登録するメソッド
        public function save()
        {
            try {
                //データベースと接続
                $pdo = self::get_connection();
                //新規ユーザー登録の場合
                if ($this->id === null) {
                    $stmt = $pdo->prepare('INSERT INTO users (name, age, gender) VALUES (:name, :age, :gender)');
                    // バインド処理
                    $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
                        $stmt->bindParam(':gender', $this->gender, PDO::PARAM_STR);
                    // 実行
                    $stmt->execute();
                    //データベースとの接続を切る
                    self::close_connection($pdo, $stmt);
                    //flash messageを返す
                    return '新規ユーザー登録が成功しました。';
                } else {
                    //更新の場合
                    //SQL文の更新
                    $stmt = $pdo->prepare('UPDATE users SET name=:name, age=:age, gender=:gender WHERE id = :id');
                    //バインド処理
                    $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                    $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
                    $stmt->bindParam(':gender', $this->gender, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
                    //実行
                    $stmt->execute();
                    //データベースとの接続を切る
                    self::close_connection($pdo, $stmt);
                    //fhashmessageを返す
                    return 'id: '. $this->id.'のユーザー情報を更新しました';
                }
            } catch (PDOException $e) {
                return 'PDO exception: '.$e->getUser();
      }
        }
        // ユーザーデータを1件削除するメソッド
        public static function destroy($id)
        {
            try {
                // データベースと接続
                $pdo = self::get_connection();
                //IDを取得
                $id = self::find($id)->id;
                // SQL文を準備
                $stmt = $pdo->prepare('DELETE FROM users WHERE id=:id');
                // バインド処理
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // データベースとの接続を切る
                self::close_connection($pdo, $stmt);

   // flash_messageを返す
                return 'id: '.$id.'ユーザーを削除しました。';
            } catch (PDOException $e) {
                return 'PDO exception: '.$e->getUser();
            }
        }
        //入力された値が正しいか検証
        public function validate()
        {
            $errors = array();
            //名前が入力されていなければ
            if ($this->name === '') {
                $errors[] = '名前を入力してください';
            }
            //年齢が入力されていなければ
            if ($this->age === '') {
                $errors[] = '年齢を入力してください';
            }
        //年齢が正の整数の形をしていなければ
        elseif (!preg_match('/^[0-9]+$/', $this->age)) {
            $errors[] = '年齢は正の整数を入力してください';
        }
            return $errors;
        }
    }