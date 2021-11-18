<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id = "pagebody">
<?php
try
{
    session_start();


    require_once("common.php");

    $post = sanitize($_POST);               //前画面からのデータを変数にセット

    $seq= $post["seq"];
    $shban= $post["shban"];

    $_SESSION["seq"]=$seq;
    $_SESSION["shban"]=$shban;

//入力チェック
//配車日
//車番
//運送会社
//運転者
//行先1
//着時間1
//備考1
//行先2
//着時間2
//備考2

//データdelete
    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = "DELETE FROM ST_KANRI_MYSQL
            WHERE SEQ=?";

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $seq;          // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断

    unset($_SESSION["seq"]);        //セッションを削除
    if($_SESSION["shori_kbn"]=="1")
    {
        unset($_SESSION["shban"]);
    }
    if($_SESSION["shori_kbn"]=="1")
    {
        header("location:kanri_hiha_desp.php");
    }
    else
    {
        header("location:kanri_shban_desp.php");
    }
    exit;

}
catch (exception $e)
{
    print "ただいま障害により大変ご迷惑をお掛けしております。" ;
}
?>    
        </div>
    </body>
</html>