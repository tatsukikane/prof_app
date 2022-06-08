<!-- ユーザー管理画面(更新処理) -->
<?php
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$id    = $_POST["id"];   //idを取得

include("funcs.php");
$pdo = db_conn();

$sql = "UPDATE sov_map_user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg WHERE id=:id";


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);
$status = $stmt->execute();  // $statusには成否がbooleanで入る

if($status==false){
  sql_error($stmt);
}else{
  redirect("user_select.php");
}

?>