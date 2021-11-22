<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="form.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id = "pagebody">
<?php
try
{
 
    require_once("common.php");

    $post = sanitize($_POST);               //前画面からのデータを変数にセット
    
    $shban= $post["shban"];

    include ("userfile.php");               //$dsn,$user,$password

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
    
    $sql = "SELECT * FROM ST_SHBAN_MYSQL WHERE st_shban_mysql.SHCDSH=?"; // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $shban;          // 挿入する値を配列に格納する
    
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($shban=='')
    {
        print "<br><br>";
        print "車番が未入力です。"."<br>";
?>
        <input type='button' style='width:100px;height:40px' value='戻る' onclick='location.href="kanri_shban.php"'>
<?php
//        print "<a href = 'kanri_shban.php'>戻る</a>";
        exit();
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。"."<br>";
?>
            <input type='button' style='width:100px;height:40px' value='戻る' onclick='location.href="kanri_shban.php"'>
<?php
//            print "<a href = 'kanri_shban.php'>戻る</a>";
            exit();
        }
        else
        {
            session_start();
            $_SESSION["shban"]=$shban;
            $_SESSION["shnmsh"]=$rec["SHNMSH"];
            $_SESSION["shori_kbn"] = "2";       //処理区分=2(車番検索)

            header("location:kanri_shban_desp.php");
            exit;
        }
    }
    
}
catch (exception $e)
{
    print "ただいま障害により大変ご迷惑をお掛けしております。" ;
}
?>    
        </div>
    </body>
</html>