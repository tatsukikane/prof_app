<?php
//USER管理画面
include("funcs.php");
$pdo = db_conn();  //接続設定

$stmt = $pdo->prepare("SELECT * FROM sov_map_user_table");
//$sql = "SELECT * FROM sov_map_table;";


$status = $stmt->execute(); //「実行」と実行が正常か正常ではないかを返してくれる

//データの表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="detail.php?id='.h($r["id"]).'">';
    $view .= h($r["id"])."|".h($r["name"])."|".h($r["lid"])."|".h($r["kanri_flg"])."|".h($r["life_flg"]);
    $view .= '</a>';
    // $view .= " ";
    // $view .= '<a href="delete.php?id='.h($r["id"]).'">';
    // $view .= "[削除]<br>";
    // $view .= '</a>';
  }
}
?>

<!-- todo htmlの追加と、delete.phpの作成 -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>USER管理画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <h1>USER管理画面</h1>
      <div class="navbar-header">
      <div class="navbar-header"><a class="navbar-brand" href="index.php">データ登録</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="select.php">MAP</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="edit.php">編集画面</a></div>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
