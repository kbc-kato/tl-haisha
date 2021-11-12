<script type="text/javascript">
// ▼HTMLの読み込み直後に実行：
document.addEventListener('DOMContentLoaded', function() {

   // ▼2階層目の要素を全て非表示にする
   var allSubBoxes = document.getElementsByClassName("subbox");
   for( var i=0 ; i<allSubBoxes.length ; i++) {
      allSubBoxes[i].style.display = 'none';
   }

});
</script>