<!-- ユーザー管理画面(追加) -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アカウント登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <h1>新規登録</h1>
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Guestでログイン</a></div>



    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>アカウント登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ログインID:<input type="text" name="lid"></label><br>
     <label>ログインパスワード:<input type="text" name="lpw"></label><br>
     <input type="hidden" name="kanri_flg" value=0>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>