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
             <br>

<?php
    session_start();
    session_regenerate_id(true);            //セッションIDを変える
    if (isset($_SESSION["login"])==false)
    {
        print "<br><br>";
        print "ログインされていません。<br>";
        print "<a href = 'index.php'>ログイン画面へ</a>";
        exit();
    }
    else
    {
        print "<div id='session'>";
        print "<p>";
        print $_SESSION["login_name"];
        print "さん　ログイン中<br>";
        print "</p>";
        print "</div>";
        print "<br>";
    }
?>
<?php
    require_once ("common.php");
?>
            <div id='hiha'>
                表示したい配車日を入力してください。<br>
                <form method="POST" name="form1" action="kanri_hiha_check.php">
                    <?php pulldown_year(); ?>
                    年
                    <?php pulldown_month(); ?>
                    月
                    <?php pulldown_day(); ?>        
                    日<br>
                    <br>
                    <input type='submit' value=' 検索 '>
                </form>
                <br>
                <input type='button' style='width:200px;height:50px' value='配車状況メニューへ' onclick='kanri_top.php'>
            <!--    <a href= 'kanri_top.php'>配車状況メニューへ</a><br> -->
            </div>
        </div>
    </body>
</html>