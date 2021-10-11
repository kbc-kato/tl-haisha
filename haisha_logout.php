<?php
    session_start();
    $_SESSION=array();          //セッション変数を空にする

    if (isset($_COOKIE[session_name()])==true)
    {
        setcookie(session_name,"",time()-42000,"/");
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>ログアウト</TITLE>
</head>
<body>
    ログアウトしました。<br>
    <br>
    <a href="index.php">ログイン画面へ</a>    
</body> 
</html>