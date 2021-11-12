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
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

    require_once ("common.php");

//    session_start();

    print "<div id='kanri'>";

    print "<form method='POST' name='form2' action='kanri_check.php'>";
    print "<input type='hidden' name='kakushi' value='secret'>";
    
    print "<table class='kanri_tbl'>";
    print "<tr>";
    print "<th>"."配車日"."</th>";
    print "<td>";
    print "<input type ='date' name = 'hiha' form = 'main'>";
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."車番"."</th>";
    print "<td>";
    print pulldown_shban();
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."運送会社"."</th>";
    print "<td>";
    print pulldown_unsm();
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."運転者"."</th>";
    print pulldown_drvm();
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."行先1"."</th>";
    print "<td>";
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' form = 'main'>";
    print " 着時間 ";
    print "<input type ='time' name = 'tmha1' form = 'main'>";
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."備考"."</th>";
    print "<td>";
    print "<textarea name = 'biko1' cols='40' rows='5' form = 'main'></textarea>";
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."行先2"."</th>";
    print "<td>";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' form = 'main'>";
    print " 着時間 ";
    print "<input type ='time' name = 'tmha2' form = 'main'>";
    print "</td>";
    print "</tr>";

    print "<tr>";
    print "<th>"."備考"."</th>";
    print "<td>";
    print "<textarea name = 'biko2' cols='40' rows='5' form = 'main'></textarea>";
    print "</td>";
    print "</tr>";
    print "</table>";


//    print "<form  action='kanri_check.php' id='main' method = 'POST'>";
    print "<input type ='submit' value = '更新'>";
    print "</form>";
//    print "<hr>";
    print "</div>";
?>
        </div>
    </body>
</html>