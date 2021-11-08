<?php 
// ライブラリの読み込み
require_once('TCPDF/tcpdf.php');
 
// TCPDFインスタンスを作成
$orientation = 'Landscape'; // 用紙の向き
$unit = 'mm'; // 単位
$format = 'A4'; // 用紙フォーマット
$unicode = true; // ドキュメントテキストがUnicodeの場合にTRUEとする
$encoding = 'UTF-8'; // 文字コード
$diskcache = false; // ディスクキャッシュを使うかどうか
$tcpdf = new TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache);

$tcpdf->AddPage(); // 新しいpdfページを追加
 
$tcpdf->SetFont("kozgopromedium", "", 10); // デフォルトで用意されている日本語フォント
 

?>

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

        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = $year;          // 挿入する値を配列に格納する
        $params[] = $month;          
        $params[] = $day;          
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

        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = $year;          // 挿入する値を配列に格納する
        $params[] = $month;          
        $params[] = $day;          
        $params[] = $code;          
    }
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    
    $html =<<< EOF
    <div id='session'>
    配車　検索結果<br><br>
    </div>
    <div id='hiha'>
    <table class= 'haisha_tbl'>
    <tr>
    <th>現場名</th>
    <th>搬入日</th>
    <th>時間</th>
    <th>実車会社</th>
    <th>車輛</th>
    <th>車番</th>
    <th>運転者</th>
    <th>TEL</th>
    <th>荷受人</th>
    <th>TEL</th>
    <th>搬入会社</th>
    <th>人工</th>
    </tr>
EOF;

    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec==false)
        {
            break;
        }
        //$recの内容をworkにセット
        $hanmry1=$rec['HANMRY1'];
        $hahiha=date('Y/m/d',strtotime($rec['HAHIHA']));
        if ($rec['HATMHA1']=="1900-01-01 00:00:00")
        {
            $hatmha='';
        }
        else
        {
            $hatmha=date('H:i',strtotime($rec['HATMHA1']));
        }
        $hacdhn_ji_nm=$rec['HACDUN_JI_NM'];
        $shnmsh=$rec['SHNMSH'];
        $hanosh=$rec['HANOSH'];
        $hanmdr_ji=$rec['HANMDR_JI'];
        $hatldr_ji=$rec['HATLDR_JI'];
        $hanmuk=$rec['HANMUK'];
        $hatluk=$rec['HATLUK'];
        $haryha=$rec['HARYHA'];
        $hehany_tani=$rec['KEHANY_TANI'];


        $html .=<<< EOF
        <tr>
        <td>$hanmry1</td>
        <td>$hahiha</td>
        <td>$hatmha</td>
        <td>$hacdun_ji_nm</td>
        <td>$shnmsh</td>
        <td>$hanosh</td>
        <td>$hanmdr_ji</td>
        <td>$hatldr_ji</td>
        <td>$hanmuk</td>
        <td>$hatluk</td>
        <td>$haryha</td>
        <td>$kehany_tani</td>
        </tr>
EOF;

    }
    $html .=<<< EOF
    </table>
    </div>
    <br>
    <a href='haisha_top.php'>日付選択へ</a><br>    
    <br>
EOF;



// Using default PHP curl library
//$ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=H3QW2E59S8VDR0846YFAT5460NMJUGBIO7LC719XP12K3Z&content=http://www.wikipedia.org&margin=10&html_width=1024&title=My PDF Title');
//
//$response = curl_exec($ch);
//curl_close($ch);
//
//var_dump($response);


 
    $tcpdf->writeHTML($html);
    $tcpdf->Output("haisha.pdf");
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