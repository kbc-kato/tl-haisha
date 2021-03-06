<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="form.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id="pagebody">
        <!-- ヘッダー -->
            <div id = "header">
                <h1>配車状況削除</h1>
            </div>
            <br><br>
<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

    require_once ("common.php");

    $seq = $_GET['code'];
    
    include ('userfile.php');

    $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    $sql = " SELECT *
        FROM ST_KANRI_MYSQL
        WHERE SEQ=?";         // SELECT文を変数に格納。

    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params[] = $seq;          // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    $PDO = null;        //データベースから切断
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($rec);
    if ($rec==false)
    {
        exit();
    }

    session_start();
//    session_regenerate_id(true);            //セッションIDを変える

    if(isset($rec['kashban'])==true) $_SESSION["shban"] = $rec['kashban'];
    if(isset($rec['kacdun'])==true) $_SESSION["cdun"] = $rec["kacdun"];
    if(isset($rec['kacddr'])==true) $_SESSION["cddr"] = $rec["kacddr"];

//    if(isset($rec['kahika'])==true) 
//    {
//        $y=date('Y', strtotime($rec['kahika']));
//        $m=date('n', strtotime($rec['kahika']));
//        $d=date('d', strtotime($rec['kahika']));
//    }
    if($_SESSION["shori_kbn"]=="1")
    {
        $year=$_SESSION["haisha_year"];
        $month=$_SESSION["haisha_month"];
        $day=$_SESSION["haisha_day"];
    }
    else
    {
        $shban=$_SESSION["shban"];
    }    
//var_dump($_SESSION);

    print "<div id='kanri'>";

    print "<form method='POST' name='form2' action='kanri_delete_check.php'>";
    
    print "№"."<br>";
    print "<input type ='text' name = 'seq' size='5' readonly onkeypress='if(window.event.keyCode==13) { form2.hiha.focus(); }' style='ime-mode: disabled;' value = ".$rec['seq'].">";
    print "<br>";

    print "配車日"."<br>";
    print "<input type ='date' name = 'hiha' onkeypress='if(window.event.keyCode==13) { form2.shban.focus(); }' style='ime-mode: disabled;' value = ".$rec['kahika'].">";    print "<br>";

    print "車番"."<br>";
    print pulldown_shban();
    print "<br>";

    print "<div class='pulldownset'>";
    print "運送会社"."<br>";
    print pulldown_unsm();
    print "<br>";

    print "運転者"."<br>";
    print pulldown_drvm();
    print "</div>";
    print "<br>";

    print "行先1"."<br>";
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' onkeypress='if(window.event.keyCode==13) { form2.tmha1.focus(); }' style='ime-mode: active;' value = ".$rec['kanmry1'].">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha1' size='10' onkeypress='if(window.event.keyCode==13) { form2.biko1.focus(); }' style='ime-mode: disabled;' value = ".$rec['katmha1'].">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko1' cols='40' rows='5' onkeypress='if(window.event.keyCode==13) { form2.nmry2.focus(); }' style='ime-mode: active;'>".$rec['kabiko1']."</textarea>";
    print "<br>";

    print "行先2"."<br>";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' onkeypress='if(window.event.keyCode==13) { form2.tmha2.focus(); }' style='ime-mode: active;' value = ".$rec['kanmry2'].">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha2' size='10' onkeypress='if(window.event.keyCode==13) { form2.biko2.focus(); }' style='ime-mode: disabled;' value = ".$rec['katmha2'].">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko2' cols='40' rows='5' onkeypress='if(window.event.keyCode==13) { submitflag = 1; form2.btn.focus(); }'>".$rec['kabiko2']."</textarea>";
    print "<br><br>";

    print "<input type='button' name='btn' style='width:200px;height:40px' onClick='submit();' value = '削除'>";
//    print "<input type ='submit' value = '削除'>";
    print "</form>";
    print "<br><br>";
    if($_SESSION["shori_kbn"]=="1")
    {
?>
        <input type='button' style='width:200px;height:40px' value='配車状況(配車日)へ' onclick='location.href="kanri_hiha_desp.php"'>
<?php
//        print "<a href='kanri_hiha_desp.php'>配車状況一覧(配車日)へ</a>";
    }
    else
    {
?>
        <input type='button' style='width:200px;height:40px' value='配車状況(車番)へ' onclick='location.href="kanri_shban_desp.php"'>
<?php
        //        print "<a href='kanri_shban_desp.php'>配車状況一覧(車番)へ</a>";        
    }
//    print "<hr>";
    print "</div>";
?>
        </div>

<!-- ========================================================= -->
<!-- ▼2段階の連動プルダウンメニューを実現するJavaScriptソース -->
<!-- ========================================================= -->
<script type="text/javascript">

	// HTMLの読み込み直後に実行：
	document.addEventListener('DOMContentLoaded', function() {

    // ▼とりあえずサブBOXを全て非表示にする（CSSで書けば早いが）
		var allSubBoxes = document.getElementsByClassName("subbox");
		for( var i=0 ; i<allSubBoxes.length ; i++) {
			allSubBoxes[i].style.display = 'none';
		}

		// ▼全てのプルダウンボックスごとに処理
		var mainBoxes = document.getElementsByClassName('pulldownset');
		for( var i=0 ; i<mainBoxes.length ; i++) {

			var mainSelect = mainBoxes[i].getElementsByClassName("mainselect");	// メインのプルダウンメニュー（※後でvalue属性値を参照するので、select要素である必要があります。）
			mainSelect[0].onchange = function () {
				// 同じ親要素に含まれている全サブBOXを消す
				var subBox = this.parentNode.getElementsByClassName("subbox");	// 同じ親要素に含まれる.subbox（※select要素に限らず、どんな要素でも構いません。）
				for( var j=0 ; j<subBox.length ; j++) {
					subBox[j].style.display = 'none';
				}

				// 指定されたサブBOXを表示する
				if( this.value ) {
					var targetSub = document.getElementById( this.value );	// 「メインのプルダウンメニューで選択されている項目のvalue属性値」と同じ文字列をid属性値に持つ要素を得る
					targetSub.style.display = 'inline';
				}
			}
		}
	});


//20211118 st
    window.onload = function () {
	    document.getElementsByName('cdun')[0].onchange();
    };
//20211118 ed
//20211119 st
    var submitflag=0;
//20211119 ed

</script>
<!-- ========== -->
<!-- ▲ここまで -->
<!-- ========== -->

    </body>
</html>