<html>
<head><title>PHP HAISHA</title>
<style type="text/css">
    table{
        border-color:skyblue;
        border-style:solid;
        boder-widht:1px;
        width:1000px;
        }
    .hdr{background-color:gainsboro}
</style>
</head>
<body>
<br>

<?php
    session_start();
    session_regenerate_id(true);            //セッションIDを変える
    if (isset($_SESSION["login"])==false)
    {
        print "ログインされていません。<br>";
        print "<a href = 'index.php'>ログイン画面へ</a>";
        exit();        
    }
    else    
    {
        print $_SESSION["login_name"];
        print "さん　ログイン中<br>";
        print "<br>";
    }
?>
<?php
    require_once ("common.php")
?>
表示したい配車日を入力してください。<br>
    <form method="post" action="haisha_desp.php">
        <php pulldown_year(); ?>
        年
        <php pulldown_month(); ?>
        月
        <php pulldown_day(); ?>        
        日<br>
        <br>
        <input type='submit' value='検索'>
    </form>
    <br>
    <a href= 'haisha_logout.php'>ログアウト</a><br>
</body>
</html>