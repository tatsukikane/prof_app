<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default"><h1>TunaMap</h1></nav>
</header>

<h1>ログイン</h1>
<form name="form1" action="user_login_act.php" method="post">
<p>ID:<input type="text" name="lid" /></p>
<p>PW:<input type="password" name="lpw" /></p>
<input type="submit" value="LOGIN" />
</form>

<h1><a href="user_index.php">新規登録はこちら</a></h1>
<h1><a href="select.php">Gest</a></h1>


</body>
</html>