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
    
    $code = $post["code"];                  //変数をエスケープする

    include ("userfile.php");               //$dsn,$user,$password

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
    
    $sql = "SELECT * FROM ST_JGTM WHERE st_jgtm.JGCDJG=?"; // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $code;          // 挿入する値を配列に格納する
    
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec==false)
    {
        print "<br><br>";
        print "社員コードが間違っています。<br>";
        print "<a href = 'index.php'>戻る</a>";
    }
    else
    {
        session_start();
        $_SESSION["login"]=1;
        $_SESSION["login_code"]=$code;
        $_SESSION["login_name"]=$rec["JGNMJG"];
        
        header("location:haisha_top.php");
        exit;
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