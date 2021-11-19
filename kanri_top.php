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
            <br><br><br>
<?php
    print "<div id='menu'>";
    print "<p>";
?>
    <input type='button' style='width:200px;height:50px' value='日付検索' onclick='location.href="kanri_hiha.php"'>
<?php
    //    print "<a href = 'kanri_hiha.php'>日付検索</a>";
    print "<br><br>";
?>
    print "<input type='button' style='width:200px;height:50px' value='車番検索' onclick='location.href="kanri_shban.php"'>
<?php
    //    print "<a href = 'kanri_shban.php'>車番検索</a>";
    print "</p>";
    print "<br><br>";
?>
    print "<input type='button' style='width:200px;height:50px' value='メニューへ戻る' onclick='location.href="menu.php"'>
<?php
    //    print "<a href= 'menu.php'>メニューへ戻る</a><br>";
    print "</div>";
?>
        </div>
    </body>
</html>