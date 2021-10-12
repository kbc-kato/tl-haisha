<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>入力チェック</TITLE>
</head>
<body>

<?php
try
{
 
    require_once("common.php");

    $post = sanitize($_POST);                 //前画面からのデータを変数にセット
    
    $code = $post["code"];             //変数をエスケープする

    $dsn = 'mysql:dbname=heroku_66919c9a0fb2a45;host=us-cdbr-east-04.cleardb.com;charset=utf8';
    $user = 'b3e646fe28037f';
    $password = '2eebb511';
//    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
    
    $sql = "SELECT ST_JGTM.* WHERE JGCDJG=?"; // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $code;          // 挿入する値を配列に格納する
    
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec==false)
    {
        print "cdが間違っています。<br>";
        print "<a href = 'index.php'戻る</a>";
    }
    else
    {
        session_start();
        $_SESSION["login"]=1;
        $_SESSION["login_code"]=$code;
        $_SESSION["login_name"]=$rec["name"];
        
        header("location:haisha_top.php");
        exit;
    }
    
}
catch (exception $e)
{
    print "ただいま障害により大変ご迷惑をお掛けしております。" ;
}
?>    
</body>    
</html>