<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="table.css">
        <link rel="stylesheet" media="screen and (max-width:800px)" href="table_sp.css">
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

    $code= $_SESSION["login_code"];
    $kbjg= $_SESSION["login_kbjg"];

    $year= $_SESSION["haisha_year"];            //$post["year"];
    $month= $_SESSION["haisha_month"];          //$post["month"];
    $day= $_SESSION["haisha_day"];              //$post["day"];
//print "ymd=".$year."/".$month."/".$day;

    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    if($kbjg==1)
    {
        $sql = " SELECT *
        FROM ST_HA000_MYSQL
        WHERE substring(HAHIHA,1,4)=?
          AND substring(HAHIHA,6,2)=?
          AND substring(HAHIHA,9,2)=?
        ORDER BY ST_HA000_MYSQL.HANOHA, ST_HA000_MYSQL.HANOHA_EDA";         // SELECT文を変数に格納。
    }
    else
    {
        $sql = " SELECT *
        FROM ST_HA000_MYSQL
        WHERE substring(HAHIHA,1,4)=?
          AND substring(HAHIHA,6,2)=?
          AND substring(HAHIHA,9,2)=?
          AND HACDUK=?
        ORDER BY ST_HA000_MYSQL.HANOHA, ST_HA000_MYSQL.HANOHA_EDA";         // SELECT文を変数に格納。
    }
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $year;          // 挿入する値を配列に格納する
    $params[] = $month;          
    $params[] = $day;          
    $params[] = $code;          

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    

    print "<div id='session'>";
    print "配車　検索結果<br><br>";
    print "</div>";
    print "<div id='hiha'>";
    print "<table class= 'haisha_tbl'>";
    print "<tr>";
    print "<th>"."現場名"."</th>";
    print "<th>"."搬入日"."</th>";
    print "<th>"."時間"."</th>";
    print "<th>"."実車会社"."</th>";
    print "<th>"."車輛"."</th>";
    print "<th>"."車番"."</th>";
    print "<th>"."運転者"."</th>";
    print "<th>"."TEL"."</th>";
    print "<th>"."荷受人"."</th>";
    print "<th>"."TEL"."</th>";    
    print "<th>"."搬入会社"."</th>";
    print "<th>"."人工"."</th>";
    print "</tr>";

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false)
        {
            break;
        }

        print "<tr>";
        print "<td>".$rec['HANMRY1']."</td>";
        print "<td>".date('Y/m/d',strtotime($rec['HAHIHA']))."</td>";
        if ($rec['HATMHA1']=="1900-01-01 00:00:00")
        {
            print "<td> </td>";
        }
        else
        {
            print "<td>".date('H:i',strtotime($rec['HATMHA1']))."</td>";
        }
        print "<td>".$rec['HACDUN_JI_NM']."</td>";
        print "<td>".$rec['SHNMSH']."</td>";
        print "<td>".$rec['HANOSH']."</td>";
        print "<td>".$rec['HANMDR_JI']."</td>";
        print "<td>".$rec['HATLDR_JI']."</td>";
        print "<td>".$rec['HANMUK']."</td>";
        print "<td>".$rec['HATLUK']."</td>";
        print "<td>".$rec['HARYHA']."</td>";
        print "<td>".$rec['KEHANY_TANI']."</td>";
        print "</tr>";
    }
    print "</table>";
    print "</div>";
    print "<br>";
    print "<a href='haisha_top.php'>日付選択へ</a><br>";    
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