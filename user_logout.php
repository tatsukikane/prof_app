<?php
session_start();

//SESSIONの初期化
$_SESSION = array();

if (isset($_COOKIE[session_name()])){
  setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();

header("Location: user_login.php");
exit();

?>