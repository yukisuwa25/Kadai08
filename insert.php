<?php
//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$comment = $_POST["comment"];

//2. DB接続
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=coralbadger93_kadai08;charset=utf8;host=mysql57.coralbadger93.sakura.ne.jp','coralbadger93','suwayuki10');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql = "INSERT INTO Kadai_08(name,email,comment,age,indate)VALUES(:name, :email, :comment, :age, sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>
