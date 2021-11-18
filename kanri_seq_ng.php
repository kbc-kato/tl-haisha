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
<?php

ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );


    session_start();

    if(isset($_GET['year'])==true) 
    {
        $y=$_GET['year'];
        $m=$_GET['month'];
        $d=$_GET['day'];
    }
//print "ymd=".$year."/".$month."/".$day."<br>";

        print "№が選択されていません。<BR>";
//        if(strcmp($_SESSION["shori_kbn"],"1")==0)
        if($_SESSION["shori_kbn"]=="1")
        {
            print "<a href='kanri_hiha_desp.php'>戻る</a>";           
        }
        else
        {
            print "<a href='kanri_shban_desp.php'>戻る</a>";             
        }

//        print "<a href='kanri_hiha_desp.php?year=".$y."&month=".$m."&day=".$d."'>戻る</a>";
?>
    </body>
</html>