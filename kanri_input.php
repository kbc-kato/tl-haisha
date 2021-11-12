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
                <h1>配車状況入力</h1>
            </div>
            <br><br>
<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

    require_once ("common.php");

    print "<div id='kanri'>";

    print "<form method='POST' name='form2' action='kanri_check.php'>";
    print "<input type='hidden' name='kakushi' value='secret'>";
    
    print "<label>"."配車日"."<br>";
    print "<input type ='date' name = 'hiha' form = 'main'></label>";
    print "<br>";

    print "<lebel>"."車番"."<br>";
    print pulldown_shban();
    print "</label>";
    print "<br>";

    print "<div class='pulldownset'>";
    print "<label>"."運送会社"."<br>";
    print pulldown_unsm();
    print "</label>";
    print "<br>";

    print "<label>"."運転者"."<br>";
    print pulldown_drvm();
    print "</label>";
    print "</div>";
    print "<br>";

    print "<label>"."行先1"."<br>";
    print "<input type ='text' name = 'nmry1' size='40' maxlength='40' form = 'main'>";
    print "</label>";
    print "<label>"."着時間 "."<br>";
    print "<input type ='time' name = 'tmha1' form = 'main'>";
    print "</label>";
    print "<br>";

    print "<label>"."備考"."<br>";
    print "<textarea name = 'biko1' cols='40' rows='5' form = 'main'></textarea>";
    print "</label>";
    print "<br>";

    print "<label>"."行先2"."<br>";
    print "<input type ='text' name = 'nmry2' size='40' maxlength='40' form = 'main'>";
    print "</label>";
    print "<label>"."着時間 "."<br>";
    print "<input type ='time' name = 'tmha2' form = 'main'>";
    print "</label>";
    print "<br>";

    print "<label>"."備考"."<br>";
    print "<textarea name = 'biko2' cols='40' rows='5' form = 'main'></textarea>";
    print "</label>";
    print "<br><br>";


//    print "<form  action='kanri_check.php' id='main' method = 'POST'>";
    print "<input type ='submit' value = '更新'>";
    print "</form>";
//    print "<hr>";
    print "</div>";
?>
        </div>

        <script type="text/javascript">
// ▼HTMLの読み込み直後に実行：
document.addEventListener('DOMContentLoaded', function() {

   // ▼サブBOXを全て非表示にする
   var allSubBoxes = document.getElementsByClassName("subbox");
   for( var i=0 ; i<allSubBoxes.length ; i++) {
      allSubBoxes[i].style.display = 'none';
   }

   // ▼全てのプルダウンボックスごとに処理
   var mainBoxes = document.getElementsByClassName('pulldownset');
   for( var i=0 ; i<mainBoxes.length ; i++) {
   
      var mainSelect = mainBoxes[i].getElementsByClassName("mainselect");   // メインのプルダウンメニュー（※後でvalue属性値を参照するので、select要素である必要があります。）
      mainSelect[0].onchange = function () {
         // ▼同じ親要素に含まれている全サブBOXを消す
         var subBox = this.parentNode.getElementsByClassName("subbox");   // 同じ親要素に含まれる.subbox（※select要素に限らず、どんな要素でも構いません。）
         for( var j=0 ; j<subBox.length ; j++) {
            subBox[j].style.display = 'none';
         }
   
         // ▼指定されたサブBOXだけを表示する
         if( this.value ) {
            var targetSub = document.getElementById( this.value );   // 「メインのプルダウンメニューで選択されている項目のvalue属性値」と同じ文字列をid属性値に持つ要素を得る
            targetSub.style.display = 'inline';
         }
      }
   
   }

});
</script>
<!--        <script src="subbox.js" charset="utf-8"></script>   -->
    </body>
</html>