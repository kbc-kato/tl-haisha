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
        <div id="pagebody">
        <!-- ヘッダー -->
            <div id = "header">
                <h1>社員ログイン</h1>
            </div>
            <br><br>
<?php
    print "<div id='login'>";
    print "<form method='POST' name='form2' action='login_check.php'>";
    print "<label>社員コード :";
    print "<input type ='text' name = 'code' size='10' autocomplete='off' onkeypress='if(window.event.keyCode==13) { form2.pass.focus(); }' style='ime-mode: disabled;'></label>";
    print "<br><br>";
    print "<label>パスワード :";
    print "<input type ='password' size='10' name = 'pass' autocomplete='off' onkeypress='if(window.event.keyCode==13) { submitflag = 1; form2.btn.focus(); }'></label>";
    print "<br><br>";
    print "<input type='button' name='btn' onClick='submit();' value = ' ログイン '>";
//    print "<input type ='submit' value = 'ログイン'>";
    print "</form>";
//    print "<hr>";
    print "</div>";
?>
        </div>

<script type="text/javascript">
        var submitflag=0;
</script>
    </body>
</html>