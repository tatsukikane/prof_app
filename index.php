<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">MAP</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="edit.php">編集画面</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="manage.php">USER管理画面</a></div>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>プロフィール作成</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>insta:<input type="text" name="insta"></label><br>
     <label>twitter:<input type="text" name="twitter"></label><br>
     <label>facebook:<input type="text" name="facebook"></label><br>
     <label>出身地：<input type="text" name="birthplace"></label><br>
     <!-- <label>価値観タグ:<input type="text" name="sov"></label><br> -->
     <label>価値観タグ:
      <select name="sov">
        <option value=1>自由</option>
        <option value=2>安定</option>
        <option value=3>自然</option>
        <option value=4>仕事</option>
        <option value=5>プライベート</option>
        <option value=6>家族</option>
      </select>
     </label><br>

     <label>キャリア：<textArea name="career" rows="4" cols="40"></textArea></label><br>
     <label>人生価値観詳細：<textArea name="sov_detail" rows="4" cols="40"></textArea></label><br>

     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
