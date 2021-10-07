<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="inputformで入力した値を表示">
  <title>削除表示</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //input_post.phpの値を取得
    $id = $_POST['id'];
    $sid = $_POST['sid'];

    echo '$sid= '.$sid .'<br>';
    echo 'session_id= '.session_id();


    $id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');             //変数をエスケープする

    if( $sid != session_id() ) { exit(); }

    include ('userfile.php');

//HEROKUへ接続    
//    //DB名、ユーザー名、パスワード
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

    $sql = "DELETE FROM ST_STAFF WHERE id=?"; // DELETE文を変数に格納。:nameや:addressはプレースホルダという、値を入れるための単なる空箱
 
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $id; // 挿入する値を配列に格納する
    
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    $PDO = null;        //データベースから切断

    session_destroy();  //セッションの破棄

  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>

削除しました。
  <br><br>

  <a href = 'index.php'>戻る</a>
  
</body>
</html>