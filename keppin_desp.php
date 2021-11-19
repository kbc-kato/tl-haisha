<!DOCTYPE html>
<html lang="ja">
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
//    session_start();
//    session_regenerate_id(true);            //セッションIDを変える
    
    require_once('common.php');

//    $post = sanitize($_POST);                 //前画面からのデータを変数にセット

    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = " SELECT *
    FROM ST_KEPIN_MYSQL
    WHERE SMAUTO>?
    ORDER BY ST_KEPIN_MYSQL.BKNOKA, ST_KEPIN_MYSQL.BKNOBK, ST_KEPIN_MYSQL.KENOHY, ST_KEPIN_MYSQL.KELTHA, ST_KEPIN_MYSQL.SMSEQ";         // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = 0;          // 挿入する値を配列に格納する

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断

    print "<div id='session'>";
    print "欠品遅れ情報<br><br>";
    print "</div>";
    print "<div id='keppin'>";
    print "<table class= 'keppin_tbl'>";
    print "<tr>";
    print "<th>"."工事№"."</th>";
    print "<th>"."工事名称"."</th>";
    print "<th>"."棟名"."</th>";
    print "<th>"."フロア"."</th>";
    print "<th>"."部屋番"."</th>";
    print "<th>"."戸数"."</th>";
    print "<th>"."施工区分"."</th>";
    print "<th>"."搬入番号"."</th>";
    print "<th>"."項目番号"."</th>";
    print "<th>"."商品情報"."</th>";
    print "<th>"."部屋番"."</th>";
    print "<th>"."搬入日"."</th>";
    print "<th>"."移動日"."</th>";
    print "<th>"."今ドコ？"."</th>";
    print "<th>"."発注№"."</th>";
    print "<th>"."発注日"."</th>";
    print "<th width='50'>"."備考"."</th>";
    print "<th>"."荷数"."</th>";
    print "<th>"."荷姿"."</th>";
    print "<th>"."数量"."</th>";
    print "<th>"."単位"."</th>";
    print "<th>"."備考2"."</th>";
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
        print "<td>".$rec['BKRYKJ']."</td>";
        print "<td>".$rec['KENMTO']."</td>";
        print "<td>".$rec['KESUFL']."</td>";
        print "<td>".$rec['KEHEYA']."</td>";
        print "<td>".$rec['KESUKO']."</td>";
        print "<td>".$rec['KESEKB_NM']."</td>";
        print "<td>".$rec['KELTHA']."</td>";
        print "<td>".$rec['SMLTSE']."</td>";
        print "<td>".$rec['SMKONK']." " .$rec['SMHIN']." " .$rec['SMSIYO']."</td>";
        print "<td>".$rec['SMHEYA']."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['KEHIKE']))."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['SMIDO']))."</td>";
        print "<td>".$rec['SMDOKO']."</td>";
        print "<td>".$rec['SMNOHC']."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['SMHIHC_KAKU']))."</td>";
        print "<td>".$rec['SMBIKO_ME']."</td>";
        print "<td>".$rec['SMSUSO_NI']."</td>";
        print "<td>".$rec['SMNISU']."</td>";
        print "<td>".$rec['SMSUSO']."</td>";
        print "<td>".$rec['SMTANI']."</td>";
        print "<td>".$rec['SMBIKO']."</td>";
        print "</tr>";
    }
    print "</table>";
    print "<br>";
?>
    <input type='button' style='width:200px;height:50px' value='メニューへ戻る' onclick='location.href="menu.php"'>
<?php
//    print "<a href='menu.php'>メニューへ戻る</a><br>";    
    print "</div>";
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