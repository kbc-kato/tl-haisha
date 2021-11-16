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
    if(isset($_GET['hika'])==true) 
    {
        $y=date('Y', strtotime($_GET['hika']));
        $m=date('n', strtotime($_GET['hika']));
        $d=date('d', strtotime($_GET['hika']));
    }


        print "№が選択されていません。<BR>";
        print "<a href='kanri_hiha_desp.php?year=".$y."&month=".$m."&day=".$d."'>戻る</a>";

?>
    </body>
</html>