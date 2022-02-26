<?php
    //モデル(M)
    // ユーザーの設計図
    class User{
        // プロパティ
        public  $name;  //　名前
        public  $age;   //　年齢
        //　コンストラクタ
        public function __construct($name,$age){
            $this->name = $name;
            $this->age = $age;
            // print "{$this->name}生まれた\n";
        }
        //自己紹介をするメソッド（関数）
        public function hello(){
            print"私の名前は{$this->name}で年齢は{$this->age}歳です\n";
        }
        //お酒を飲むメソッド
        public function drink(){
            //20歳以上ならば 
            if($this->age>= 20){
                return"私{$this->name}はお酒大好き\n";
            }else{
                $year = 20 - $this->age;
                return "私{$this->name}は{$this->age}歳なので、あと{$year}年お酒は飲めない\n";
            }
        }
            
            
        //友達に話しかけるメソッド
        public function talk($you){
            print"{$you->name}よ、お前は{$you->age}歳なのか\n";
            print"俺様{$this->name}は{$this->age}歳だ\n";
        }
            
            
    }
        
        
    
    
    
    
    
    
   
    
    