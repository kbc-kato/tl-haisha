<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id="pagebody">
        <!-- ヘッダー -->
            <div id = "header">
                <h1>社員ログイン</h1>
            </div>
            <br><br>
<?php
    print "<div id='login'>";
    print "<form method='POST' action='login_check.php'>";
    print "社員cd<br>";
    print "<input type ='text' name = 'code'>"  ;
    print "<input type ='submit' value = 'ログイン'>";
    print "</form>";
    print "<hr>";
    print "</div>";
?>
        </div>
    </body>
</html>