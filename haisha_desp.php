<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>配車情報　表示</TITLE>
<style type="text/css">
    table{
        border-color:skyblue;
        border-style:solid;
        boder-widht:1px;
        width:1000px;
        }
    .hdr{background-color:gainsboro}

    table th{
        text-align: center;
        color:white;
        background: linear-gradient(#829ebc,#225588);
        border-left: 1px solid #3c6690;
        border-top: 1px solid #3c6690;
        border-bottom: 1px solid #3c6690;
        box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
<!--        width: 25%; -->
        padding: 10px 0;
        }

    table td{
        text-align: center;
        border-left: 1px solid #a8b7c5;
        border-bottom: 1px solid #a8b7c5;
        border-top:none;
        box-shadow: 0px -3px 5px 1px #eee inset;
<!--         width: 25%; -->
        padding: 10px 0;
        }

</style></head>
<body>

    
<?php    
try
{
    require_once('common.php');

    $post = sanitize($_POST);                 //前画面からのデータを変数にセット

    $year= $post["year"];
    $month= $post["month"];
    $day= $post["day"];



//    print " year= ".$year; 
//    print " month= ".$month; 
//    print " day= ".$day; 




    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = " SELECT *
    FROM ST_HA000_MYSQL
    WHERE substring(HAHIHA,1,4)=?
      AND substring(HAHIHA,6,2)=?
      AND substring(HAHIHA,9,2)=?      
    ORDER BY ST_HA000_MYSQL.HANOHA, ST_HA000_MYSQL.HANOHA_EDA";         // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $year;          // 挿入する値を配列に格納する
    $params[] = $month;          
    $params[] = $day;          

    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    

    print "配車　検索結果<br><br>";
    print ("<table>");
    print("<tr>");
    print("<th>"."現場名"."</th>");
    print("<th>"."搬入日"."</th>");
    print("<th>"."時間"."</th>");
    print("<th>"."実車会社"."</th>");
    print("<th>"."車輛"."</th>");
    print("<th>"."車番"."</th>");
    print("<th>"."運転者"."</th>");
    print("<th>"."TEL"."</th>");
    print("<th>"."搬入会社"."</th>");
    print("<th>"."人工"."</th>");
    print("</tr>");

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false)
        {
            break;
        }


//    print " now= ".date('Y/n/d');
    
//    $d= $rec['HAHIHA'];
//    print " HAHIHA= ".$rec['HAHIHA']; 
//    $d= date('Y/m/d',strtotime($rec['HAHIHA']));   
//
//    $t= $rec['HATMHA1'];    
//    print " HATMHA1= ".$rec['HATMHA1'];     
//    $t= date('H:i',strtotime($rec['HATMHA1'])); 
//    
//    print " DATE2= ".$d; 
//    print " TIME2= ".$t; 



        print("<tr>");
        print("<td>".$rec['HANMRY1']."</td>");
        print("<td>".date('Y/m/d',strtotime($rec['HAHIHA']))."</td>");
        print("<td>".date('H:i',strtotime($rec['HATMHA1']))."</td>");
        print("<td>".$rec['HACDUN_JI_NM']."</td>");
        print("<td>".$rec['SHNMSH']."</td>");
        print("<td>".$rec['HANOSH']."</td>");
        print("<td>".$rec['HANMDR_JI']."</td>");
        print("<td>".$rec['HATLDR_JI']."</td>");
        print("<td>".$rec['HARYHA']."</td>");
        print("<td>".$rec['KEHANY_TANI']."</td>");
        print("</tr>");
    }
    print("</table>");
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

</body>    
</html>