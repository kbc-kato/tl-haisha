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
                <h1>社員ログイン</h1>
            </div>
            <br><br>
<?php
    print "<div id='login'>";
    print "<form method='POST' name='form2' action='login_check.php'>";
    print "社員コード<br>";
    print "<input type ='text' size='10' name = 'code' autocomplete='off'>";
    print "<br><br>";
    print "パスワード<br>";
    print "<input type ='password' size='10' name = 'pass' autocomplete='off'>";
    print "<br><br>";
    print "<input type ='submit' value = 'ログイン'>";
    print "</form>";
//    print "<hr>";
    print "</div>";
?>
        </div>
    </body>
</html>