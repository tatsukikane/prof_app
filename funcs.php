<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn(){
    try {
        //localhostの場合
        $db_name = "sov_map";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "";          //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト

        //localhost以外＊＊自分で書き直してください！！ドメイン名を取得できる＊＊
        if($_SERVER["HTTP_HOST"] != 'localhost'){
            $db_name = "";  //さくらデータベース名
            $db_id   = "";  //アカウント名（さくらコントロールパネルに表示されています）
            $db_pw   = "";  //パスワード(さくらサーバー最初にDB作成する際に設定したパスワード)
            $db_host = "localhost"; //例）mysql**db.ne.jp...
        }
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt) 関数かする際は外から持ってくるものを探す
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    //” Location: {$file_name}”これでもok
    exit();
}

//todo sschk関数作成
function sschk(){
    //chk_ssidがあって、idも同じだったら
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        exit("Login Error");
    }else{
      //ハッキング対策で画面遷移するたびに、idを変える
        session_regenerate_id(true); //ここでセッションidを変えてくれる
        $_SESSION["chk_ssid"] = session_id();
    }
}




