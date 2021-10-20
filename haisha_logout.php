<?php
    session_start();
    $_SESSION=array();          //セッション変数を空にする

    if (isset($_COOKIE[session_name()])==true)
    {
        setcookie(session_name(),"",time()-42000,"/");
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id = "pagebody">
            ログアウトしました。<br>
            <br>
            <a href="index.php">ログイン画面へ</a>    
        </div>
    </body> 
</html>