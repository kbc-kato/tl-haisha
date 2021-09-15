<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
$dsn = 'sqlsrv:server=192.168.89.191;database=myDB';
//許可したいユーザー
$user = 'sa';
$password = 'kbc';

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