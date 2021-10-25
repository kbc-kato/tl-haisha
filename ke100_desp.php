<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="table_kp.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id = "pagebody">

<?php    
try
{
    session_start();
    session_regenerate_id(true);            //セッションIDを変える
    
    require_once('common.php');

//    $post = sanitize($_POST);                 //前画面からのデータを変数にセット

    $year= $_SESSION["hanyu_year"];            //$post["year"];
    $month= $_SESSION["hanyu_month"];          //$post["month"];
    $day= $_SESSION["hanyu_day"];              //$post["day"];
print "ymd=".$year."/".$month."/".$day;

    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = " SELECT *
    FROM ST_KE100_MYSQL
    WHERE substring(KEHIKE,1,4)=?
      AND substring(KEHIKE,6,2)=?
      AND substring(KEHIKE,9,2)=?  
    ORDER BY ST_KE100_MYSQL.BKNOKA, ST_KE100_MYSQL.KENOBK, ST_KE100_MYSQL.KENOHY, ST_KE100_MYSQL.KELTHA";         // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $year;          // 挿入する値を配列に格納する
    $params[] = $month;          
    $params[] = $day;   
    
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    

    print "<div id='session'>";
    print "搬入計画一覧<br><br>";
    print "</div>";
    print "<div id='keppin'>";
    print "<table class= 'keppin_tbl'>";
    print "<tr>";
    print "<th>"."工事№"."</th>";
    print "<th>"."工事状態"."</th>";
    print "<th>"."工事名称"."</th>";
    print "<th>"."工事種別"."</th>";
    print "<th>"."搬入"."</th>";
    print "<th>"."行№"."</th>";
    print "<th>"."棟名"."</th>";
    print "<th>"."フロア"."</th>";
    print "<th>"."部屋番"."</th>";
    print "<th>"."戸数"."</th>";
    print "<th>"."施工区分"."</th>";
    print "<th>"."施工ﾃｷｽﾄ"."</th>";
    print "<th>"."施工ﾀｲﾐﾝｸﾞ"."</th>";
    print "<th>"."施工品"."</th>";
    print "<th>"."搬入日"."</th>";
    print "<th>"."決定"."</th>";
    print "<th>"."時間"."</th>";

    print "<th>"."可大車両"."</th>";
    print "<th>"."最終納入決定日"."</th>";
    print "<th>"."最終出荷可能日"."</th>";
    print "<th>"."発注ﾘﾐｯﾄ"."</th>";
    print "<th>"."承認日"."</th>";
    print "<th>"."作図ﾘﾐｯﾄ"."</th>";

    print "<th>"."システム工場"."</th>";
    print "<th>"."家具工場"."</th>";
    print "<th>"."カウンタ工場"."</th>";
    print "<th>"."棚板工場"."</th>";
    print "<th>"."扉工場"."</th>";
    print "</tr>";

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false)
        {
            break;
        }

        print "<tr>";
        print "<td>".$rec['BKNOKA']."</td>";
        print "<td>".$rec['BKKBN_NMJ']."</td>";
        print "<td>".$rec['BKNMKJ']."</td>";
        print "<td>".$rec['BKSHUB_NM']."</td>";
        print "<td>".$rec['KELTHA']."</td>";
        print "<td>".$rec['KENOHY']."</td>";
        print "<td>".$rec['KENMTO']."</td>";
        print "<td>".$rec['KESUFL']."</td>";
        print "<td>".$rec['KEHEYA']."</td>";
        print "<td>".$rec['KESUKO']."</td>";
        print "<td>".$rec['KESEKB_NM']."</td>";
        print "<td>".$rec['KESETX']."</td>";
        print "<td>".$rec['KESETM']."</td>";
        print "<td>".$rec['KESUKO']."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KEHIKE']))."</td>";
        print "<td>".$rec['KEKBKE_NM']."</td>";
        print "<td>".date('H:i',strtotime($rec['KETMKE']))."</td>";
        print "<td>".$rec['KESITEI']."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KEHISY_ME']))."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KEKANO_ME']))."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KENOKI_SEISK']))."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KENOKI_ZUMN']))."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KENOKI_TORI']))."</td>";
        print "<td>".$rec['BKSYST_KO_NM']."</td>";
        print "<td>".$rec['BKKAGU_KO_NM']."</td>";
        print "<td>".$rec['BKSOUT_KO_NM']."</td>";
        print "<td>".$rec['BKTANA_KO_NM']."</td>";
        print "<td>".$rec['BKTOBR_KO_NM']."</td>";
        print "</tr>";
    }
    print "</table>";
    print "</div>";
    print "<br>";
    print "<a href='ke100_top.php'>日付選択へ</a><br>";   
    print "<br>";
}
catch (exception $e)
{
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit();
}
?>
        </div>
    </body>
</html>