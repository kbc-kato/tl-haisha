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
        <div id="pagebody">
        <!-- ヘッダー -->
            <div id = "header">
                <h1>配車状況入力</h1>
            </div>
            <br><br>
<?php
    print "<div id='login'>";

    print "<label>配車日 :";
    print "<input type ='date' name = 'hiha' form = 'main'></label>";
    print "<br><br>";
    print "<label>車番 :";
    print pulldown_shban();
    print "<br>";
    print "<form method='POST' name='form2' action='kanri_unsm.php'>";
    print "<label>運送会社 :";
    print pulldown_unsm();
    print "<input type='submit' value='検索'>";
    print "</form>";
    print "<br>";
    print "<label>運転者 :";
    print pulldown_drvm();
    print "<br>";

    print "<label>行先1 :";
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' form = 'main'></label>";
    print "<label>着時間 :";
    print "<input type ='time' name = 'tmha1' form = 'main'></label>";
    print "<br>";    
    print "<label>備考 :";
    print "<textarea name = 'biko1' cols='40' rows='5' form = 'main'></textarea></label>";
    print "<br><br>";

    print "<label>行先2 :";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' form = 'main'></label>";
    print "<label>着時間 :";
    print "<input type ='time' name = 'tmha2' form = 'main'></label>";
    print "<br>";    
    print "<label>備考 :";
    print "<textarea name = 'biko2' cols='40' rows='5' form = 'main'></textarea></label>";
    print "<br><br>";

    print "<form  action='kanri_check.php' id='main' method = 'POST'>";
    print "<input type ='submit' value = '更新'>";
    print "</form>";
//    print "<hr>";
    print "</div>";
?>
        </div>
    </body>
</html>