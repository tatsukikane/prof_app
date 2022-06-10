<?php
//データ更新用ページ
$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM sov_map_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
  // if($id==$row["userid"]){
  //   $view .= '<a class="btn btn-danger" href="delete.php?id='.$r["id"].'">';
  //   $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
  //   $view .= '</a>';
  // }
  $view .= '<p>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>プロフィール編集</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ログインID:<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>ログインパスワード:<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
     <label>権限コード:<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
     <a class="btn btn-danger" href="delete.php?id='.$r["id"].'">[<i class="glyphicon glyphicon-remove"></i>削除]</a><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">

    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>