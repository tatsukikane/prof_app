<?php
session_start();
// echo $_SESSION["chk_ssid"];
// echo $_SESSION["kanri_flg"];
// echo $_SESSION["name"];
// echo $_SESSION["userid"];

//編集画面(一覧表示、削除や編集)
include("funcs.php");
sschk();

$pdo = db_conn();  //接続設定

$stmt = $pdo->prepare("SELECT * FROM sov_map_table");
//$sql = "SELECT * FROM sov_map_table;";


$status = $stmt->execute(); //「実行」と実行が正常か正常ではないかを返してくれる

//データの表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';
    $view .= '<td>';
    $view .= '<a href="detail.php?id='.h($r["id"]).'">'.h($r["id"]);
    $view .= '</td><td></a>';
    $view .= '<a href="detail.php?id='.h($r["id"]).'">'.h($r["name"]);
    $view .= '</a></td><td>';
    $view .= h($r["insta"]);
    $view .= '</td><td>';
    $view .= h($r["indate"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= '<a href="delete.php?id='.h($r["id"]).'">';
    if($_SESSION["userid"]==$r["userid"]){
      $view .= "[削除]";
    }
    // $view .= "[削除]";
    $view .= '</a></td></tr>';
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
<title>管理画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="./header.css" rel="stylesheet">

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <h1>ユーザー一覧(自分の物だけ編集可)</h1>
      <div class="navbar-header">
      <div class="navbar-header"><a class="navbar-brand" href="index.php">プロフィール登録</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="select.php">TOP</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="user_select.php">User設定</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- テーブルで一覧表示 -->
<div class="container jumbotron">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">インスタ</th>
        <!-- <th scope="col">ログインパスワード</th> -->
        <th scope="col">最終更新</th>
        <th scope="col">削除</th>
      </tr>
    </thead>
    <?=$view?>
  </table>
</div>
<!-- Main[End] -->

</body>
</html>
