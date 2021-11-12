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

    require_once("common.php");

    $post = sanitize($_POST);               //前画面からのデータを変数にセット
    
    $hiha= $post["hiha"];
    $shban= $post["shban"];
    $cdun= $post["cdun"];
    $cddr= $post["cddr"];
    $nmry1= $post["nmry1"];
    $tmha1= $post["tmha1"];
    $biko1= $post["biko1"];
    $nmry2= $post["nmry2"];
    $tmha2= $post["tmha2"];
    $biko2= $post["biko2"];

//入力チェック
//配車日
    if($hiha=='')
    {
        print "<br><br>";
        print "日付が未入力です。<br>";
        print "<a href = 'history.back()>戻る</a>";
    }
    else
    {
        if(isset($hiha)==false)
        {
            print "<br><br>";
            print "日付が未入力です。<br>";
            print "<a href = 'history.back()>戻る</a>";
        }
    }

//車番
    if($shban=='')
    {
        print "<br><br>";
        print "車番が未入力です。<br>";
        print "<a href = 'history.back()>戻る</a>";
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。<br>";
            print "<a href = 'history.back()>戻る</a>";
        }
    }

//運送会社
    if($cdun=='')
    {
        print "<br><br>";
        print "運送会社が未入力です。<br>";
        print "<a href = 'history.back()>戻る</a>";
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。<br>";
            print "<a href = 'history.back()>戻る</a>";
        }
    }
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

    $sql = "INSERT INTO ST_KANRI_MYSQL( KAHIKA, KASHBAN, KACDUN, KACDDR, KANMRY1, KATMHA1, KABIKO1, KANMRY2, KATMHA2, KABIKO2 ) VALURS (?,?,?,?,?,?,?,?,?,?)";

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $hiha;          // 挿入する値を配列に格納する
    $params[] = $shban;
    $params[] = $cdun;
    $params[] = $cddr;
    $params[] = $nmry1;
    $params[] = $tmha1;
    $params[] = $biko1;
    $params[] = $nmry2;
    $params[] = $tmha2;
    $params[] = $biko2;

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断

        header("location:kanri_input.php");
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