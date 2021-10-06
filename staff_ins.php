<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="inputformで入力した値を表示">
  <title>入力表示</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //input_post.phpの値を取得
    $name = $_POST['name'];
    $address = $_POST['address'];
    $biko = $_POST['biko'];

    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');             //変数をエスケープする
    $address = htmlspecialchars($address,ENT_QUOTES,'UTF-8');
    $biko = htmlspecialchars($biko,ENT_QUOTES,'UTF-8');
 

    include ("userfile.php");

//HEROKUへ接続        //DB名、ユーザー名、パスワード
//    $dsn = 'mysql:dbname=heroku_6f8d251016271cf;host=us-cdbr-east-04.cleardb.com;charset=utf8';
//    $user = 'b0a0ba98ce8296';
//    $password = 'c02ebd5f';
//MYSQLへ接続
//    $dsn = 'mysql:dbname=mydb;host=localhost;charset=utf8';
//    $user = 'root';
//    $password = 'katou_ma3';
//sql_serverへ接続
//    $dsn = 'sqlsrv:server=.\sqlexpress;database=MyDB';
//    $user = 'sa';
//    $password = 'kbc';

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = "INSERT INTO ST_STAFF (name, address, bikou) VALUES (?, ?, ?)"; // INSERT文を変数に格納。:nameや:addressはプレースホルダという、値を入れるための単なる空箱
 
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $name;
    $params[] = $address;
    $params[] = $biko; // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    $PDO = null;        //データベースから切断

    echo "<p>name: ".$name."</p>";
    echo "<p>address: ".$address."</p>";
    echo "<p>biko: ".$biko."</p>";
    echo '<p>で登録しました。</p>'; // 登録完了のメッセージ

  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>
  <a href = 'index.php'>戻る</a>
  
</body>
</html>