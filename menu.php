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
            <br><br><br>
<?php
    session_start();
    session_regenerate_id(true);            //セッションIDを変える

    print "<div id='menu'>";
    print "<p>";
    print "<a href = 'haisha_top.php'>配車情報　検索</a>";

    if($_SESSION["login_kbjg"]==1)
    {
        print "<br><br>";
        print "<a href = 'keppin_desp.php'>欠品遅れ情報</a>";
        print "<br><br>";
        print "<a href = 'ke100_top.php'>搬入計画一覧</a>";
        print "<br><br>";
        print "<a href = 'kanri_top.php'>配車状況確認</a>";
    }

    print "</p>";
    print "</div>";
    print "<br><br>";
    print "<a href= 'haisha_logout.php'>ログアウト</a><br>";
?>
        </div>
    </body>
</html>