<?php
//POSTデータ取得
$id = $_GET["id"];

//DB接続
include("funcs.php");
$pdo = db_conn();

//データ登録のSQL作成
$sql = "DELETE FROM sov_map_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//データ登録後処理
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}

?>