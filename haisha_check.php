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
    
    $year= $post["year"];
    $month= $post["month"];
    $day= $post["day"];


    if(checkdate($month,$day,$year)==false)
    {
        print "<br><br>";
        print "日付が間違っています。<br>";
        print "<a href = 'haisha_top.php'>日付選択へ</a>";
    }
    else
    {
        session_start();
        $_SESSION["haisha_year"]=$year;
        $_SESSION["haisha_month"]=$month;
        $_SESSION["haisha_day"]=$day;
        
        header("location:haisha_desp.php");
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