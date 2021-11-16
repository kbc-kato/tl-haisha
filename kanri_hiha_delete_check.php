<!DOCTYPE html>
<html>
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

//foreach ($_POST as $name => $value) {
//    $$name = $value;
//    print "name".$$name."= ".$value;
//    print "<br>";
//}    

    $seq= $post["seq"];
    $hiha= $post["hiha"];
//    $shban= $post["shban"];
//    $cdun= $post["cdun"];
//    $cddr= $post["cddr_".$post["cdun"].""];
//    $nmry1= $post["nmry1"];
//    $tmha1= $post["tmha1"];
//    $biko1= $post["biko1"];
//    $nmry2= $post["nmry2"];
//    $tmha2= $post["tmha2"];
//    $biko2= $post["biko2"];


    $_SESSION["seq"]=$seq;
    $_SESSION["hiha"]=$hiha;
//    $_SESSION["shban"]=$shban;
//    $_SESSION["cdun"]=$cdun;
//    $_SESSION["cddr"]=$cddr;
//    $_SESSION["nmry1"]=$nmry1;
//    $_SESSION["tmha1"]=$tmha1;
//    $_SESSION["biko1"]=$biko1;
//    $_SESSION["nmry2"]=$nmry2;
//    $_SESSION["tmha2"]=$tmha2;
//    $_SESSION["biko2"]=$biko2;

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

//データinsert
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
    unset($_SESSION["hiha"]);

//    $_SESSION = array();
//    session_destroy();

    $y=date('Y', strtotime($hiha));
    $m=date('n', strtotime($hiha));
    $d=date('d', strtotime($hiha));
    header("location:kanri_hiha_desp.php?year=".$y."&month=".$m."&day=".$d);
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