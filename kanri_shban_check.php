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
    
    $shban= $post["shban"];


    if($shban=='')
    {
        print "<br><br>";
        print "車番が未入力です。"."<br>";
        print "<a href = 'kanri_shban.php'>戻る</a>";
        exit();
    }
    else
    {
        if(isset($shban)==false)
        {
            print "<br><br>";
            print "車番が未入力です。"."<br>";
            print "<a href = 'kanri_shban.php'>戻る</a>";
            exit();
        }
        else
        {
            session_start();
            $_SESSION["shban"]=$shban;
    
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