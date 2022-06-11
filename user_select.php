<!-- ユーザー管理画面(一覧 更新削除) -->
<?php
session_start();
include("funcs.php");
sschk();

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
    if($_SESSION["userid"]==$r["id"]){
      $view .= '<tr>';
      $view .= '<td>';
      $view .= '<a href="user_detail.php?id='.h($r["id"]).'">'.h($r["id"]);
      $view .= '</td><td></a>';
      $view .= '<a href="user_detail.php?id='.h($r["id"]).'">'.h($r["name"]);
      $view .= '</a></td><td>';
      $view .= h($r["lid"]);
      $view .= '</td><td>';
      $view .= h($r["kanri_flg"]);
      $view .= '</td></tr>';
    }
    // $view .= '<tr>';
    // $view .= '<td>';
    // $view .= '<a href="user_detail.php?id='.h($r["id"]).'">'.h($r["id"]);
    // $view .= '</td><td></a>';
    // $view .= '<a href="user_detail.php?id='.h($r["id"]).'">'.h($r["name"]);
    // $view .= '</a></td><td>';
    // $view .= h($r["lid"]);
    // $view .= '</td><td>';
    // $view .= h($r["kanri_flg"]);
    // $view .= '</td></tr>';

    // $view .= '<a href="user_detail.php?id='.h($r["id"]).'">';
    // $view .= h($r["id"])."|".h($r["name"])."|".h($r["lid"])."|".h($r["kanri_flg"]);
    // $view .= '</a>';
    // $view .= "   ";
    // $view .= '<a href="user_delete.php?id='.h($r["id"]).'">';
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
<title>User設定</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./header.css">

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <h1>User設定</h1>
        <!-- <?=$_SESSION["name"]?>さん、こんにちは!
      <p><?=$_SESSION["name"]?>さん、こんにちは!</p> -->
      <!-- <div class="navbar-header"> -->
      <!-- <div class="navbar-header"><a class="navbar-brand" href="user_index.php">管理ユーザー登録</a></div> -->
      <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザーページへ戻る</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="user_logout.php">ログアウト</a></div>
      </div>
    </div>
  </nav>
</header>
<h2><?=$_SESSION["name"]?>さん、こんにちは!</h2>

<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <div>
    <div class="container jumbotron"><?=$view?></div>
</div> -->
<div class="container jumbotron">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">ログインID</th>
        <!-- <th scope="col">ログインパスワード</th> -->
        <th scope="col">管理者コード</th>
      </tr>
    </thead>
    <?=$view?>
  </table>
</div>
<!-- Main[End] -->

</body>
</html>
