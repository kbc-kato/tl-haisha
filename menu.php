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
                <h1>メインメニュー</h1>
            </div>
            <br><br><br>
<?php
    session_start();
    session_regenerate_id(true);            //セッションIDを変える
?>

    <div id='menu'>
    <p>
    <input type='button' style='width:200px;height:50px' value='配車情報　検索' onclick='haisha_top.php;'>
    //    print "<a href = 'haisha_top.php'>配車情報　検索</a>";

<?php
    if($_SESSION["login_kbjg"]==1)
    {
?>
        <br><br>
        <button type='button' style='width:200px;height:50px' onclick='location.href="keppin_desp.php"'>欠品遅れ情報</button>
//        print "<input type='button' style='width:200px;height:50px' value='欠品遅れ情報' onclick='keppin_desp.php;'>";
//        print "<a href = 'keppin_desp.php'>欠品遅れ情報</a>";
        <br><br>
        <input type='button' style='width:200px;height:50px' value='搬入計画一覧' onclick='ke100_top.php;'>
//        print "<a href = 'ke100_top.php'>搬入計画一覧</a>";
        <br><br>
        <input type='button' style='width:200px;height:50px' value='配車状況確認' onclick='ke100_top.php;'>
//        print "<a href = 'kanri_top.php'>配車状況確認</a>";
<?php
    }
?>
    </p>

    <br><br>
    <input type='button' style='width:200px;height:50px' value='ログアウト' onclick='haisha_logout.php;'>
//    print "<a href= 'haisha_logout.php'>ログアウト</a><br>";
    </div>

        </div>
    </body>
</html>