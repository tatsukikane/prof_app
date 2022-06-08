<?php

$name = $_POST["name"];
$insta = $_POST["insta"];
$twitter = $_POST["twitter"];
$facebook = $_POST["facebook"];
$birthplace = $_POST["birthplace"];
$sov = $_POST["sov"];
$career = $_POST["career"];
$sov_detail = $_POST["sov_detail"];
//$indate = $_POST["indata"];
$id    = $_POST["id"];   //idを取得

include("funcs.php");
$pdo = db_conn();

$sql = "UPDATE sov_map_table SET name=:name, birthplace=:birthplace, sov=:sov, career=:career, main_text=:main_text, insta=:insta, twitter=:twitter, indate=sysdate(), Facebook=:Facebook WHERE id=:id";
// $sql = "UPDATE sov_map_table SET name, birthplace, sov, career, main_text, insta, twitter, indate, Facebook"
// VALUES(:name, :birthplace, :sov, :career, :main_text, :insta, :twitter, sysdate(), :Facebook);";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birthplace', $birthplace, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sov', $sov, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':career', $career, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':main_text', $sov_detail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':insta', $insta, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':twitter', $twitter, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':indate', $indate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Facebook', $facebook, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);
$status = $stmt->execute();  // $statusには成否がbooleanで入る

if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}


?>