<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="table_ka.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="table_ka_sp.css">
        <link rel="stylesheet" href="form.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id = "pagebody">
    
<?php    
try
{
    session_start();
//    session_regenerate_id(true);            //セッションIDを変える

ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );


    require_once('common.php');

//    $post = sanitize($_POST);                 //前画面からのデータを変数にセット

//print "前画面=".$_SERVER['HTTP_REFERER'];

    $year= $_SESSION["haisha_year"];            //$post["year"];
    $month= $_SESSION["haisha_month"];          //$post["month"];
    $day= $_SESSION["haisha_day"];              //$post["day"];
//print "ymd=".$year."/".$month."/".$day."<br>";

    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

//ワークテーブルクリア
    $sql = "DELETE FROM WK_KANRI_HIHA;";
    $dbh->exec($sql);

//ワークテーブルに元データをinsert 
    $sql = "INSERT INTO wk_kanri_hiha ( SHCDSH, SHNMSH )
            SELECT ST_SHBAN_MYSQL.SHCDSH, ST_SHBAN_MYSQL.SHNMSH
            FROM ST_SHBAN_MYSQL";
    $dbh->exec($sql);

//st_kanri_mysqlからデータを取得,更新する
    $sql = " SELECT *
            FROM st_kanri_mysql
            WHERE substring(kahika,1,4)=?
              AND substring(kahika,6,2)=?
              AND substring(kahika,9,2)=?
            ORDER BY st_kanri_mysql.seq";
    
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $year;          // 挿入する値を配列に格納する
    $params[] = sprintf("%02d", $month);    //前ゼロ2桁          
    $params[] = sprintf("%02d", $day);    //前ゼロ2桁          

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行    

//パラメータ配列を削除
    unset($params);

    $rec = $stmt->fetchall(PDO::FETCH_ASSOC);
//var_dump($rec)."<br>";




    foreach($rec as $loop)
    {

        $sql = "UPDATE wk_kanri_hiha
                SET seq = ?
                  , kahika = ?
                  , kacdun = ?
                  , kacddr = ?
                  , kanmry1 = ?
                  , katmha1 = ?
                  , kabiko1 = ?
                  , kanmry2 = ?
                  , katmha2 = ?
                  , kabiko2 = ?
                where shcdsh = ?";

        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = $loop['seq'];          // 挿入する値を配列に格納する
        $params[] = $loop['kahika'];          
        $params[] = $loop['kacdun'];          
        $params[] = $loop['kacddr'];
        $params[] = $loop['kanmry1'];
        $params[] = $loop['katmha1'];
        $params[] = $loop['kabiko1'];
        $params[] = $loop['kanmry2'];
        $params[] = $loop['katmha2'];
        $params[] = $loop['kabiko2'];
        $params[] = $loop['kashban'];
//var_dump($params)."<br>";
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行        

//パラメータ配列を削除
        unset($params);
    }

    
    $sql = "SELECT wk_kanri_hiha.*, ST_UNSM_MYSQL.UNRYUN, ST_DRVM_MYSQL.DRNMDR
            FROM (wk_kanri_hiha 
            LEFT JOIN ST_UNSM_MYSQL
             ON wk_kanri_hiha.kacdun = ST_UNSM_MYSQL.UNCDUN)
            LEFT JOIN ST_DRVM_MYSQL
             ON (wk_kanri_hiha.kacddr = ST_DRVM_MYSQL.DRCDDR) AND (wk_kanri_hiha.kacdun = ST_DRVM_MYSQL.DRCDUN)
            where shcdsh > ?";

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = 0;          // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行    
    
    $PDO = null;        //データベースから切断   
    

    print "<div id='session'>";
    print "配車状況(".$year."/".$month."/".$day.")<br><br>";
    print "</div>";
    print "<div id='kanri'>";

    print "<form method = 'POST' action='kanri_hiha_branch.php'>";
    print "<table class= 'kanri_tbl'>";
    print "<tr>";
    print "<th>"." "."</th>";
    print "<th>"."№"."</th>";
    print "<th>"."車番"."</th>";
    print "<th>"."搬入日"."</th>";
    print "<th>"."運送会社"."</th>";
    print "<th>"."運転者"."</th>";
    print "<th>"."行先1"."</th>";
    print "<th>"."着時間"."</th>";
    print "<th>"."備考"."</th>";
    print "<th>"."行先2"."</th>";
    print "<th>"."着時間"."</th>";
    print "<th>"."備考"."</th>";    
    print "</tr>";

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false)
        {
            break;
        }

        print "<tr>";
        print "<td><input type='radio' name='code' value='".$rec['seq']."'></td>";

        print "<td>".$rec['seq']."</td>";
        print "<td>".$rec['shnmsh']."</td>";
        if ($rec['kahika']==null)
        {
            print "<td> </td>";
        }
        else
        {
            print "<td>".date('Y/m/d',strtotime($rec['kahika']))."</td>";
        }
        print "<td>".$rec['UNRYUN']."</td>";
        print "<td>".$rec['DRNMDR']."</td>";
        print "<td>".$rec['kanmry1']."</td>";
        print "<td>".$rec['katmha1']."</td>";
        print "<td>".$rec['kabiko1']."</td>";
        print "<td>".$rec['kanmry2']."</td>";
        print "<td>".$rec['katmha2']."</td>";
        print "<td>".$rec['kabiko2']."</td>";
        print "</tr>";
    }

    print "</table>";

    print "<br>";
    print "<input type ='submit' name='edit' style='width:200px;height:40px' value='修正'>";
    print "<input type ='submit' name='delete' style='width:200px;height:40px' value='削除'>";
    print "</form>";
    print "<br>";
?>
    <input type='button' style='width:200px;height:40px' value='新規登録' onclick='location.href="kanri_input.php"'>
<?php
//    print "<a href='kanri_input.php'>新規登録</a><br>";
    print "<br>";
    print "<br>";
?>
    <input type='button' style='width:200px;height:40px' value='日付選択へ' onclick='location.href="kanri_hiha.php"'>
<?php
    //    print "<a href='kanri_hiha.php'>日付選択へ</a><br>";
    print "</div>";
    print "<br>";
}
catch (exception $e)
{
print $e->getMessage();
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit();
}
?>
        </div>
    </body>
</html>