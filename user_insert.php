<!-- ユーザー管理画面(追加処理) -->
<?php
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

//2. DB接続
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成

$stmt = $pdo->prepare("INSERT INTO sov_map_user_table(name,lid,lpw,kanri_flg)VALUES(:name,:lid,:lpw,:kanri_flg)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_Error:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: user_index.php");
  exit();
}
?>