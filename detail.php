<?php
//データ更新用ページ
session_start();
$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM sov_map_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
//$r = $stmt->fetch(PDO::FETCH_ASSOC);
// echo $r;

$view="";
if($status==false){
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
  if($_SESSION["userid"]==$row["userid"]){
    $view .= '<input type="submit" value="送信">';
  }
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
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>プロフィール</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>insta:<input type="text" name="insta" value="<?=$row["insta"]?>"></label><br>
     <label>twitter:<input type="text" name="twitter" value="<?=$row["twitter"]?>"></label><br>
     <label>facebook:<input type="text" name="facebook" value="<?=$row["Facebook"]?>"></label><br>
     <label>出身地：<input type="text" name="birthplace" value="<?=$row["birthplace"]?>"></label><br>
     <!-- <label>価値観タグ:<input type="text" name="sov"></label><br> -->
     <label>価値観タグ:
      <select name="sov" value="<?=$row["sov"]?>">
        <option value=1>自由</option>
        <option value=2>安定</option>
        <option value=3>自然</option>
        <option value=4>仕事</option>
        <option value=5>プライベート</option>
        <option value=6>家族</option>
      </select>
     </label><br>
     <!-- <label>最終更新：<input type="text" name="indate" value="<?=$row["indate"]?>"></label><br> -->


     <label>キャリア：<textArea name="career" rows="4" cols="40"><?=$row["career"]?></textArea></label><br>
     <label>人生価値観詳細：<textArea name="sov_detail" rows="4" cols="40"><?=$row["main_text"]?></textArea></label><br>
     <p>最終更新：<?=$row["indate"]?></p>

     <input type="hidden" name="id" value="<?=$id?>">
     <!-- <input type="submit" value="送信"> -->
     <?=$view?>

    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>