<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>配車情報　表示</TITLE>
</head>
<body>
<table>
    
<?php    
try
{
    require_once('common.php');

    $post = sanitize($_POST);                 //前画面からのデータを変数にセット

    $year= $post["year"];
    $month= $post["month"];
    $day= $post["day"];



    print " year= ".$year; 
    print " month= ".$month; 
    print " day= ".$day; 




    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = " SELECT ST_HA000.HANMRY1
        , ST_HA000.HAHIHA
        , ST_HA000.HATMHA1
        , ST_HA000.HACDUN_JI_NM
        , ST_SHRM_NEW.SHNMSH
        , ST_HA000.HANOSH
        , ST_HA000.HANMDR_JI
        , ST_HA000.HATLDR_JI
        , ST_HANM.HARYHA
        , ST_KE000.KEHANY_TANI
    FROM ST_HA000, ST_KE000, ST_HANM, ST_SHRM_NEW    
    WHERE (ST_HA000.HANOGY_OR1 = ST_KE000.KENOGY AND ST_HA000.HANOBK_OR1 = ST_KE000.KENOBK)
      AND (ST_KE000.KEHANY_KA = ST_HANM.HACDHA)
      AND (ST_HA000.HASHAR = ST_SHRM_NEW.SHCDSH)
      AND substr(ST_HA000.HAHIHA,1,4)=?
      AND substr(ST_HA000.HAHIHA,6,2)=?
      AND substr(ST_HA000.HAHIHA,9,2)=?      
    ORDER BY ST_HA000.HANOHA, ST_HA000.HANOHA_EDA";         // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $year;          // 挿入する値を配列に格納する
    $params[] = $month;          
    $params[] = $day;          

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    

    print "配車　検索結果<br><br>";
    
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if (rec==false)
        {
            break;
        }
        
        print("<tr>");
        print("<td>".$rec['HANMRY1']."</td>");
        print("<td>".$rec['HAHIHA']."</td>");
        print("<td>".$rec['HATMHA1']."</td>");
        print("<td>".$rec['HACDUN_JI_NM']."</td>");
        print("<td>".$rec['SHNMSH']."</td>");
        print("<td>".$rec['HANOSH']."</td>");
        print("<td>".$rec['HANMDR_JI']."</td>");
        print("<td>".$rec['HATLDR_JI']."</td>");
        print("<td>".$rec['HARYHA']."</td>");
        print("<td>".$rec['KEHANY_TANI']."</td>");
        print("</tr>");
    }
    print("<br>");
    print("<a href='haisha_top.php'>日付選択へ</a><br>");    
    print("<br>");
        
}
catch (exception $e)
{
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit();
}

?>    
</table>
</body>    
</html>