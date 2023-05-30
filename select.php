<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=coralbadger93_kadai08;charset=utf8;host=mysql57.coralbadger93.sakura.ne.jp','coralbadger93','suwayuki10');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//２．データ登録SQL作成
$sql = "SELECT * FROM Kadai_08;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/style.css">
<title>PHP</title>
</head>
<body>
<!-- Main[Start] -->
<div>
  <table>
    <?php foreach($values as $v){ ?>
            <tr>
              <td><?=$v["id"]?></td>
              <td><?=$v["name"]?></td>
              <td><?=$v["email"]?></td>
              <td><?=$v["age"]?></td>
              <td><?=$v["comment"]?></td>
            </tr>
    <?php }?>
  </table>
</div>
<!-- Main[End] -->
    <nav>
      <div class="data">
          <a class="data_a" href="index.php">データ登録</a>
      </div>
    </nav>

<script>
  //JSON受け取り
  const json = JSON.parse('<?=$json?>');
  console.log(json);
</script>

</body>
</html>