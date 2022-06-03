<?php
//1. POSTデータ取得 (DBへ送る為)
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$insta = $_POST["insta"];
$twitter = $_POST["twitter"];
$facebook = $_POST["facebook"];
$birthplace = $_POST["birthplace"];
$sov = $_POST["sov"];
$career = $_POST["career"];
$sov_detail = $_POST["sov_detail"];



//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //$pdo = new PDO('mysql:dbname=さくらDB名;charset=utf8;host=さくらMySQL','ユーザ名','接続先パスワード');
  $pdo = new PDO('mysql:dbname=sov_map;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql = "INSERT INTO sov_map_table(name, birthplace, sov, career, main_text, insta, twitter, indate, Facebook) 
VALUES(:name, :birthplace, :sov, :career, :main_text, :insta, :twitter, sysdate(), :Facebook);";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birthplace', $birthplace, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sov', $sov, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':career', $career, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':main_text', $sov_detail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':insta', $insta, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':twitter', $twitter, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':indate', $indate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Facebook', $facebook, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();  // $statusには成否がbooleanで入る

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_Error:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>




<!-- INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name, :email, :naiyou, sysdate()); -->