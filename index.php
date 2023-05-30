<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP</title>
</head>
<body>
    <!-- main form作成 -->
    <form action="insert.php" method="post">
        <fieldset>
            <legend>コレクション管理</legend>
            <div class="label_a">
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="text" name="email"></label><br>
                <label>年齢：<input type="text" name="age"></label><br>
                <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </div>
        </fieldset>
    </form>
    <!-- form終了 -->
    <nav>
        <div class="data">
            <a class="data_a" href="select.php">データ一覧</a>
        </div>
    </nav>
    
</body>
</html>