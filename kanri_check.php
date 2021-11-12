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

print "cddr=".$_POST("cddr");
    $post = sanitize($_POST);               //前画面からのデータを変数にセット
    
    $hiha= $post["hiha"];
    $shban= $post["shban"];
    $cdun= $post["cdun"];
    if($post["cddr"] !=1)
    {
        $cddr= $post["cddr"];
    }
    $nmry1= $post["nmry1"];
    $tmha1= $post["tmha1"];
    $biko1= $post["biko1"];
    $nmry2= $post["nmry2"];
    $tmha2= $post["tmha2"];
    $biko2= $post["biko2"];

print "cddr=".$cddr;

    session_start();

    $_SESSION["hiha"]=$hiha;
    $_SESSION["shban"]=$shban;
    $_SESSION["cdun"]=$cdun;
    $_SESSION["cddr"]=$cddr;
    $_SESSION["nmry1"]=$nmry1;
    $_SESSION["tmha1"]=$tmha1;
    $_SESSION["biko1"]=$biko1;
    $_SESSION["nmry2"]=$nmry2;
    $_SESSION["tmha2"]=$tmha2;
    $_SESSION["biko2"]=$biko2;

    //入力チェック
//配車日
    if($hiha=='')
    {
        print "<br><br>";
        print "日付が未入力です。1"."<br>";
        print "<a href = 'kanri_input.php'>戻る</a>";
        exit();
    }
    else
    {
        if(isset($hiha)==false)
        {
            print "<br><br>";
            print "日付が未入力です。2"."<br>";
            print "<a href = 'kanri_input.php'>戻る</a>";
            exit();
        }
    }

//車番
    if($shban=='')
    {
        print "<br><br>";
        print "車番が未入力です。"."<br>";
        print "<a href = 'kanri_input.php'>戻る</a>";
        exit();
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。"."<br>";
            print "<a href = 'kanri_input.php'>戻る</a>";
            exit();
        }
    }

//運送会社
    if($cdun=='')
    {
        print "<br><br>";
        print "運送会社が未入力です。"."<br>";
        print "<a href = 'kanri_input.php'>戻る</a>";
        exit();
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。"."<br>";
            print "<a href = 'kanri_input.php'>戻る</a>";
            exit();
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

    $sql = "INSERT INTO ST_KANRI_MYSQL( KAHIKA, KASHBAN, KACDUN, KACDDR, KANMRY1, KATMHA1, KABIKO1, KANMRY2, KATMHA2, KABIKO2 ) VALUES (?,?,?,?,?,?,?,?,?,?)";

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

    session_destroy();

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