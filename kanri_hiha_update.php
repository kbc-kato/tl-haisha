<html>
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
                <h1>配車状況修正</h1>
            </div>
            <br><br>
<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

    require_once ("common.php");
//print "GET=".$_GET['code'];
    $seq = $_GET['code'];
//print "seq=".$seq;
    
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
var_dump($rec);
    if ($rec==false)
    {
        exit();
    }     

    print "<div id='kanri'>";

    print "<form method='POST' name='form2' action='kanri_hiha_update_check.php'>";
    
    print "配車日"."<br>";
    print "<input type ='date' name = 'hiha' value = ".$rec['KAHIHA'].">";
    print "<br>";

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
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' value = ".$rec['KANMRY1'].">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha1' size='10' value = ".$rec['KATMHA1'].">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko1' cols='40' rows='5' value = ".$rec['KABIKO1']."></textarea>";
    print "<br>";

    print "行先2"."<br>";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' value = ".$rec['KANMRY2'].">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha2' size='10' value = ".$rec['KATMHA2'].">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko2' cols='40' rows='5' value = ".$rec['KABIKO2']."></textarea>";
    print "<br><br>";

    print "<input type ='submit' value = '更新'>";
    print "</form>";
    print "<br><br>";
    print "<a href='kanri_hiha_desp.php'>配車状況一覧(配車日)へ</a>";

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

//        var subbox = document.getElementById("subbox");
//        console.log(subbox.value); // 2

	});
</script>
<!-- ========== -->
<!-- ▲ここまで -->
<!-- ========== -->

    </body>
</html>