<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="inputformで入力した値を表示">
  <title>修正表示</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //input_post.phpの値を取得
    $id = $_POST['id'];
    $name = $_POST['name'];    
    $address = $_POST['address'];
    $biko = $_POST['biko'];

    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');             //変数をエスケープする
    $address = htmlspecialchars($address,ENT_QUOTES,'UTF-8');
    $biko = htmlspecialchars($biko,ENT_QUOTES,'UTF-8');

    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=mydb;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'katou_ma3';
//    $dsn = 'sqlsrv:server=.\sqlexpress;database=MyDB';
//    $user = 'sa';
//    $password = 'kbc';

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = "UPDATE ST_STAFF SET name=?, address=?, bikou=? WHERE id=?"; // UPDATE文を変数に格納。:nameや:addressはプレースホルダという、値を入れるための単なる空箱
 
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $name;
    $params[] = $address;
    $params[] = $biko; 
    $params[] = $id; // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    $PDO = null;        //データベースから切断

  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>

修正しました。
  <br><br>

  <a href = 'pdo_staff.php'>戻る</a>
  
</body>
</html>