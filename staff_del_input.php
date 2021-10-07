<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>削除　データ表示</TITLE>
</head>
<body>

<?php

try
{
    session_start();                    //セッションの開始
    
    $id = $_GET['id'];
    $sid = session_id(); 

    include ('userfile.php');

//HEROKUへ接続    
//DB名、ユーザー名、パスワード
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

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = "SELECT * FROM ST_STAFF WHERE id = ?";
 
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $id; // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
 
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    //$id =$rec['id'];
    $name = $rec['name'];
    $address =$rec['address'];
    $biko = $rec['bikou'];
 
    $dbh = null;

}
catch (PDOException $e)
{
    exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

<caption>スタッフ削除</caption>
<br>
CD：<?php print $id; ?>
<br>
名前： <input type="text" name="name" style= "width:200px" value="<?php print $name; ?>">
<br>
住所： <input type="text" name="address" style= "width:500px" value="<?php print $address; ?>">        
<br>
備考： <textarea  name="biko" cols="40" rows="5" ><?php print $biko; ?></textarea>
<br>
この名前を削除してもよろしいですか？
<br><br>


<form method="GET" action="staff_del.php">    
    <input type='hidden' name='id' value='<?php print $id; ?>'>      
    <input type='hidden' name='sid' value='<?php print $sid; ?>'>  <!--秘密情報としてsession_id()をセット-->
    <input type='button' onclick='history.back()' value='戻る'>
    <input type='submit' value='ＯＫ'>
</form>
</body>    
</html>