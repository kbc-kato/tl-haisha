<html>
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
    session_start();
var_dump($_SESSION);    
    if(isset($_GET['year'])==true) 
    {
        $y=$_GET['year'];
        $m=$_GET['month'];
        $d=$_GET['day'];
    }
//print "ymd=".$year."/".$month."/".$day."<br>";

        print "№が選択されていません。<BR>";
        if(isset($_SESSION["shban"])==true)
        {
            print "<a href='kanri_shban_desp.php?>shaban戻る</a>";            
        }
        else
        {
            print "<a href='kanri_hiha_desp.php?>hiduke戻る</a>";            
        }

//        print "<a href='kanri_hiha_desp.php?year=".$y."&month=".$m."&day=".$d."'>戻る</a>";
?>
    </body>
</html>