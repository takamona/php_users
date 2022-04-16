<?php
    // モデルのスーパークラス
    class Model
    {
        // データベースと接続を行うメソッド
        protected static function get_connection()
        {
            try {
                // オプション設定
                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // 失敗したら例外を投げる
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,   //デフォルトのフェッチモードはクラス
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   //MySQL サーバーへの接続時に実行するコマンド
                );

                $pdo = new PDO('mysql:host=localhost;dbname=user_register', 'root', '', $options);

                return $pdo;
            } catch (PDOException $e) {
                return 'PDO exception: '. $e->getUser();
            }
        }

        // データベースとの切断を行うメソッド
        protected static function close_connection($pdo, $stmt)
        {
            try {
                $pdo = null;
                $stmt = null;
            } catch (PDOException $e) {
                return 'PDO exception: '.$e->getUser();
            }
        }
    }
