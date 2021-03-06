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
                <h1>配車状況入力</h1>
            </div>
            <br><br>
<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

    require_once ("common.php");

    session_start();
    $hiha = "";
    $shban = 0;
    $cdun = 0;
    $cddr = 0;
    $nmry1 = "";
    $tmha1 = "";
    $biko1 = "";
    $nmry2 = "";
    $tmha2 = "";
    $biko2 = "";

    if(isset($_SESSION["hiha"])) $hiha = $_SESSION["hiha"];
    if(isset($_SESSION["shban"])) $shban = $_SESSION["shban"];
    if(isset($_SESSION["cdun"])) $cdun = $_SESSION["cdun"];
    if(isset($_SESSION["cddr"])) $cddr = $_SESSION["cddr"];
    if(isset($_SESSION["nmry1"])) $nmry1 = $_SESSION["nmry1"];
    if(isset($_SESSION["tmha1"])) $tmha1 = $_SESSION["tmha1"];
    if(isset($_SESSION["biko1"])) $biko1 = $_SESSION["biko1"];
    if(isset($_SESSION["nmry2"])) $nmry2 = $_SESSION["nmry2"];
    if(isset($_SESSION["tmha2"])) $tmha2 = $_SESSION["tmha2"];
    if(isset($_SESSION["biko2"])) $biko2 = $_SESSION["biko2"];
//var_dump($_SESSION);
    if($_SESSION["shori_kbn"]=="1")
    {
        $year=$_SESSION["haisha_year"];
        $month=$_SESSION["haisha_month"];
        $day=$_SESSION["haisha_day"];
    }    
//print "ymd=".$year."/".$month."/".$day."<br>";

    print "<div id='kanri'>";

    print "<form method='POST' name='form2' action='kanri_input_check.php'>";
    
    print "配車日"."<br>";
    print "<input type ='date' name = 'hiha' onkeypress='if(window.event.keyCode==13) { form2.shban.focus(); }' style='ime-mode: disabled;' value = ".$hiha.">";
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
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' onkeypress='if(window.event.keyCode==13) { form2.tmha1.focus(); }' style='ime-mode: active;' value = ".$nmry1.">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha1' size='10' onkeypress='if(window.event.keyCode==13) { form2.biko1.focus(); }' style='ime-mode: disabled;' value = ".$tmha1.">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko1' cols='40' rows='5' onkeypress='if(window.event.keyCode==13) { form2.nmry2.focus(); }' style='ime-mode: active;'>".$biko1."</textarea>";
    print "<br>";

    print "行先2"."<br>";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' onkeypress='if(window.event.keyCode==13) { form2.tmha2.focus(); }' style='ime-mode: active;' value = ".$nmry2.">";
    print "着時間 ";
    print "<input type ='text' name = 'tmha2' size='10' onkeypress='if(window.event.keyCode==13) { form2.biko2.focus(); }' style='ime-mode: disabled;' value = ".$tmha2.">";
    print "<br>";

    print "備考"."<br>";
    print "<textarea name = 'biko2' cols='40' rows='5' onkeypress='if(window.event.keyCode==13) { submitflag = 1; form2.btn.focus(); }'>".$biko2."</textarea>";
    print "<br><br>";

    print "<input type='button' name='btn' style='width:200px;height:40px' onClick='submit()' value = '登録'>";
//    print "<input type='submit' value = '登録'>";    
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