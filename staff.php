<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
    include ("userfile.php");

//HEROKUへ接続    
//    $dsn = 'mysql:dbname=heroku_6f8d251016271cf;host=us-cdbr-east-04.cleardb.com;charset=utf8';
//    $user = 'b0a0ba98ce8296';
//    $password = 'c0ebd5f';
//MYSQLへ接続
//    $dsn = 'mysql:dbname=mydb;host=localhost;charset=utf8';
//    $user = 'root';
//    $password = 'katou_ma3';
//sql_serverへ接続
//    $dsn = 'sqlsrv:server=.\sqlexpress;database=MyDB';
//    $user = 'sa';
//    $password = 'kbc';

try{
    $dbh = new PDO($dsn, $user, $password);

    //クエリー文を指定
    $sql = "SELECT * from ST_STAFF";

?>

  <table>
  	<caption>スタッフリスト</caption>

<?php
    //実行結果を描画
    foreach ($dbh->query($sql) as $row) {
        printf("<tr><td class='hdr'>".$row['id']."</td>");
        printf("<td>".$row['name']."</td></tr>");
    }
?>
  </table>

<?php
}
catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
    </body>
</html>