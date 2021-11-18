<?php 
//ini_set( 'display_errors', 1 );
//ini_set( 'error_reporting', E_ALL );


// ライブラリの読み込み
require_once('tcpdf/tcpdf.php');
 
// TCPDFインスタンスを作成
$orientation = 'Landscape'; // 用紙の向き Portrait (default) 縦 Portrait (default) 縦
$unit = 'mm'; // 単位
$format = 'A4'; // 用紙フォーマット
$unicode = true; // ドキュメントテキストがUnicodeの場合にTRUEとする
$encoding = 'UTF-8'; // 文字コード
$diskcache = false; // ディスクキャッシュを使うかどうか
$tcpdf = new TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache);
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);

$tcpdf->AddPage(); // 新しいpdfページを追加
//$tcpdf->SetMargins( 0, 0, true );
//$tcpdf->SetAutoPageBreak( false );

$tcpdf->SetFont("kozgopromedium", "", 10); // デフォルトで用意されている日本語フォント

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
<!--        <link rel="stylesheet" href="base.css">     -->
<!--        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">     -->
<!--        <link rel="stylesheet" href="table.css">     -->
<!--        <link rel="stylesheet" media="screen and (max-width:800px)" href="table_sp.css">     -->
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

    ob_start();
    $html =<<< EOF
    <style>
    .tbl-th {
        border: 0.1px solid #000;
        text-align: center;
    }
    .tbl-th-10 {
        border: 0.1px solid #000;
        text-align: center;
        width: 35px;
    }
    .tbl-th-25 {
        border: 0.1px solid #000;
        text-align: center;
        width: 80px;　
    }
    .tbl-th-30 {
        border: 0.1px solid #000;
        text-align: center;
        width: 100px;
    }
    .tbl-td {
        border: 0.1px solid #000;
    }
    .tbl{
        border-collapse: collapse;
        border-spacing: 0px;
    }
    </style>
    <div>
    配車　検索結果<br><br>
    </div>
    <div>
    <table class= 'tbl'>
    <tr>
    <th class="tbl-th-30">現場名</th>
    <th class="tbl-th">搬入日</th>
    <th class="tbl-th-10">時間</th>
    <th class="tbl-th-30">実車会社</th>
    <th class="tbl-th">車輛</th>
    <th class="tbl-th-10">車番</th>
    <th class="tbl-th">運転者</th>
    <th class="tbl-th-25">TEL</th>
    <th class="tbl-th">荷受人</th>
    <th class="tbl-th-25">TEL</th>
    <th class="tbl-th">搬入会社</th>
    <th class="tbl-th-10">人工</th>
    </tr>
EOF;
//print "debug1:";
//var_dump($html);
//print "<br>";

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
        $hacdunjinm=$rec['HACDUN_JI_NM'];
        $shnmsh=$rec['SHNMSH'];
        $hanosh=$rec['HANOSH'];
        $hanmdrji=$rec['HANMDR_JI'];
        $hatldrji=$rec['HATLDR_JI'];
        $hanmuk=$rec['HANMUK'];
        $hatluk=$rec['HATLUK'];
        $haryha=$rec['HARYHA'];
        $hehanytani=$rec['KEHANY_TANI'];


        $html .=<<< EOF
        <tr>
        <td class="tbl-td">$hanmry1</td>
        <td class="tbl-td">$hahiha</td>
        <td class="tbl-td">$hatmha</td>
        <td class="tbl-td">$hacdunjinm</td>
        <td class="tbl-td">$shnmsh</td>
        <td class="tbl-td">$hanosh</td>
        <td class="tbl-td">$hanmdrji</td>
        <td class="tbl-td">$hatldrji</td>
        <td class="tbl-td">$hanmuk</td>
        <td class="tbl-td">$hatluk</td>
        <td class="tbl-td">$haryha</td>
        <td class="tbl-td">$hehanytani</td>
        </tr>
EOF;
//print "debug2:";
//var_dump($html);
//print "<br>";


    }
    $html .=<<< EOF
    </table>
    </div>
EOF;
//print "debug3:";
//print $html;
//print "<br>";


//var_dump($html);
 
    $tcpdf->writeHTML($html);
    $tcpdf->SetDisplayMode('fullwidth', 'default');
    //    ob_end_clean();
    $tcpdf->Output("haisha.pdf","I");



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