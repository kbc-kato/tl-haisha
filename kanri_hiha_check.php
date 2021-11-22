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
    
    $year= $post["year"];
    $month= $post["month"];
    $day= $post["day"];


    if(checkdate($month,$day,$year)==false)
    {
        print "<br><br>";
        print "日付が間違っています。<br>";
?>
        <input type='button' style='width:200px;height:40px' value='日付選択へ' onclick='location.href="haisha_top.php"'>
<?php
        //        print "<a href = 'haisha_top.php'>日付選択へ</a>";
    }
    else
    {

        session_start();
        $_SESSION["haisha_year"]=$year;
        $_SESSION["haisha_month"]=$month;
        $_SESSION["haisha_day"]=$day;
        $_SESSION["shori_kbn"] = "1";       //処理区分=1(日付検索)

        var_dump($_SESSION);  

        header("location:kanri_hiha_desp.php");
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