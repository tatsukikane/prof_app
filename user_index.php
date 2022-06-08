<!-- ユーザー管理画面(追加) -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理USER登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザーページへ戻る</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">USER管理TOP</a></div>


    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理ユーザー作成</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ログインID:<input type="text" name="lid"></label><br>
     <label>ログインパスワード:<input type="text" name="lpw"></label><br>
     <label>権限:
      <select name="kanri_flg">
        <option value=0>管理者</option>
        <option value=1>SP管理者</option>
      </select>
     </label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>