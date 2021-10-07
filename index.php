<html>
<head><title>PHP TEST</title>
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
<table>
<caption>スタッフリスト</caption>
<br>

<?php

try
{
    include ('userfile.php');

//HEROKUへ接続
//    $dsn = 'mysql:dbname=heroku_6f8d251016271cf;host=us-cdbr-east-04.cleardb.com;charset=utf8';
//    $user = 'b0a0ba98ce8296';
//    $password = 'c02ebd5f';
//MYSQLへ接続
//    $dsn = 'mysql:dbname=mydb;host=localhost;charset=utf8';
//    $user = 'root';
//    $password = 'katou_ma3';
//sql_serverへ接続
//    $dsn = 'sqlsrv:server=.\sqlexpress;database=MyDB';
//    $user = 'sa';
//    $password = 'kbc';

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示  

    $sql = "select * from ST_STAFF";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $dbh =null;

    print "<form method='post' action='staff_brc.php'>";
 
    print "<input type ='submit' name = 'insert' value = '新規登録'>";
    print "<input type ='submit' name = 'edit' value = '修正'>";
    print "<input type ='submit' name = 'delete' value = '削除'>";
 
 
    while(true)
    {
        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        if ($rec==false)
        {
            break;
        }

        print("<tr><td><input type='radio' name='id' value='".$rec['id']."'</td>");
        print("<td class='hdr'>".$rec['id']."</td>");
        print("<td>".$rec['name']."</td>");
        print("<td>".$rec['address']."</td>");
        print("<td>".$rec['bikou']."</td></tr>");
    }
    print("</form>");
}
catch(PDOException $e)
{
    print "ただいま障害により大変ご迷惑をお掛けしております。";
    exit();
}
?>
</table>
</body>
</html>